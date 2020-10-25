<?php namespace Rajv3\EventsModule\Http\Controller;
  
use Anomaly\Streams\Platform\Http\Controller\PublicController; 
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon; 
use DB; 

use Rajv3\EventsModule\Event\EventModel; 
use Rajv3\EventsModule\Category\CategoryModel; 

//use Anomaly\Streams\Platform\Entry\EntryCollection;
//use Anomaly\Streams\Platform\Entry\EntryRepository;
//use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Stream;


class EventsController extends PublicController
{
   //public function __construct() 
   //{
   //    parent::__construct(); // otherwise templating make() function is broken 
   //}
    protected function formatEvent($event)
    {                                 
        $event['day'    ] = Carbon::parse($event['date'], 'UTC')->formatLocalized('%e') ; // day
        $event['year'] = Carbon::parse($event['date'], 'UTC')->formatLocalized('%Y') ; // year
        $event['month'] = Carbon::parse($event['date'], 'UTC')->formatLocalized('%B') ; // month
        $event['weekday'] = Carbon::parse($event['date'], 'UTC')->formatLocalized('%A') ; // weekday
        $event['fr'] = Carbon::parse($event['date'], 'UTC')->formatLocalized('%d %B %Y') ; //jj mois aaaa
        $event['diff'] = Carbon::parse($event['date'], 'UTC')->diffForHumans() ;  

        $event['dateFr'] = Carbon::parse($event['date'], 'UTC')->formatLocalized('%d %B %Y') ;
        $event['dateHumanized'] = Carbon::parse($event['date'], 'UTC')->diffForHumans() ;
        return $event;
    }

    protected function setHeaders($domain=null, $methods='GET, PUT, POST, DELETE, OPTIONS')
    {             
        $domain = rtrim($domain, '/'); // tailing slash cause problem
        $domain = ! $domain ? '*' : $domain; // all domains if none provided

        header("Access-Control-Allow-Origin: $domain"); 
        header("Access-Control-Allow-Methods: $methods"); 
        header("Access-Control-Allow-Headers: *");   
    } 

    public function index() 
    {
        return $this->list('future');
    }   

    public function all() 
    {
        return $this->list('all');
    }   

    public function category($id=null) 
    {
        return $this->list('category',$id);
    }

    public function api($id=null) 
    {
        return ['api'];
    }

    public function list($action=null, $id=null) 
    {
        Carbon::setLocale('fr');
        setlocale(LC_TIME, 'fr_FR.utf8');
        $events = [];  

        $categories= CategoryModel::select('name', 'id')->distinct()->get()->toArray(); 
        $yesterday = Carbon::yesterday()->format('Y-m-d');

        switch($action) { 
            case 'all': 
                $collection =  EventModel::whereNotNull('date');
                //$collection =  EventModel::whereDate('date', '>=' , '1900-01-01' );
                break; 
            case 'category': 
                $collection = !$id ?  
                EventModel::whereNotNull('category_id') 
                : 
                EventModel::where('category_id', $id) ;

                $collection->whereDate('date', '>=' , $yesterday );

                break; 
            case 'future': 
            default:
                $collection =  EventModel::whereDate('date', '>=' , $yesterday );
                break;
        }   
        $collection =  $collection->orderBy('date', 'desc')->get();  
        
        foreach($collection->toArray() as $event) 
        {  
            $events[] = $this->formatEvent($event); 
        }

        $this->setHeaders(request()->headers->get('referer')); // headers need to be set before AJAX check
        if(request()->ajax()) 
        {  
                return ['events'=>$events, 'categories'=>$categories];
        } 

        return $this->view->make('rajv3.module.events::index',  ['events'=>$events, 'categories'=>$categories]); 
   }   

   
    public function event($id) 
    {
        Carbon::setLocale('fr');
        setlocale(LC_TIME, 'fr_FR.utf8');


        $collection = EventModel::findOrFail($id);   

        /*
        //$events = \DB::table('events_events')->get(); // THIS WORKS
        $event = DB::table('events_events')
                    ->where('id', $id)
                    ->get()[0]; // WORKS  
                    */ 
        //$data = ['event'=>$event];  
        
        $event = $this->formatEvent($collection->toArray()); 
  
        $this->setHeaders(request()->headers->get('referer')); // headers need to be set before AJAX check
        if(request()->ajax())
        {  
            return compact('event');
        }

        return $this->view->make('rajv3.module.events::event', compact('event'));    
    }   

    public function create(EventsFormBuilder $builder) 
    { 
        //$builder
        //        ->skipField('user_id')
        //        ->skipField('last_sent');
        
//        return $builder->render();
//        dd($builder);
     //   return $this->view->make('rajv3.module.events::index');  
    }
    
}