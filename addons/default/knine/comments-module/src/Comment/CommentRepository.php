<?php namespace Knine\CommentsModule\Comment;

use Knine\CommentsModule\Comment\Contract\CommentRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class CommentRepository extends EntryRepository implements CommentRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var CommentModel
     */
    protected $model;

    /**
     * Create a new CommentRepository instance.
     *
     * @param CommentModel $model
     */
    public function __construct(CommentModel $model)
    {
        $this->model = $model;
    }
}
