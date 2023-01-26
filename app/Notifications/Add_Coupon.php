<?php

namespace App\Notifications;

use App\Models\Coupon;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Add_Coupon extends Notification
{
    use Queueable;

    private $add_coupon;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Coupon $add_coupon)
    {
        $this->add_coupon = $add_coupon;
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
            'id' => $this->add_coupon->id,
            'title' => 'Create Coupon SuccessFully by',
            'user' => Auth::user()->name,
            'photo' => Auth::user()->profile_photo_path,
        ];
    }
}
