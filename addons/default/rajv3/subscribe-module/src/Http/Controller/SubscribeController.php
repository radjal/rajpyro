<?php namespace Rajv3\SubscribeModule\Http\Controller;
 
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Rajv3\SubscribeModule\Subscribe\Form\SubscribeFormBuilder;


class SubscribeController extends PublicController
{

    public function index() 
    {
        return $this->view->make('rajv3.module.subscribe::index'); 
    }   

    public function create(SubscribeFormBuilder $builder) 
    { 
        $builder
                ->skipField('user_id')
                ->skipField('last_sent');
        
//        return $builder->render();
//        dd($builder);
        return $this->view->make('rajv3.module.subscribe::index');  
    }
    
}