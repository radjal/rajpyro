<?php namespace Rajv3\EventsModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

class EventsModule extends Module
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
        'events' => [
            'buttons' => [
                'new_event',
            ],
        ],
//        'bookings' => [
//            'buttons' => [
//                'new_booking',
//            ],
//        ],
        'categories' => [
            'buttons' => [
                'new_category',
            ],
        ],
    ];

}
