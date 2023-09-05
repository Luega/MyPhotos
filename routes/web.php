<?php

use App\Http\Controllers\Admin\PhotoController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Il prefisso delle rotte é admin
// Il namespace é admin 
// Il middleware vede se sei autenticato o no
Route::prefix('admin')->middleware('auth')->group(function () {

    Route::resource('photos', PhotoController::class);
   
});
