<?php namespace Rajv3\SubscribeModule\Http\Controller\Admin;

use Rajv3\SubscribeModule\Subscribe\Form\SubscribeFormBuilder;
use Rajv3\SubscribeModule\Subscribe\Table\SubscribeTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class SubscribeController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param SubscribeTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(SubscribeTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param SubscribeFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(SubscribeFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param SubscribeFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(SubscribeFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
