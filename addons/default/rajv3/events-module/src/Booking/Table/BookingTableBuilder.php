<?php namespace Rajv3\EventsModule\Booking\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

class BookingTableBuilder extends TableBuilder
{

    /**
     * The table views.
     *
     * @var array|string
     */
    protected $views = [];

    /**
     * The table filters.
     *
     * @var array|string
     */
    protected $filters = [
        'name',
        'email',
        'phone',
        'event' ,
        
//        'user'   => [
//        'event'   => [
//            'filter'      => 'input',
//            'placeholder' => 'User',
//            'query'       => UserFilterQuery::class,
//        ],
    ];

    /**
     * The table columns.
     *
     * @var array|string
     */
    protected $columns = [
        'event',
        'name',
        'email',
        'phone'
    ];

    /**
     * The table buttons.
     *
     * @var array|string
     */
    protected $buttons = [
        'edit',
        'delete'
    ];

    /**
     * The table actions.
     *
     * @var array|string
     */
    protected $actions = [
        'delete',
        'export'
    ];

    /**
     * The table options.
     *
     * @var array
     */
    protected $options = [];

    /**
     * The table assets.
     *
     * @var array
     */
    protected $assets = [];

}
