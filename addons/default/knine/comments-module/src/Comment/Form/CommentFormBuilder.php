<?php namespace Knine\CommentsModule\Comment\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

class CommentFormBuilder extends FormBuilder
{

    /**
     * The form fields.
     *
     * @var array|string
     */
    protected $fields = [
        'thread'               => [
            'readonly'     => true ,
        //    'label'        => 'custom label',
        //    'instructions' => 'customfield instructions',
        //    'wrapper_view' => 'anomaly.module.installer::field_type/license/wrapper',
        //    'type'         => 'anomaly.field_type.text',
        //    'required'     => true,
        //    'config'       => [
        //        'label'   => 'anomaly.module.installer::field.license.agree',
        //        'mode'    => 'checkbox',
        //    ],
        ],
        'published',
        'comment',
        'name'               => [
            'readonly'     => true ,
        ],
        'email'               => [
            'readonly'     => true ,
        ],
        'author'               => [
            'disabled'     => true ,
        ],
        'ip'               => [
            'disabled'     => true ,
        ],
        'host'               => [
            'disabled'     => true ,
        ],
        'session'               => [
            'disabled'     => true ,
        ], 
        'session'               => [
            'disabled'     => true ,
        ], 
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
    protected $actions = [];

    /**
     * The form buttons.
     *
     * @var array|string
     */
    protected $buttons = [
        'cancel',
    ];

    /**
     * The form options.
     *
     * @var array
     */
    protected $options = [];

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
