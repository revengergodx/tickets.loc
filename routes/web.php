<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\LabelController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminMainController;
use App\Http\Controllers\AgentMainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserMainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('auth')->group(function () {
    Route::prefix('admin')->middleware('admin')->as('admin.')->group(function () {
        Route::prefix('tickets/{ticket}/comment')->group(function (){
            Route::post('/', CommentController::class)->name('comment.store');
        });
        Route::get('/', AdminMainController::class)->name('main.index');
        Route::controller(CategoryController::class)->prefix('categories')->as('category.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::POST('create', 'store')->name('store');
            Route::get('/{category}/edit', 'edit')->name('edit');
            Route::POST('/{category}/edit', 'update')->name('update');
            Route::delete('/{category}', 'delete')->name('delete');
        });
        Route::controller(LabelController::class)->prefix('labels')->as('label.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::POST('create', 'store')->name('store');
            Route::get('/{label}/edit', 'edit')->name('edit');
            Route::POST('/{label}/edit', 'update')->name('update');
            Route::delete('/{label}', 'delete')->name('delete');
        });
        Route::controller(UserController::class)->prefix('users')->as('user.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::POST('create', 'store')->name('store');
            Route::get('/{user}', 'show')->name('show');
            Route::get('/{user}/edit', 'edit')->name('edit');
            Route::PATCH('/{user}/edit', 'update')->name('update');
            Route::post('/{user}', 'delete')->name('delete');
        });
        Route::controller(TicketController::class)->prefix('tickets')->as('ticket.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::POST('create', 'store')->name('store');
            Route::get('/{ticket}', 'show')->name('show');
            Route::get('/{ticket}/edit', 'edit')->name('edit');
            Route::PATCH('/{ticket}/edit', 'update')->name('update');
            Route::post('/{ticket}', 'delete')->name('delete');
            Route::delete('/delete_image/{img}', 'delete_image')->name('delete_image');
        });
    });

    Route::prefix('agent')->middleware('agent')->as('agent.')->group(function () {
        Route::get('/', AgentMainController::class)->name('main.index');
        Route::prefix('tickets/{ticket}/comment')->group(function (){
            Route::post('/', CommentController::class)->name('comment.store');
        });
        Route::controller(\App\Http\Controllers\Agent\TicketController::class)->prefix('tickets')->as('ticket.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::POST('create', 'store')->name('store');
            Route::get('/{ticket}', 'show')->name('show');
            Route::get('/{ticket}/edit', 'edit')->name('edit');
            Route::PATCH('/{ticket}/edit', 'update')->name('update');
            Route::delete('/delete_image/{img}', 'delete_image')->name('delete_image');
        });
    });

    Route::prefix('user')->as('user.')->group(function () {
        Route::prefix('tickets/{ticket}/comment')->group(function (){
            Route::post('/', CommentController::class)->name('comment.store');
        });
        Route::get('/', UserMainController::class)->name('main.index');
        Route::controller(\App\Http\Controllers\User\TicketController::class)->prefix('tickets')->as('ticket.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::POST('create', 'store')->name('store');
            Route::get('/{ticket}', 'show')->name('show');
        });
    });
});

//Route::controller(TicketController::class)->prefix('tickets')->group(function () {
//    Route::get('/', 'index')->name('ticket.index');
//    Route::get('create', 'create')->name('ticket.create');
//    Route::POST('create', 'store')->name('ticket.store');
//    Route::get('/{ticket}/edit', 'edit')->name('ticket.edit');
//    Route::POST('/{ticket}/edit', 'update')->name('ticket.update');
//    Route::delete('/{ticket}', 'delete')->name('ticket.delete');
//});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
