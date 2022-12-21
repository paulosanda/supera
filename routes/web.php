<?php

use App\Http\Controllers\MaintananceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserVechicleController;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserVechicleController::class, 'maintanance'])->name('dashboard');
    Route::post('/maintanance', [MaintananceController::class, 'store'])->name('create.maintanance');
    Route::get('/vechicles', [UserVechicleController::class, 'index'])->name('vechicles');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/uservechicles', [UserVechicleController::class, 'uservechicle'])->name('uservechicle');
    Route::post('/uservechicle', [UserVechicleController::class, 'adduservechicle'])
        ->name('adduservechicle');
    Route::delete('/uservechicle/{id}', [UserVechicleController::class, 'destroy'])
        ->name('deleteuservechicle');
});

require __DIR__ . '/auth.php';
