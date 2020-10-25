<?php namespace Rajv3\EventsModule;

use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Twig_Environment;
use Twig_NodeVisitorInterface;
//use Anomaly\PagesModule\Page\Contract\PageInterface; 
//use Anomaly\Streams\Platform\Support\Authorizer;
//use Anomaly\UsersModule\Role\RoleCollection;
//use Anomaly\UsersModule\User\Contract\UserInterface;
//use Illuminate\Contracts\Auth\Guard;
  
class EventsModulePlugin extends Plugin
{

    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return array An array of functions
     */ 
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('eventshello', function($name) {
                return "(events module) Hello {$name}!";
            }),       
        ]; 
    }

    /**
     * Returns a list of global variables to add to the existing list.
     *
     * @return array An array of global variables
     */
    public function getGlobals()
    {
        return [];
    }

    /**
     * Returns a list of filters to add to the existing list.
     *
     * @return array An array of filters
     */
    public function getFilters()
    {
        return [];
    }

    /**
     * Initializes the runtime environment.
     *
     * This is where you can load some file that contains filter functions for instance.
     *
     * @param Twig_Environment $environment The current Twig_Environment instance
     */
    public function initRuntime(Twig_Environment $environment)
    {
    }

    /**
     * Returns the token parser instances to add to the existing list.
     *
     * @return array An array of Twig_TokenParserInterface or Twig_TokenParserBrokerInterface instances
     */
    public function getTokenParsers()
    {
        return [];
    }

    /**
     * Returns the node visitor instances to add to the existing list.
     *
     * @return Twig_NodeVisitorInterface[] An array of Twig_NodeVisitorInterface instances
     */
    public function getNodeVisitors()
    {
        return [];
    }

    /**
     * Returns a list of tests to add to the existing list.
     *
     * @return array An array of tests
     */
    public function getTests()
    {
        return [];
    }

    /**
     * Returns a list of operators to add to the existing list.
     *
     * @return array An array of operators
     */
    public function getOperators()
    {
        return [];
    }

}
