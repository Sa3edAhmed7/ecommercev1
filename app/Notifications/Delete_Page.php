<?php

namespace App\Notifications;

use App\Models\Page;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;


class Delete_Page extends Notification
{
    use Queueable;

    private $delete_page;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Page $delete_page)
    {
        $this->delete_page = $delete_page;
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
            'id' => $this->delete_page->id,
            'title' => 'Delete Page SuccessFully by',
            'user' => Auth::user()->name,
            'photo' => Auth::user()->profile_photo_path,
        ];
    }
}
