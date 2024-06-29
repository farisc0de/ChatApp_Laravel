<?php

namespace App\Livewire\Chat\Pages;

use App\Models\Message;
use App\Models\Room;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

class RoomShow extends Component
{

    public Room $room;


    #[Rule('required')]
    public string $body = '';

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.chat.pages.room-show');
    }

    public function submit()
    {
        $this->validate();

        $message = Message::make($this->only('body'));

        $message->user()->associate(auth()->user());

        $message->room()->associate($this->room);

        $message->save();

        $this->reset('body');

        $this->dispatch('message.created', $message->id);

        broadcast(new \App\Events\MessageCreated($this->room, $message))->toOthers();
    }
}
