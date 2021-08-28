<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use APP\Cmnt;

class newCmntNotif extends Notification
{
    use Queueable;

    public function __construct(Cmnt $cmnt,$mail)
    {
        $this->cmnt = $cmnt;
        $this->mail = $mail;
    }

    public function via($notifiable)
    {
        if ($this->mail == true) {
            return ['mail'];
        }else{
            return ['database'];
        }
    }

    public function toMail($notifiable){
        return (new MailMessage)
                    ->greeting('أهلا بك')
                    ->salutation(getSettings())
                    ->with('تنبيه من '.getSettings())
                    ->line('قام أحدهم بالتعليق على إعلان قد قمت بمتابعته')
                    ->action($this->cmnt->Post->title, url('/ads/'.$this->cmnt->Post->id.'/'.$this->cmnt->Post->title.'#'.count($this->cmnt->Post->Cmnt)))
                    ->line('يسعدنا وجودك معنا');
    }
    public function toDatabase($notifiable){

        pusherFun('desktopNotification','newCmntOnYourPost'.$this->cmnt->Post->user_id,[
            'url'           => url('/ads/'.$this->cmnt->Post->id.'/'.$this->cmnt->Post->title.'#'.count($this->cmnt->Post->Cmnt)),
            'title'         => $this->cmnt->Post->title,
            'username'      => $this->cmnt->User->name,
        ]);

        return [
            'id'            => $this->cmnt->Post->id,
            'title'         => $this->cmnt->Post->title,
            'user_id'       => $this->cmnt->user_id,
            'created_at'    => $this->cmnt->created_at
        ];
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
