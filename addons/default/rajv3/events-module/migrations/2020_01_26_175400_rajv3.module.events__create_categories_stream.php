<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class Rajv3ModuleEventsCreateCategoriesStream extends Migration
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
        'slug' => 'categories',
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
            'translatable' => true,
            'required' => true,
        ],
//        'slug' => [
//            'unique' => true,
//            'required' => true,
//            'config'   => [
//                'slugify' => 'name',
//            ],
//        ],
    ];

}
