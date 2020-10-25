<?php namespace Knine\CommentsModule\Http\Controller;

use Knine\CommentsModule\Comment\Form\CommentFrontFormBuilder;
use Knine\CommentsModule\Comment\Table\CommentFrontTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\UsersModule\User\UserModel;
//use Anomaly\Streams\Platform\Stream;

//use Illuminate\Http\Request;
use Anomaly\Streams\Platform\Message\MessageBag;
use Knine\CommentsModule\CommentModel;

class CommentsController extends PublicController
{
 
    public function index(CommentFrontTableBuilder $table)
    {
        return $table->render(); 
    }

    /**
     * Create a new entry.
     *
     * @param CommentFrontFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(CommentFrontFormBuilder $form)
    { 
        
      //  $this->messages->success('save action');
        
    //    echo action([CommentsController::class, 'save']);
        
      //$x= $form->getForm();
      //$x= $form->getFormFields();
        //$form->setOptions(['url'=>'/comments/hello']); //works
        return $form->render();
      // dd($form);

      // return $this->view->make('knine.module.comments::form', compact([$form]) );   
    }
 
    public function save( $id=null, CommentFrontFormBuilder $form)
    {  
        $this->template->set('meta_title', 'Save a comment');

        $form->build()->validate();
        //$out = $form->getFormResponse();    
        if ($form->hasFormErrors()) { 
            //$this->messages->error('form error');
        } else { 
            $this->messages->success('Comment saved');
            $form->setOption('redirect', request()->headers->get('referer'));
        }
       // $this->messages->success('Comment saved');
        //$form->setOption('redirect', '/comments');

        return $form->getFormResponse();
        //render();
        //$form->make($this->request->get('id')); 
    }
    
    public function savex(Request $request, $id=null, CommentFrontFormBuilder $form)
    { 
        dump($request);
        dump($form);
        echo $form->canSave();
        return "save $id";
    }

    public function edit($id=null, CommentFrontFormBuilder $form)
    {  
        $form->setEntry($id);
     //   $x = $form->find($id);

        return $form->render();
    }
}