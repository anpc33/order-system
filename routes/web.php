<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\User\Index as UserIndex;
use App\Livewire\Admin\User\Create as UserCreate;
use App\Livewire\Admin\User\Edit as UserEdit;


Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/users', UserIndex::class)->name('admin.users.index');
    Route::get('/users/create', UserCreate::class)->name('admin.users.create');
    Route::get('/users/{user}/edit', UserEdit::class)->name('admin.user.edit');
    Route::delete('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.user.destroy');
});


require __DIR__ . '/auth.php';
