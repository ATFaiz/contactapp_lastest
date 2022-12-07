<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\ContactController;
use App\HTTP\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

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
    return redirect()->route('login');
});

// Route::get('/', function () {
//     return view ('welcome');
// });

Route::get('/link', function(){
Artisan::call('storage:link');
});



Auth::routes(['verify'=>true]);

// Route::get('/storage/media/{filename}', function () {
//     return response()->file("/var/www/html/contactapp/public/storage/media" . $filename);
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'userIndex'])->name('home')
->middleware('user');

// Auth::routes(['verify'=>true]);
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'adminIndex'])->name('admin.home')
->middleware('role');

// Auth::routes(['verify'=>true]);
Route::resource('user', 'App\Http\Controllers\ContactController')->middleware('user');

