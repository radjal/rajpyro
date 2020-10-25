<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class Rajv3ModuleSubscribeCreateSubscribeFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [ 
        'last_sent'       => 'anomaly.field_type.datetime',
        'email'                      => 'anomaly.field_type.email',
        'user'           => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'mode'    => 'lookup',
                'related' => UserModel::class,
            ],
        ], 
    ];

}
