<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;
class followUserNotf extends Notification
{
    use Queueable;

    public function __construct(User $user,User $userF)
    {
        $this->user = $user;
        $this->userF = $userF;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'userId'        => $this->userF->id,
            'userName'      => $this->userF->name,
            'userFId'       => $this->user->id,
            'userFName'     => $this->user->name
        ];
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
