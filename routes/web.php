<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\Instructor\CheckInstructorController;
use App\Http\Controllers\BecomeInstructorController;
use App\Http\Controllers\CourseController;
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
    Route::patch('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/password/{user}/edit', [UserController::class, 'PasswordEdit'])->name('user.password.edit');
    Route::patch('/password/{user}', [UserController::class, 'PasswordUpdate'])->name('user.password.update');
});

require __DIR__ . '/auth.php';

//Admin Group Middleware
Route::middleware('auth', 'roles:admin')->group(function () {

Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
    Route::get('/profile/{user}/edit', [AdminController::class, 'adminProfile'])->name('admin.profile');
    Route::patch('/profile/{user}', [AdminController::class, 'adminProfileUpdate'])->name('admin.profile.update');

    Route::get('/password/{user}/edit', [AdminController::class, 'adminPasswordEdit'])->name('admin.password.edit');
    Route::patch('/password/{user}', [AdminController::class, 'adminPasswordUpdate'])->name('admin.password.update');

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', \App\Http\Controllers\Backend\Category\IndexController::class)->name('admin.category.index');
        Route::get('/create', \App\Http\Controllers\Backend\Category\CreateController::class)->name('admin.category.create');
        Route::post('/', \App\Http\Controllers\Backend\Category\StoreController::class)->name('admin.category.store');

        Route::get('/{category}/edit', \App\Http\Controllers\Backend\Category\EditController::class)->name('admin.category.edit');
        Route::patch('/{category}/', \App\Http\Controllers\Backend\Category\UpdateController::class)->name('admin.category.update');
        Route::get('/{category}', \App\Http\Controllers\Backend\Category\DeleteController::class)->name('admin.category.delete');
    });

    Route::group(['prefix' => 'subcategories'], function () {
        Route::get('/', \App\Http\Controllers\Backend\SubCategory\IndexController::class)->name('admin.subcategory.index');
        Route::get('/create', \App\Http\Controllers\Backend\SubCategory\CreateController::class)->name('admin.subcategory.create');
        Route::post('/', \App\Http\Controllers\Backend\SubCategory\StoreController::class)->name('admin.subcategory.store');

        Route::get('/{subcategory}/edit', \App\Http\Controllers\Backend\SubCategory\EditController::class)->name('admin.subcategory.edit');
        Route::patch('/{subcategory}/', \App\Http\Controllers\Backend\SubCategory\UpdateController::class)->name('admin.subcategory.update');
        Route::get('/{subcategory}', \App\Http\Controllers\Backend\SubCategory\DeleteController::class)->name('admin.subcategory.delete');
    });

    Route::group(['prefix' => 'instructors'], function () {
        Route::get('/', [CheckInstructorController::class, 'index'])->name('admin.instructors.index');
        Route::patch('/{user}', [CheckInstructorController::class, 'update'])->name('admin.instructors.update');
    });
});

});
//End Admin Group Middleware
Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');


//Instructor Group Middleware
Route::group(['prefix' => 'instructor'], function () {
    Route::get('/dashboard', [InstructorController::class, 'instructorDashboard'])->name('instructor.dashboard');
    Route::get('/logout', [InstructorController::class, 'instructorLogout'])->name('instructor.logout');
    Route::get('/profile/{user}/edit', [InstructorController::class, 'instructorProfile'])->name('instructor.profile');
    Route::patch('/profile/{user}', [InstructorController::class, 'instructorProfileUpdate'])->name('instructor.profile.update');

    Route::get('/password/{user}/edit', [InstructorController::class, 'instructorPasswordEdit'])->name('instructor.password.edit');
    Route::patch('/password/{user}', [InstructorController::class, 'instructorPasswordUpdate'])->name('instructor.password.update');

    Route::group(['prefix' => 'courses'], function () {
        Route::get('/', [CourseController::class, 'index'])->name('instructor.course.index');
        Route::get('/create', [CourseController::class, 'create'])->name('instructor.course.create');
        Route::post('/', [CourseController::class, 'store'])->name('instructor.course.store');
        Route::get('/{course}/edit', [CourseController::class, 'edit'])->name('instructor.course.edit');
        Route::patch('/{course}', [CourseController::class, 'update'])->name('instructor.course.update');
        Route::get('/{course}', [CourseController::class, 'delete'])->name('instructor.course.delete');


        Route::get('/subcategory/ajax/{category_id}', [CourseController::class, 'getSubCategories']);
    });

})->middleware('auth', 'roles:instructor');
//End Instructor Group Middleware

Route::get('/instructor/login', [InstructorController::class, 'instructorLogin'])->name('instructor.login');
Route::get('/instructor/register', [BecomeInstructorController::class, 'becomeInstructor'])->name('instructor.register');
Route::post('/instructor', [BecomeInstructorController::class, 'instructorRegister'])->name('instructor.store');
