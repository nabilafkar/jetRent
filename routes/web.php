<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\UnitController;

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

Route::get('/', [LandingpageController::class, 'index'])->name('landingpage');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/register', [AuthController::class, 'indexRegister']);

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/admin/unit', [UnitController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/unit/{unit}', [UnitController::class, 'show'])->name('unit.show');
        Route::get('/admin/{unit}/edit/unit', [UnitController::class, 'edit'])->name('unit.edit');
        Route::post('/admin/unit', [UnitController::class, 'store'])->name('unit.store');
        Route::get('/adminn/unit/tambah', [UnitController::class, 'create'])->name('unit.create');
        Route::put('/admin/unit/{unit}', [UnitController::class, 'update'])->name('unit.update');
        Route::delete('/admin/unit/{unit}', [UnitController::class, 'destroy'])->name('unit.destroy');

        Route::get('admin/rentals/create/{unit}', [RentalController::class, 'create'])->name('rentals.create');
        Route::post('admin/rentals', [RentalController::class, 'store'])->name('rentals.store');
    });

    Route::group(['middleware' => ['role:user']], function () {
        Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    });
});
