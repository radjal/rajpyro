<?php namespace Knine\CommentsModule\Comment\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

use Knine\CommentsModule\Comment\Form\CommentFrontFormHandler;
use Knine\CommentsModule\Comment\CommentModel;

use Illuminate\Http\Request ;
//use Illuminate\Notifications\NotificationServiceProvider ;

class CommentFrontFormBuilder extends FormBuilder
{   

    protected $model = CommentModel::class;
 
    protected $handler = CommentFrontFormHandler::class; // Assumes @handle
 
    //protected $repository = Knine\CommentsModule\Comment\CommentModel::class;

    public function onReady()
    {
        $this;  
    }
    public function onSaving()
    { 
      //  $entry  = $this->getFormEntry();
      //  $stream = $this->getStream();
        //$field  = $this->getField();
        //$parent = $this->getParent();
        //$entry  = $this->getFormEntry();
        $this; 
    }

  //  private $defaults = [];
//
  //  public function __construct(CommentModel $model)
  //  {
//
  //    //  $model = $this->model;
  //    //  $this->defaults = [
  //    //      'thread' => request()->path();
  //    //  ];
  //  //  $this->fields['thread']['config']['default_value'] = $this->request()->path();
  //  }
    /**
     * The form fields.
     *
     * @var array|string
     */
    protected $fields = [
        //'*', // shows all fields
       'thread' => [  
            'required'      => true, 
            //'readonly'      => true,
            'hidden'      => true,
            "config" => [
                //    "type"          => "text", // this is text field type -> type https://pyrocms.com/documentation/text-field-type/2.2/introduction/configuration
                //    "mask"          => null,
                //    "min"           => null,
                //    "max"           => null,
                    "default_value" => '/',
                ]
         //  'value' => 'TEST' //works
       ],
       'name' => [  
           'required'     => true,
       ],
       'email' => [  
           'required'     => true,
           "config" => [
                   "type"          => "email", // this is text field type! Valid options are `text` (default), `password`, `email`, and `tel`. -> type https://pyrocms.com/documentation/text-field-type/2.2/introduction/configuration
               //    "mask"          => null,
               //    "min"           => null,
               //    "max"           => null,
                //   "default_value" => '/' ,
               ]
       ],
       'comment' => [  
           'required'     => true,
       ] 
    ];

    /**
     * Additional validation rules.
     *
     * @var array|string
     */
    protected $rules = [];

    /**
     * Fields to skip.
     *
     * @var array|string
     */
    protected $skips = [];

    /**
     * The form actions.
     *
     * @var array|string
     */
    protected $actions = [ 
        'save'
    ];

    /**
     * The form buttons.
     *
     * @var array|string
     */
    protected $buttons = [
        //'cancel',
    ];

    /**
     * The form options.
     *
     * @var array
     */
    protected $options = [
       // 'url' => '/comments/save', //works
      //  'redirect' => '/' //works
    ];

    /**
     * The form sections.
     *
     * @var array
     */
    protected $sections = [];

    /**
     * The form assets.
     *
     * @var array
     */
    protected $assets = [];

}
