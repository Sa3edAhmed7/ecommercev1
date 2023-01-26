<?php

namespace App\Notifications;

use App\Models\HomeCategory;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Manage_Categories extends Notification
{
    use Queueable;

    private $home_category;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(HomeCategory $home_category)
    {
        $this->home_category = $home_category;
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
            'id' => $this->home_category->id,
            'title' => 'Update Home Category SuccessFully by',
            'user' => Auth::user()->name,
            'photo' => Auth::user()->profile_photo_path,
        ];
    }
}
