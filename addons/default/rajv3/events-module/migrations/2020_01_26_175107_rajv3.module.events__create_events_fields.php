<?php

use Rajv3\EventsModule\Category\CategoryModel;
use Rajv3\EventsModule\Event\EventModel;
//use Rajv3\EventsModule\Booking\BookingModel;
use Anomaly\Streams\Platform\Database\Migration\Migration;

class Rajv3ModuleEventsCreateEventsFields extends Migration
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
        
        'published' => 'anomaly.field_type.boolean',
        'description' => 'anomaly.field_type.wysiwyg',
        'address' => 'anomaly.field_type.text',
        'city' => 'anomaly.field_type.text',
        'price' => 'anomaly.field_type.text',
        'cover' => 'anomaly.field_type.file',
        'email' => 'anomaly.field_type.email',
        'phone' => 'anomaly.field_type.text',
        'note' => 'anomaly.field_type.text',
        
        'date' => [
            "type"   => "anomaly.field_type.datetime",
            "config" => [
                "default_value" => null,
                "mode"          => "date",
                "date_format"   => "j F, Y",
                "year_range"    => "0:+1",
//                "time_format"   => "g:i A",
//                "timezone"      => null,
//                "picker"        => true,
//                "step"          => 15,
//                "min"           => null,
//                "max"           => null
            ]
        ],
        'date_end' => [
            "type"   => "anomaly.field_type.datetime",
            "config" => [
                "default_value" => null,
                "mode"          => "date",
                "date_format"   => "j F, Y",
                "year_range"    => "0:+1", 
            ]
        ], 
        'event' => [
            'type' => 'anomaly.field_type.relationship',
            'config' => [ 
                "mode" => "search", 
                'related' => EventModel::class,
                //'title_name' => 'Event'
                //'title_name' => 'Date'
            ],
        ], 
        'category' => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => CategoryModel::class,
                //'title_name' => 'Category'
            ],
        ], 
    ];

}
