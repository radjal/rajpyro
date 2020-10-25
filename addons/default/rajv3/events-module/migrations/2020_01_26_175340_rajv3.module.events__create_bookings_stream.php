<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class Rajv3ModuleEventsCreateBookingsStream extends Migration
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
        'slug' => 'bookings',
        'title_column' => 'name',
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
        'event',
        'name' => [ 
            'required' => true,
        ],
        'email' => [ 
            'required' => false,
        ],
        'phone' => [ 
            'required' => false,
        ],
        'note' => [ 
            'required' => false,
        ]
        
//        'slug' => [
//            'unique' => true,
//            'required' => true,
//        ],
    ];

}
