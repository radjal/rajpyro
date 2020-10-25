<?php namespace Knine\CommentsModule\Comment\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

class CommentTableBuilder extends TableBuilder
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
        'published',
        'thread',
        'host',
        'ip',
        'created_at'
    ];

    /**
     * The table columns.
     *
     * @var array|string
     */
    protected $columns = [
        'published',
        'thread',
        'comment',
        'name',
        'email',
        'ip',
        'host',
        'created_at' 

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
        'delete',
       // 'update'
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
