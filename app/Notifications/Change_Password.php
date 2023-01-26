<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Change_Password extends Notification
{
    use Queueable;

    private $change_password;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $change_password)
    {
        $this->change_password = $change_password;
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
            'id' => $this->change_password->id,
            'title' => 'Change Password SuccessFully by',
            'user' => Auth::user()->name,
            'photo' => Auth::user()->profile_photo_path,
        ];
    }
}
