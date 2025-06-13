<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\User\Index as UserIndex;
use App\Livewire\Admin\User\Create as UserCreate;
use App\Livewire\Admin\User\Edit as UserEdit;
use App\Livewire\Admin\Product\Index as ProductIndex;
use App\Livewire\Admin\Product\Create as ProductCreate;
use App\Livewire\Admin\Product\Edit as ProductEdit;
use App\Livewire\Admin\Category\Index as CategoryIndex;
use App\Livewire\Admin\Category\Create as CategoryCreate;
use App\Livewire\Admin\Category\Edit as CategoryEdit;
use App\Livewire\User\Checkout;
use App\Livewire\User\OrderHistory;
use App\Http\Controllers\Admin\DashboardController;

Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', Checkout::class)->name('checkout');
    Route::get('/thank-you', function () {
        return view('thank-you');
    })->name('checkout.thankyou');
    Route::get('/orders', OrderHistory::class)->name('user.orders');
});

Route::view('/', 'welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/users', UserIndex::class)->name('admin.users.index');
    Route::get('/users/create', UserCreate::class)->name('admin.users.create');
    Route::get('/users/{user}/edit', UserEdit::class)->name('admin.user.edit');
    Route::delete('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.user.destroy');

    Route::get('/products', ProductIndex::class)->name('admin.products.index');
    Route::get('/products/create', ProductCreate::class)->name('admin.products.create');
    Route::get('/products/{product}/edit', ProductEdit::class)->name('admin.products.edit');
    Route::delete('/products/{product}', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('admin.products.destroy');

    Route::get('/categories', CategoryIndex::class)->name('admin.categories.index');
    Route::get('/categories/create', CategoryCreate::class)->name('admin.categories.create');
    Route::get('/categories/{category}/edit', CategoryEdit::class)->name('admin.categories.edit');
    Route::delete('/categories/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    Route::get('/orders', App\Livewire\Admin\Order\Index::class)->name('admin.orders');
});


require __DIR__ . '/auth.php';
