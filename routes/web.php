<?php


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

// Route::get('/', function () {
//     return view('welcome');
// });

// rotue for home pages

Route::get('home/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

Route::middleware(['auth'])->group(function () {

    Route::get('home/doctors', [App\Http\Controllers\HomeController::class, 'doctors'])->name('doctors');
    Route::get('home/departments', [App\Http\Controllers\HomeController::class, 'departments'])->name('departments');
    Route::post('home/booking', [App\Http\Controllers\HomeController::class, 'bookDate'])->name('booking');


});



// route for softDelete  doctor

Route::get('/doctors/hdeleted/{id}', [App\Http\Controllers\DoctorsController::class, 'hdeleted'])->name('doctor.hdeleted');
Route::get('/doctors/restore/{id}', [App\Http\Controllers\DoctorsController::class, 'restore'])->name('doctor.restore');
Route::get('/doctors/trashed', [App\Http\Controllers\DoctorsController::class, 'trashed']);


// route for softDelete  department

Route::get('/departments/hdeleted/{id}', [App\Http\Controllers\DepartmentsController::class, 'hdeleted'])->name('department.hdeleted');
Route::get('/departments/restore/{id}', [App\Http\Controllers\DepartmentsController::class, 'restore'])->name('department.restore');
Route::get('/departments/trashed', [App\Http\Controllers\DepartmentsController::class, 'trashed']);


// rotue for admin pages

Route::resource('doctors', App\Http\Controllers\DoctorsController::class);
Route::resource('departments', App\Http\Controllers\DepartmentsController::class);
Route::resource('messages', App\Http\Controllers\MessagesController::class);
Route::resource('bookings', App\Http\Controllers\BookingController::class);
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

