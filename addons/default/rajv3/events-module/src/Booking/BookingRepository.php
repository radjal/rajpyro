<?php namespace Rajv3\EventsModule\Booking;

use Rajv3\EventsModule\Booking\Contract\BookingRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class BookingRepository extends EntryRepository implements BookingRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var BookingModel
     */
    protected $model;

    /**
     * Create a new BookingRepository instance.
     *
     * @param BookingModel $model
     */
    public function __construct(BookingModel $model)
    {
        $this->model = $model;
    }
}
