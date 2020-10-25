<?php namespace Knine\CommentsModule;

use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Twig_Environment;
use Twig_NodeVisitorInterface;

use Knine\CommentsModule\Comment\Form\CommentFrontFormBuilder;
//use Knine\CommentsModule\CommentModel;

class CommentsModulePlugin extends Plugin
{ 
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('hello', function($name) {
                return "(comments module) Hello {$name}!";
            }),     
            
            new \Twig_SimpleFunction('commentform', function($id=null) {
              // $form = CommentFrontFormBuilder::class;

              // return $form->render();

                return "(comments form TO FINISH) $id ";
            }),     
            
        ];
    } 

}
