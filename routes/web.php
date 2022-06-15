<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

// guest komplain
Route::get('komplain/guest', [Controllers\KomplainCRUDController::class, 'create_guest'])->name('komplain.store.guest');
Route::post('komplain', [Controllers\KomplainCRUDController::class, 'store'])->name('komplain.store');

Route::middleware(['auth'])->group(function() {
    // users
    Route::resource('users', Controllers\UserCRUDController::class);
    Route::post('delete-user', [Controllers\UserCRUDController::class, 'destroy']);

    // energy
    Route::get('energy', [Controllers\UtilitasController::class, 'index']);
    Route::post('energy',  [Controllers\UtilitasController::class, 'upsert'])->name('energy.upsert');
    Route::get('energy/list',  [Controllers\UtilitasController::class, 'list'])->name('energy.list');

    // utilitas
    Route::resource('utilitas', Controllers\UtilitasCRUDController::class);

    // komplain
    Route::get('komplain', [Controllers\KomplainCRUDController::class, 'index'])->name('komplain.index');
    Route::get('komplain/create', [Controllers\KomplainCRUDController::class, 'create'])->name('komplain.create');
    Route::get('komplain/{komplain}', [Controllers\KomplainCRUDController::class, 'show'])->name('komplain.show');
    Route::get('komplain/{komplain}/edit', [Controllers\KomplainCRUDController::class, 'edit'])->name('komplain.edit');
    Route::put('komplain/{komplain}', [Controllers\KomplainCRUDController::class, 'update'])->name('komplain.update');
});


