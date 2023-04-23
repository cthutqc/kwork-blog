<?php

namespace App\Http\Livewire;

use App\Models\Conversation;
use App\Models\Message;
use App\Notifications\NewMessageNotification;
use Livewire\Component;

class Chat extends Component
{
    public $body;

    public $selectedConversation;

    public function mount()
    {
        $this->selectConversation();
    }

    public function selectConversation()
    {
        $this->selectedConversation = Conversation::query()
            ->where('sender_id', auth()->id())
            ->orWhere('receiver_id', auth()->id())
            ->orderByDesc('updated_at')
            ->first();

        $this->readMessages();
    }

    public function readMessages()
    {
        if(isset($this->selectedConversation)) {
            $this->selectedConversation->messages()->where('receiver_id', auth()->user()->id)->each(function ($message){
                $message->update([
                    'unread' => false,
                ]);
            });
        }
    }

    public function sendMessage()
    {
        $this->validate([
            'body' => ['required'],
        ]);

        if(!isset($this->selectedConversation)) {
            return;
        }

        Message::create([
            'conversation_id' => $this->selectedConversation->id,
            'user_id' => auth()->id(),
            'body' => $this->body,
            'receiver_id' => $this->selectedConversation->receiver_id === auth()->id() ? $this->selectedConversation->sender_id : $this->selectedConversation->receiver_id
        ]);

        $this->selectedConversation->update([
            'updated_at' => now()
        ]);

        $this->reset('body');

        $this->viewMessage($this->selectedConversation->id);

        $diff_in_minutes = now()->diffInMinutes($this->selectedConversation->receiver->last_activity);

        if($diff_in_minutes > 10) {
            $this->selectedConversation->receiver->notify(new NewMessageNotification());
        }

        $this->dispatchBrowserEvent('scrollDown');
    }

    public function viewMessage($conversationId)
    {
        $this->selectedConversation = Conversation::findOrFail($conversationId);
    }


    public function render()
    {
        if(!$this->selectedConversation) {
            $this->selectConversation();
        }

        $conversations = Conversation::query()
            ->where('sender_id', auth()->id())
            ->orWhere('receiver_id', auth()->id())
            ->has('messages')
            ->get();

        return view('livewire.chat', [
            'conversations' => $conversations
        ]);
    }
}
