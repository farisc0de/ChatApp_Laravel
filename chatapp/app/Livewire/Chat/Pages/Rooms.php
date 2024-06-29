<?php

namespace App\Livewire\Chat\Pages;

use App\Models\Room;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\Attributes\Layout;

class Rooms extends Component
{

    public Room $room;

    public Collection $rooms;

    public function mount()
    {
        $this->rooms = Room::all();
    }

    #[Layout('layouts.app')]
    public function render()
    {

        $rooms = Room::all();

        return view('livewire.chat.pages.rooms');
    }
}
