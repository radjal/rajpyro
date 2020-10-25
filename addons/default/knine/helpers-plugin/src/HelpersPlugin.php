<?php namespace Knine\HelpersPlugin;

use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Twig_Environment;
use Twig_NodeVisitorInterface;

class HelpersPlugin extends Plugin
{

    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return array An array of functions
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('hello', function($name) {
                return "Hello {$name} from helpers plugin!";
            }),
                    
                // greater than for twig usage, returns '>'
            new \Twig_SimpleFunction('gt', function() {
                return ">";
            }), 
                // less than for twig usage, returns '<'
            new \Twig_SimpleFunction('lt', function() {
                return "<";
            }), 
                    
                // is greater than for twig usage, returns true/false accordingly
            new \Twig_SimpleFunction('greaterthan', function($num, $limit) {
                return $num > $limit;
            }), 
                // is less than for twig usage, returns true/false accordingly
            new \Twig_SimpleFunction('lessthan', function($num, $limit) {
                return $num < $limit;
            }), 

                    // true if GET variable of $name exists {{ get_isset("notrack") }} 
            new \Twig_SimpleFunction('get_isset', function($name) {
                return isset($_GET[$name]);
            }),  
 
                    // NOT WORKING AS EXPECTED, admin check problem
            new \Twig_SimpleFunction('pageadminlink', function($pageid=false ) {   
                if ($pageid === false ){ 
                    return ' <a == false href="/admin/pages/edit/'.$pageid.'" class="adminlink">Edit</a>' ; 
                }  
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
