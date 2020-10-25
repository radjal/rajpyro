<?php namespace Rajv3\EventsModule\Category;

use Rajv3\EventsModule\Category\Contract\CategoryInterface;
use Anomaly\Streams\Platform\Model\Events\EventsCategoriesEntryModel;

class CategoryModel extends EventsCategoriesEntryModel implements CategoryInterface
{
    public function events()
    { 
        return $this->hasMany(EventsEventsModel::class);
    }


}
