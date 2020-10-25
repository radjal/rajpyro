<?php namespace Rajv3\EventsModule\Http\Controller\Admin;

use Rajv3\EventsModule\Event\Form\EventFormBuilder;
use Rajv3\EventsModule\Event\Table\EventTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class EventsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param EventTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(EventTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param EventFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(EventFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param EventFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(EventFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
