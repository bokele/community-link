<?php

use App\Http\Controllers\ChannelController;
use App\Http\Controllers\CommunityLinkController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CommunityLinkController::class, 'index'])->name('community.index');
Route::get('/channel/{channel:slug}', [CommunityLinkController::class, 'index'])->name('channel.index');





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});