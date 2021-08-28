<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use App\Message;

class newMsgNotif extends Notification
{
    use Queueable;

    public function __construct(Message $msg)
    {
        $this->msg = $msg;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable){
        $user = $this->msg->User;
        $userTo = $this->msg->UserTo;
        return (new MailMessage)
                    ->greeting('أهلا بك '.$userTo->name)
                    ->salutation(getSettings())
                    ->with('تنبيه برسالة جديده')
                    ->line('قام '.$user->name.' بمراسلتك على رسائل الموقع وتم ارسال هذا الإشعار بناءً على طلبك')
                    ->action('أضغط هنا لعرض الرساله', url('conv/'.$user->id))
                    ->line('يسعدنا وجودك معنا');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
