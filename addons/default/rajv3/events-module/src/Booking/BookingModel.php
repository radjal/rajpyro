<?php namespace Rajv3\EventsModule\Booking;

use Rajv3\EventsModule\Booking\Contract\BookingInterface;
use Anomaly\Streams\Platform\Model\Events\EventsBookingsEntryModel;

class BookingModel extends EventsBookingsEntryModel implements BookingInterface
{

}
