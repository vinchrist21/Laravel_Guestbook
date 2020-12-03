<?php
//
//use App\Http\Controllers\Auth\ActivationController;
//use App\Http\Controllers\Creator\EventController as CreatorEventController;
//use App\Http\Controllers\User\EventController as UserEventController;
//use App\Http\Controllers\EventController;
//use App\Http\Controllers\UserController;
//use App\Http\Controllers\Admin\EventController as AdminEventController;
//use App\Http\Controllers\GuestController as CreatorGuestController;
//use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Route;
//
///*
//|--------------------------------------------------------------------------
//| Web Routes
//|--------------------------------------------------------------------------
//|
//| Here is where you can register web routes for your application. These
//| routes are loaded by the RouteServiceProvider within a group which
//| contains the "web" middleware group. Now create something great!
//|
//*/
//
//
//Route::view('/user', 'user.index');
//Route::view('/bryanub', 'bryanub');
//
//Route::get('/', function (){
//    return redirect()->route('event.index');
//});
//
//Route::resource('event', EventController::class);
//
////Route::resource('user', UserController::class);
//
//Route::get('activate',[ActivationController::class,'activate'])->name('activate');
//
////Route::resource('event', EventController::class);
//
//Route::group(['middleware'=>'admin','prefix'=>'admin','as'=>'admin.'],function (){
//    Route::resource('user', UserController::class);
//    Route::resource('event',AdminEventController::class);
//});
//
//
//Route::group(['middleware'=>'creator','prefix'=>'creator','as'=>'creator.'],function (){
//
//    Route::post('guests/{id}/approve', [CreatorGuestController::class, 'approve'])->name('guests.approve');
//    Route::post('guests/{id}/decline', [CreatorGuestController::class, 'decline'])->name('guests.decline');
//
//    Route::resource('guests',CreatorGuestController::class);
//    Route::resource('events', CreatorEventController::class);
//
//});
//
//
//Route::group(['middleware'=>'user','prefix'=>'user','as'=>'user.'],function (){
//    Route::resource('event', UserEventController::class);
//});
//
//
//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


use App\Http\Controllers\AuthActivationController;
use App\Http\Controllers\Creator\EventController as CreatorEventController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\User\EventController as UserEventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Creator\GuestController as CreatorGuestController;
use App\Http\Controllers\User\GuestController as UserGuestController;
use App\Http\Controllers\User\UserController as UUserController;
use Illuminate\Support\Facades\Auth;
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


Route::view('/user', 'user.index');
Route::view('/bryanub', 'bryanub');

Route::get('/', function () {
    return redirect()->route('event.index');
});

Route::resource('event', EventController::class);

//Route::resource('user', UserController::class);

Route::get('activate', [AuthActivationController::class, 'activate'])->name('activate');

//Route::resource('event', EventController::class);

Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('user', UserController::class);
    Route::resource('event', AdminEventController::class);
});


Route::group(['middleware' => 'creator', 'prefix' => 'creator', 'as' => 'creator.'], function () {
    Route::resource('event', CreatorEventController::class);

    Route::post('guests/{id}/approve', [CreatorGuestController::class, 'approve'])->name('guests.approve');
    Route::post('guests/{id}/decline', [CreatorGuestController::class, 'decline'])->name('guests.decline');

    Route::resource('guests', CreatorGuestController::class);
    Route::resource('events', CreatorEventController::class);
});


Route::group(['middleware' => 'user', 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::resource('event', UserEventController::class);

    Route::resource('events', UserGuestController::class);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

