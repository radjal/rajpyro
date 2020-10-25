<?php namespace Rajv3\SubscribeModule\Subscribe;

use Rajv3\SubscribeModule\Subscribe\Contract\SubscribeRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class SubscribeRepository extends EntryRepository implements SubscribeRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var SubscribeModel
     */
    protected $model;

    /**
     * Create a new SubscribeRepository instance.
     *
     * @param SubscribeModel $model
     */
    public function __construct(SubscribeModel $model)
    {
        $this->model = $model;
    }
}
