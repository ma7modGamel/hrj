<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Notifications\Messages\MailMessage;

class MailResetPasswordToken extends Notification
{
    use Queueable;
 
    public $token;
 
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }
 
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }
 
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($user)
    {
        /*  return email message */
        return (new MailMessage)
                    ->subject("إسترجاع الرقم السرى")
                    ->line("هل نسيت الرقم السرى الخاص بك ؟ أضغط على هذا الزر لإسترجاعه.")
                    ->action('إسترجاع الرقم السرى', url('password/reset', $this->token))
                    ->line('تم إرسال هذه الرساله بناء على طلب استرجاع الرقم السرى من الحساب الخاص بكم')
                    ->line('شكرا لإستخدامك '.config('app.name'));
    }
 
}