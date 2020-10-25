<?php

use Anomaly\Streams\Platform\Database\Migration\Migration; 

class Rajv3ModuleEventsCreateEventsStream extends Migration
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
        'slug' => 'events',
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
        'name' => [ 
            'required' => true, 
        ], 
        'published' => [ 
            'required' => true, 
        ], 
        'category',
        'description' => [ 
            'required' => true, 
        ],
        'date' => [ 
            'required' => true, 
        ],
        'date_end' => [ 
            'required' => false, 
        ], 
        'cover' => [ 
            'required' => false, 
        ],
        'address' => [ 
            'required' => false, 
        ],
        'city' => [ 
            'required' => false, 
        ],
        'price' => [ 
            'required' => false, 
        ],
//        'slug' => [
//            'unique' => true,
//            'required' => true,
//        ],
    ];

}
