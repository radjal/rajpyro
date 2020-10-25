<?php namespace Rajv3\EventsModule\Http\Controller\Admin;

use Rajv3\EventsModule\Booking\Form\BookingFormBuilder;
use Rajv3\EventsModule\Booking\Table\BookingTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class BookingsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param BookingTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(BookingTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param BookingFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(BookingFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param BookingFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(BookingFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
