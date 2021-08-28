<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Post;

class newPostNotif extends Notification
{
    use Queueable;

    private $post;

    public function __construct(Post $post,$mail = false){
        $this->post = $post;
        $this->mail = $mail;
    }

    public function via($notifiable){
        if ($this->mail == true) {
            return ['mail'];
        }else{
            return ['database'];
        }
    }

    public function toMail($notifiable){
        return (new MailMessage)
                    ->greeting('أهلا بك')
                    ->salutation('أهلا بك 2')
                    ->with('أهلا بك 3')
                    ->line('قام أحدهم بالتعليق على إعلان تقوم بتمتابعته')
                    ->action($this->Post->title, url('/ads/'.$this->Post->id.'/'.$this->Post->title))
                    ->line('يسعدنا وجودك '.getSettings());
    }

    public function toDatabase($notifiable){
        return [
            'id'            => $this->post->id,
            'title'         => $this->post->title,
            'user_id'       => $this->post->user_id,
            'created_at'    => $this->post->created_at
        ];
    }

    public function toArray($notifiable){
        return [
            //
        ];
    }
}
