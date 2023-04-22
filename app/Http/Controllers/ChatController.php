<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user)
    {
        if($user->id) {

            $conversation = Conversation::where('receiver_id', auth()->user()->id)->where('sender_id', $user->id)->first();

            if(!$conversation)
            {
                $conversation = Conversation::firstOrCreate([
                    'sender_id' => auth()->id(),
                    'receiver_id' => $user->id,
                ]);
            }
        }

        return view('users.chat', [
            'conversation' => $conversation ?? null
        ]);
    }
}
