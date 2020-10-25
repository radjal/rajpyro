<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class Rajv3ModuleSubscribeCreateSubscribeStream extends Migration
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
        'slug' => 'subscribe',
        'title_column' => 'email',
        'translatable' => true,
        'versionable' => false,
        'trashable' => true,
        'searchable' => true,
        'sortable' => false,
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [ 
        'email' => [
            'unique' => true,
            'required' => true,
            
        ],
        'user_id' => [ 
            'required' => false,
            
        ],
        'last_sent'
    ];

}
