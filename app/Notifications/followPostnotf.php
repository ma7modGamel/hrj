<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;
use App\Post;

class followPostnotf extends Notification
{
    use Queueable;


    public function __construct(Post $post,User $user)
    {
        $this->post = $post;
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'postId'        => $this->post->id,
            'postTitle'     => $this->post->title,
            'userId'        => $this->user->id,
            'userName'      => $this->user->name
        ];
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
