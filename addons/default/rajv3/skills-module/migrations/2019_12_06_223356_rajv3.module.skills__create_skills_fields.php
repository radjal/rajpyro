<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class Rajv3ModuleSkillsCreateSkillsFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'name' => 'anomaly.field_type.text',
//        'slug' => [
//            'type' => 'anomaly.field_type.slug',
//            'config' => [
//                'slugify' => 'name',
//                'type' => '_'
//            ],
//        ],
        'level' => [
            "type"   => "anomaly.field_type.slider",
            "config" => [
                "min"           => 1,
                "max"           => 5,
                "step"          => 1, 
                "default_value" => 3,
            ],
        ],
    ];

}
