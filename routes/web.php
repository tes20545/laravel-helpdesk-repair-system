<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\HelpdeskAdmin;
use App\Http\Controllers\HelpdeskController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QeueController;
use App\Http\Controllers\UserController;
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

Route::get('/', [Dashboard::class, 'index'])->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('user-management')->name('users.')->group(function (){
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
    Route::put('/recovery/{id}', [UserController::class, 'recovery'])->name('recovery');

});

Route::prefix('helpdesk')->name('helpdesk.')->group(function (){
    Route::get('/', [HelpdeskController::class, 'index'])->name('index');
    Route::get('/create', [HelpdeskController::class, 'create'])->name('create');
    Route::post('/store', [HelpdeskController::class, 'store'])->name('store');
    Route::get('/show/{helpdesk}', [HelpdeskController::class, 'show'])->name('show');
    Route::get('/edit/{helpdesk}', [HelpdeskController::class, 'edit'])->name('edit');
    Route::put('/update/{helpdesk}', [HelpdeskController::class, 'update'])->name('update');
    Route::delete('/delete/{helpdesk}', [HelpdeskController::class, 'destroy'])->name('delete');

});

Route::prefix('helpdesk-admin')->name('ha.')->group(function (){
    Route::get('/', [HelpdeskAdmin::class, 'index'])->name('index');
    Route::get('/create', [HelpdeskAdmin::class, 'create'])->name('create');
    Route::post('/store', [HelpdeskAdmin::class, 'store'])->name('store');
    Route::get('/show/{helpdesk}', [HelpdeskAdmin::class, 'show'])->name('show');
    Route::get('/edit/{helpdesk}', [HelpdeskAdmin::class, 'edit'])->name('edit');
    Route::put('/update/{helpdesk}', [HelpdeskAdmin::class, 'update'])->name('update');
    Route::delete('/delete/{helpdesk}', [HelpdeskAdmin::class, 'destroy'])->name('delete');

});

Route::prefix('qeue')->name('qeue.')->group(function (){
    Route::get('/', [QeueController::class, 'index'])->name('index');
    Route::get('/create', [QeueController::class, 'create'])->name('create');
    Route::post('/store', [QeueController::class, 'store'])->name('store');
    Route::get('/show/{qeue}', [QeueController::class, 'show'])->name('show');
    Route::get('/edit/{qeue}', [QeueController::class, 'edit'])->name('edit');
    Route::put('/update/{qeue}', [QeueController::class, 'update'])->name('update');
    Route::delete('/delete/{qeueqeue}', [QeueController::class, 'destroy'])->name('delete');

});

Route::prefix('map')->name('maps.')->group(function (){

});

require __DIR__.'/auth.php';
