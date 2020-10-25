<?php namespace Rajv3\PlistModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

class PlistModule extends Module
{

    /**
     * The navigation display flag.
     *
     * @var bool
     */
    protected $navigation = false; //not visible in admin

    /**
     * The addon icon.
     *
     * @var string
     */
    protected $icon = 'fa fa-puzzle-piece';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [];

}
