<?php namespace Knine\CommentsModule\Comment\Form;

//use Anomaly\ContactPlugin\Form\Command\BuildMessage;
//use Anomaly\ContactPlugin\Form\Command\GetMessageData;
//use Anomaly\ContactPlugin\Form\Command\GetMessageView;
//use Anomaly\Streams\Platform\Message\MessageBag;
//use Illuminate\Foundation\Bus\DispatchesJobs;
//use Illuminate\Mail\Mailer;
//use Illuminate\Mail\Message;
 
class CommentFrontFormHandler
{

   // use DispatchesJobs;
 
    public function handle(CommentFrontFormBuilder $builder/*, MessageBag $messages*/)
    {
        // Validation failed!
        if ($builder->hasFormErrors()) {
            return;
        }

        // Delegate these for now.
        $view = $this->dispatch(new GetMessageView($builder));
        $data = $this->dispatch(new GetMessageData($builder));

        // Build the message object.
        //$message = function (Message $message) use ($builder) {
        //    $this->dispatch(new BuildMessage($message, $builder));
        //};

        // Send the email.
        //$mailer->send($view, $data, $message);

        // If there are any failures, report.
        //if(count($mailer->failures()) > 0) {
        //    $messages->error(
        //        $builder->getFormOption('error_message', 'anomaly.plugin.contact::error.send_message')
        //    );
        //} else {
        //    // Otherwise, show success.
        //    $messages->success(
        //        $builder->getFormOption('success_message', 'anomaly.plugin.contact::success.send_message')
        //    );
        //}

        // Clear the form!
        //$builder->resetForm();
    }
}
