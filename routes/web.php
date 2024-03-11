<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\SalleUserController;
use App\Http\Controllers\ProfileUserController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ProfContactController;
use App\Http\Controllers\ContactAdminController;
use App\Http\Controllers\SallesReservationController;
use App\Http\Controllers\ReservationAdminController;


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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::group(['prefix'=>'user', 'as'=>'user.', 'middleware'=>['auth','isUser']],function () {
    Route::view('/', 'user.home')->name('home');
    Route::view('email', 'emails.send-mail')->name('email.send-mail');
    Route::resource('salles', SalleUserController::class);
    Route::resource('profile', ProfileUserController::class);
    Route::resource('reservation', ReservationController::class)->except(['creat']);
    Route::get('reservation/creat/{id}',[ReservationController::class, 'creat'])->name('reservation.creat');
    Route::get('/contact', [ProfContactController::class, 'showContactForm'])->name('contact.show');
    Route::post('/contact', [ProfContactController::class, 'submitContactForm'])->name('contact.submit');
    Route::post('/contact_reservation', [ProfContactController::class, 'reserver_contact_form'])->name('contact.reservation');
    
    
});

Route::group(['prefix'=>'admin', 'as'=>'admin.', 'middleware'=>['auth','isAdmin']],function () {
    Route::view('/', 'admin.index')->name('index');
    // Route::view('salles', 'admin.salles')->name('salles');
    Route::resource('users', UserController::class);
    Route::resource('salles', SalleController::class);
    Route::resource('salles_reservation', SallesReservationController::class);
    Route::resource('reservation_admin', ReservationAdminController::class)->except(['create']);
    Route::get('reservation_admin/create/{id}',[ReservationAdminController::class, 'create'])->name('reservation_admin.create');
    Route::resource('contact', ContactAdminController::class)->except('ValideReservationEmailForm');
    Route::post('valide', [ContactAdminController::class, 'ValideReservationEmailForm'])->name('contact.valide');
    Route::post('refuse', [ContactAdminController::class, 'RefuseReservationEmailForm'])->name('contact.refuse');
    Route::get('/index_message', [ContactAdminController::class, 'index_message'])->name('contact.messages');
});


