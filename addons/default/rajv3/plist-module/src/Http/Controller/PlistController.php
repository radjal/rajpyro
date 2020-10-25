<?php namespace Rajv3\PlistModule\Http\Controller;
 
use Anomaly\Streams\Platform\Http\Controller\PublicController;


class PlistController extends PublicController
{

    public function index() 
    {
        return $this->view->make('rajv3.module.plist::index');
        
    }
}