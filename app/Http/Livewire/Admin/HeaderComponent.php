<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use App\Models\Conversation;
use GuzzleHttp\Promise\Create;

class HeaderComponent extends Component
{
    public function checkconversation($receiverId)
    {

        $checkedConversation = Conversation::where('receiver_id', auth()->user()->id)->where('sender_id', $receiverId)->orWhere('receiver_id', $receiverId)->where('sender_id', auth()->user()->id)->get();


        if (count($checkedConversation) == 0) {

            $createdConversation= Conversation::create([
                'receiver_id'=>$receiverId,
                'sender_id'=>auth()->user()->id,
                'last_time_message'=>date('Y-m-d H:i:s'),
            ]);


        // $createdMessage= Message::create(['conversation_id'=>$createdConversation->id,'user_id'=>$receiverId,'body'=>$this->message]);

        // $createdConversation->last_time_message= $createdMessage->created_at;

        $createdConversation->save();

        return redirect()->route('admin.chat');




        } else if (count($checkedConversation) >= 1) {

            return redirect()->route('admin.chat');
        }
    }

    public function render()
    {
        $this->conversations = Conversation::query()
        ->where('sender_id', auth()->id())
        ->orWhere('receiver_id', auth()->id())
        ->get();

        $this->notifications = auth()->user()->unreadNotifications;

        $this->users = User::where('id', '!=', auth()->user()->id)->get();
        
        return view('livewire.admin.header-component')->layout('layouts.master');
    }
}
