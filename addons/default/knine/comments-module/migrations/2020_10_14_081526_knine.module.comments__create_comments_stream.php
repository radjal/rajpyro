<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class KnineModuleCommentsCreateCommentsStream extends Migration
{

    /**
     * This migration creates the stream.
     * It should be deleted on rollback.
     *
     * @var bool
     */
    protected $delete = true;

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'comments',
        'title_column' => 'thread',
        'translatable' => false,
        'versionable' => false,
        'trashable' => false,
        'searchable' => false,
        'sortable' => false,
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'thread' => [
            'translatable' => false,
            'required' => true, 
        ],
        'published' => [ 
            'required' => false,
        ],
        'comment' => [ 
            'translatable' => false,
            'required' => true,
        ],
        'name' => [ 
            'required' => true,
        ],
        'email' => [ 
            'required' => true,
        ],
        'url' => [ 
            'required' => false,
        ],
        'rating' => [ 
            'required' => false,
        ],
        'ip' => [ 
            'required' => true,
        ],
        'author' => [ 
            'required' => false,
        ],
        'session' => [ 
            'required' => false,
        ],
        'host' => [ 
            'required' => false,
        ],
        //'name' => [
        //    'translatable' => true,
        //    'required' => true,
        //],
        //'slug' => [
        //    'unique' => true,
        //    'required' => true,
        //],
    ];

}
