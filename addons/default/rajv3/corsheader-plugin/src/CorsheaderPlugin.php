<?php namespace Rajv3\CorsheaderPlugin;

use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Twig_Environment;
use Twig_NodeVisitorInterface;

class CorsheaderPlugin extends Plugin
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
                return "corsHello {$name}!";
            }),            
            // set cross origin headder  {{ corsheader($domain, $methods) }} 
            // $domain no backslash at the end of domain 
            //    {{ corsheader('http://domain.com') }}
            new \Twig_SimpleFunction('corsheader', function($domain='*', $methods='GET, PUT, POST, DELETE, OPTIONS') { 
                header("Access-Control-Allow-Origin: $domain"); 
                header("Access-Control-Allow-Methods: $methods"); 
		        header("Access-Control-Allow-Headers: *");  
                return ;
            }),      
            // set webmanifest header {{ webmanifest() }}  
            // DOES NOT SEEM TO BE WORKING
            new \Twig_SimpleFunction('webmanifest', function() { 
                header("Content-Type: application/manifest+json");  
                header("Content-Type: application/json");  
                return ;
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
