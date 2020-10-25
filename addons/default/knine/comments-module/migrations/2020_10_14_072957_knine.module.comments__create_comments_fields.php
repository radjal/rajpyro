<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;
use Anomaly\UsersModule\User\UserModel;


class KnineModuleCommentsCreateCommentsFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'thread' => [
            'type'  => 'anomaly.field_type.text', 
        ],
        'published' => [
            'type'   => 'anomaly.field_type.boolean',
            'config' => [
                'default_value' => false,
            ],
        ],
        'comment' => 'anomaly.field_type.textarea',
        'name' => 'anomaly.field_type.text',
        'email' => 'anomaly.field_type.text',
        'url' => 'anomaly.field_type.url',
        'rating' => [
            'type'   => 'anomaly.field_type.integer',
            'config' => [
                'default_value' => 0,
            ],
        ], 
        'ip' => [
            'type'   => 'anomaly.field_type.text', 
            'config' => [
                'default_value' => null,
            ],
        ],
        'session' => 'anomaly.field_type.text',
        'host' => 'anomaly.field_type.text',
        'author'           => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'mode'    => 'lookup',
                'related' => UserModel::class,
            ],
        ],
    ];

}
