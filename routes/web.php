<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [UserController::class, 'index'])->name('index');

Route::get('/dashboard', function () {
    return view('user.dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//Admin Group Middleware
Route::middleware('auth', 'roles:admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
    Route::get('/admin/profile/{user}/edit', [AdminController::class, 'adminProfile'])->name('admin.profile');
    Route::patch('/admin/profile/{user}', [AdminController::class, 'adminProfileUpdate'])->name('admin.profile.update');

    Route::get('/admin/password/{user}/edit', [AdminController::class, 'adminPasswordEdit'])->name('admin.password.edit');
    Route::patch('/admin/password/{user}', [AdminController::class, 'adminPasswordUpdate'])->name('admin.password.update');
});
//End Admin Group Middleware
Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');


//Instructor Group Middleware
Route::middleware('auth', 'roles:instructor')->group(function () {
    Route::get('/instructor/dashboard', [InstructorController::class, 'instructorDashboard'])->name('instructor.dashboard');
    Route::get('/instructor/logout', [InstructorController::class, 'instructorLogout'])->name('instructor.logout');
    Route::get('/instructor/profile/{user}/edit', [InstructorController::class, 'instructorProfile'])->name('instructor.profile');
    Route::patch('/instructor/profile/{user}', [InstructorController::class, 'instructorProfileUpdate'])->name('instructor.profile.update');

    Route::get('/instructor/password/{user}/edit', [InstructorController::class, 'instructorPasswordEdit'])->name('instructor.password.edit');
    Route::patch('/instructor/password/{user}', [InstructorController::class, 'instructorPasswordUpdate'])->name('instructor.password.update');
});
//End Instructor Group Middleware
Route::get('/instructor/login', [InstructorController::class, 'instructorLogin'])->name('instructor.login');
