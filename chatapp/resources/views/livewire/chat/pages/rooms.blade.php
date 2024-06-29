    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Rooms
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-12 gap-6">
            @foreach ($rooms as $room)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg col-span-3">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold text-lg text-gray-800 leading-tight">
                            {{ $room->name }}
                        </h3>
                    </div>

                    <div class="p-6 bg-gray-100 text-gray-900">
                        <a href="{{ route('chat.room', $room) }}"
                            class="block bg-indigo-500 hover:bg-indigo-600 text-white font-semibold text-center rounded-lg px-4 py-2">
                            Join
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
