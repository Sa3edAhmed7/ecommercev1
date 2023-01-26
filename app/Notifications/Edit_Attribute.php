<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Models\ProductAttribute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Edit_Attribute extends Notification
{
    use Queueable;

    private $edit_attribute;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(ProductAttribute $edit_attribute)
    {
        $this->edit_attribute = $edit_attribute;
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
            'id' => $this->edit_attribute->id,
            'title' => 'Update Attribute SuccessFully by',
            'user' => Auth::user()->name,
            'photo' => Auth::user()->profile_photo_path,
        ];
    }
}
