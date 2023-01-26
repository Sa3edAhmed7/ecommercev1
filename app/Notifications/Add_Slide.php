<?php

namespace App\Notifications;

use App\Models\HomeSlider;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Add_Slide extends Notification
{
    use Queueable;

    private $add_slide;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(HomeSlider $add_slide)
    {
        $this->add_slide = $add_slide;
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
            'id' => $this->add_slide->id,
            'title' => 'Create Slide SuccessFully by',
            'user' => Auth::user()->name,
            'photo' => Auth::user()->profile_photo_path,
        ];
    }
}
