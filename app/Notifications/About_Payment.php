<?php

namespace App\Notifications;

use App\Models\AboutPayment;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class About_Payment extends Notification
{
    use Queueable;

    private $about_payment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(AboutPayment $about_payment)
    {
        $this->about_payment = $about_payment;
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
            'id' => $this->about_payment->id,
            'title' => 'Update AboutPayment SuccessFully by',
            'user' => Auth::user()->name,
            'photo' => Auth::user()->profile_photo_path,
        ];
    }
}
