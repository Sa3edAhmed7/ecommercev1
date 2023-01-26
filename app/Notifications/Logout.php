<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;

class Logout extends Notification
{
    use Queueable;

    private $logout_user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $logout_user)
    {
        $this->logout_user = $logout_user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'id' => $this->logout_user->id,
            'title' => 'Log out of the system',
            'user' => Auth::user()->name,
            'photo' => Auth::user()->profile_photo_path,
        ];
    }
}
