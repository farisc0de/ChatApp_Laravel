<div class="flex space-x-3">
    <div>
        <img src="{{ $message->user->avatar() }}" alt="{{ $message->user->name }}" class="h-10 w-10 rounded-full">
    </div>
    <div>
        <div class="flex items-baseline space-x-2">
            <span class="font-semibold">{{ $message->user->name }}</span>
            <span class="text-gray-500 text-xs">{{ $message->created_at->diffForHumans() }}</span>
        </div>

        <p class="text-gray-900">{{ $message->body }}</p>
    </div>
</div>
