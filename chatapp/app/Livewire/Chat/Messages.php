<?php

namespace App\Livewire\Chat;

use App\Models\Message;
use App\Models\Room;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Crypt;
use Livewire\Attributes\On;

class Messages extends Component
{

    public Room $room;

    public Collection $messages;

    public function mount()
    {
        $this->fill(
            [
                'messages' => $this->room->messages()->with('user')->oldest()->take(100)->get()
            ]
        );
    }

    #[On('message.created')]
    public function prependMessage($id)
    {
        $message = Message::with('user')->find($id);

        $message['body'] = Crypt::decrypt($message['body']);

        $this->messages->push($message);
    }

    #[On('echo-private:chat.rool.{room.id},MessageCreated')]
    public function prependMessagesFromBroadcast($payload)
    {
        $this->prependMessage($payload['message']['id']);
    }

    public function render()
    {
        return view('livewire.chat.messages');
    }
}
