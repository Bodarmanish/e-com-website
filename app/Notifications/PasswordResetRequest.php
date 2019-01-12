<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class PasswordResetRequest extends Notification
{
    use Queueable;

    protected $token;



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
    public function toMail($notifiable)
    {
        
        //$url = url('/api/password/find/'.$this->token);
        //$url = url('http://localhost:8000/password/createpwd/'.$this->token);
        //$user = md5(rand(1,10000));
        // if (static::$toMailCallback) {
        //     return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        // }

        return (new MailMessage)
            ->subject(Lang::getFromJson('Reset Password Notification'))
            ->line(Lang::getFromJson('You are receiving this email because we received a password reset request for your account.'))
            ->action(Lang::getFromJson('Reset Password'), url(config('http://localhost:8000/password/createpwd/').route('createpwd', $this->token, false)))
            ->line(Lang::getFromJson('If you did not request a password reset, no further action is required.'));
    
        // return (new MailMessage)
        //             ->line('You are receiving this email because we received a password reset request for your account.')
        //              ->action('Reset your Password', url($url))
        //             ->line('If you did not request a password reset, no further action is required.');
                   
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
