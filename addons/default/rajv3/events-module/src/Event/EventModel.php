<?php namespace Rajv3\EventsModule\Event;

use Rajv3\EventsModule\Event\Contract\EventInterface;
use Anomaly\Streams\Platform\Model\Events\EventsEventsEntryModel;

class EventModel extends EventsEventsEntryModel implements EventInterface
{

    public function categories()
    { 
        return $this->belongsTo(EventsCategoriesModel::class);
    }

}
