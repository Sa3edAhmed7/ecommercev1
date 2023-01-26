<?php

namespace App\Http\Livewire\Admin;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Livewire\Component;

class AdminCreateChatComponent extends Component
{
    public $users;
    public $message= 'hello how are you ';

    
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
        $this->users = User::where('id', '!=', auth()->user()->id)->get();
        return view('livewire.admin.admin-create-chat-component');
    }
}
