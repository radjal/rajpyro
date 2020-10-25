<?php namespace Rajv3\SubscribeModule\Subscribe\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

class SubscribeTableBuilder extends TableBuilder
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
        'email'
    ];

    /**
     * The table columns.
     *
     * @var array|string
     */
    protected $columns = [
        'email',
       // 'user_id',
        'user',
        'last_sent'
    ];

    /**
     * The table buttons.
     *
     * @var array|string
     */
    protected $buttons = [
        'edit'
    ];

    /**
     * The table actions.
     *
     * @var array|string
     */
    protected $actions = [
        'delete'
    ];

    /**
     * The table options.
     *
     * @var array
     */
    protected $options = [
        'sortable' => false //admin view sorting
    ];

    /**
     * The table assets.
     *
     * @var array
     */
    protected $assets = [];

}
