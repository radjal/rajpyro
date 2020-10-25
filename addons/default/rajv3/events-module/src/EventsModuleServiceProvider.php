<?php namespace Rajv3\EventsModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Illuminate\Routing\Router;

class EventsModuleServiceProvider extends AddonServiceProvider
{

    /**
     * Additional addon plugins.
     *
     * @type array|null
     */
    protected $plugins = [
        EventsModulePlugin::class,
    ];

    /**
     * The addon Artisan commands.
     *
     * @type array|null
     */
    protected $commands = [];

    /**
     * The addon's scheduled commands.
     *
     * @type array|null
     */
    protected $schedules = [];

    /**
     * The addon API routes.
     *
     * @type array|null
     */
    protected $api = [ //not working fully! routing works, but requires an API module
        'api/events'           => 'Rajv3\EventsModule\Http\Controller\EventsController@api',
    ];

    /**
     * The addon routes.
     *
     * @type array|null
     */
    protected $routes = [
        'events'           => 'Rajv3\EventsModule\Http\Controller\EventsController@index',
        'events/all'           => 'Rajv3\EventsModule\Http\Controller\EventsController@all',
        'events/category'           => 'Rajv3\EventsModule\Http\Controller\EventsController@category',
        'events/category/{id}'           => 'Rajv3\EventsModule\Http\Controller\EventsController@category',
        'events/event/{id}'           => 'Rajv3\EventsModule\Http\Controller\EventsController@event',
        'admin/events/categories'           => 'Rajv3\EventsModule\Http\Controller\Admin\CategoriesController@index',
        'admin/events/categories/create'    => 'Rajv3\EventsModule\Http\Controller\Admin\CategoriesController@create',
        'admin/events/categories/edit/{id}' => 'Rajv3\EventsModule\Http\Controller\Admin\CategoriesController@edit',
        'admin/events/bookings'           => 'Rajv3\EventsModule\Http\Controller\Admin\BookingsController@index',
        'admin/events/bookings/create'    => 'Rajv3\EventsModule\Http\Controller\Admin\BookingsController@create',
        'admin/events/bookings/edit/{id}' => 'Rajv3\EventsModule\Http\Controller\Admin\BookingsController@edit',
        'admin/events'           => 'Rajv3\EventsModule\Http\Controller\Admin\EventsController@index',
        'admin/events/create'    => 'Rajv3\EventsModule\Http\Controller\Admin\EventsController@create',
        'admin/events/edit/{id}' => 'Rajv3\EventsModule\Http\Controller\Admin\EventsController@edit',
    ];

    /**
     * The addon middleware.
     *
     * @type array|null
     */
    protected $middleware = [
        //Rajv3\EventsModule\Http\Middleware\ExampleMiddleware::class
    ];

    /**
     * Addon group middleware.
     *
     * @var array
     */
    protected $groupMiddleware = [
        //'web' => [
        //    Rajv3\EventsModule\Http\Middleware\ExampleMiddleware::class,
        //],
    ];

    /**
     * Addon route middleware.
     *
     * @type array|null
     */
    protected $routeMiddleware = [];

    /**
     * The addon event listeners.
     *
     * @type array|null
     */
    protected $listeners = [
        //Rajv3\EventsModule\Event\ExampleEvent::class => [
        //    Rajv3\EventsModule\Listener\ExampleListener::class,
        //],
    ];

    /**
     * The addon alias bindings.
     *
     * @type array|null
     */
    protected $aliases = [
        //'Example' => Rajv3\EventsModule\Example::class
    ];

    /**
     * The addon class bindings.
     *
     * @type array|null
     */
    protected $bindings = [
        EventsCategoriesEntryModel::class => CategoryModel::class,
        EventsBookingsEntryModel::class => BookingModel::class,
        EventsEventsEntryModel::class => EventModel::class,
    ];

    /**
     * The addon singleton bindings.
     *
     * @type array|null
     */
    protected $singletons = [
        CategoryRepositoryInterface::class => CategoryRepository::class,
        BookingRepositoryInterface::class => BookingRepository::class,
        EventRepositoryInterface::class => EventRepository::class,
    ];

    /**
     * Additional service providers.
     *
     * @type array|null
     */
    protected $providers = [
        //\ExamplePackage\Provider\ExampleProvider::class
    ];

    /**
     * The addon view overrides.
     *
     * @type array|null
     */
    protected $overrides = [
        //'streams::errors/404' => 'module::errors/404',
        //'streams::errors/500' => 'module::errors/500',
    ];

    /**
     * The addon mobile-only view overrides.
     *
     * @type array|null
     */
    protected $mobile = [
        //'streams::errors/404' => 'module::mobile/errors/404',
        //'streams::errors/500' => 'module::mobile/errors/500',
    ];

    /**
     * Register the addon.
     */
    public function register()
    {
        // Run extra pre-boot registration logic here.
        // Use method injection or commands to bring in services.
    }

    /**
     * Boot the addon.
     */
    public function boot()
    {
        // Run extra post-boot registration logic here.
        // Use method injection or commands to bring in services.
    }

    /**
     * Map additional addon routes.
     *
     * @param Router $router
     */
    public function map(Router $router)
    {
        // Register dynamic routes here for example.
        // Use method injection or commands to bring in services.
    }

}
