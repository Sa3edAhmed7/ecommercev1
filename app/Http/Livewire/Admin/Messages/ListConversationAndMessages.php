<?php

namespace App\Http\Livewire\Admin\Messages;


use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use App\Models\Conversation;
use GuzzleHttp\Promise\Create;

class ListConversationAndMessages extends Component
{
    public $body;
    public $selectedConversation;

    public function mount()
    {
        $this->selectedConversation = Conversation::query()
        ->where('sender_id', auth()->id())
        ->orWhere('receiver_id', auth()->id())
        ->first();
    }


    public function viewMessage($conversationId)
    {
        $this->selectedConversation = Conversation::findOrFail($conversationId);
    }

    public function sendMessage()
    {
        Message::create([
            'conversation_id'=>$this->selectedConversation->id,
            'user_id'=>auth()->id(),
            'body'=>$this->body,
        ]);
    }

    public function render()
    {
        $this->users = User::where('id', '!=', auth()->user()->id)->get();
        $conversations = Conversation::query()
        ->where('sender_id', auth()->id())
        ->orWhere('receiver_id', auth()->id())
        ->get();

        return view('livewire.admin.messages.list-conversation-and-messages',['conversations'=>$conversations])->layout('layouts.master');
    }
}
