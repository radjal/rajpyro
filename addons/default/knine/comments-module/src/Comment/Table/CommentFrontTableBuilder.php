<?php namespace Knine\CommentsModule\Comment\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder; 

//use Knine\CommentsModule\CommentModel;

class CommentFrontTableBuilder extends TableBuilder
{

    //protected $model = CommentModel::class;

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
       // 'thread'
    ];

    /**
     * The table columns.
     *
     * @var array|string
     */
    protected $columns = [
        'thread',
        'comment',
        'name'

    ];

    /**
     * The table buttons.
     *
     * @var array|string
     */
    protected $buttons = [
      //  'edit'
    ];

    /**
     * The table actions.
     *
     * @var array|string
     */
    protected $actions = [
        'edit'
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
