<?php namespace Rajv3\SubscribeModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

class SubscribeModule extends Module
{

    /**
     * The navigation display flag.
     *
     * @var bool
     */
    protected $navigation = true;

    /**
     * The addon icon.
     *
     * @var string
     */
    protected $icon = 'fa fa-puzzle-piece';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'subscribe' => [
            'buttons' => [
                'new_subscribe',
            ],
        ],
    ];

}
