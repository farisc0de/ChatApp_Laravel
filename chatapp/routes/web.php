<?php

use App\Livewire\Chat\Pages\Rooms;
use App\Livewire\Chat\Pages\RoomShow;
use Illuminate\Support\Facades\Route;

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/chat/{room:slug}', RoomShow::class)->middleware('auth')->name('chat.room');

Route::get('/', Rooms::class)
    ->middleware(['auth'])
    ->name('rooms');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
