<?php namespace Rajv3\SkillsModule\Http\Controller\Admin;

use Rajv3\SkillsModule\Skill\Form\SkillFormBuilder;
use Rajv3\SkillsModule\Skill\Table\SkillTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class SkillsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param SkillTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(SkillTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param SkillFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(SkillFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param SkillFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(SkillFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
