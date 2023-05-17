<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])
    ->name('admin.login');

Route::get('/admin', function () {
    return redirect('/admin/login');
});
Route::get('/dashboard', function () {
    return redirect('/admin/login');
});


Route::get('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'perform'])->name('logout.perform');

// <--- Admin access --->
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard/admin', [App\Http\Controllers\HomeController::class, 'admin'])
        ->name('admin')->middleware('is_admin');

    Route::resource('userGroup', UserGroupController::class);


    Route::post('admin/designation/filter/', [DesignationController::class, 'filter']);
    Route::get('admin/designation', [DesignationController::class, 'index'])->name('designation.index');
    Route::get('admin/designation/create', [DesignationController::class, 'create'])->name('designation.create');
    Route::post('admin/designation', [DesignationController::class, 'store'])->name('designation.store');
    Route::get('admin/designation/{id}/edit', [DesignationController::class, 'edit'])->name('designation.edit');
    Route::patch('admin/designation/{id}', [DesignationController::class, 'update'])->name('designation.update');
    Route::delete('admin/designation/{id}', [DesignationController::class, 'destroy'])->name('designation.destroy');

    Route::resource('department', DepartmentController::class);

    // :::::::: Start User Route ::::::::::::::
    Route::post('users/cpself/', [UsersController::class, 'cpself']);
    Route::get('users/cpself/', function () {
        return View::make('users/change_password_self');
    });
    Route::get('users/profile/', function () {
        return View::make('users/user_profile');
    });
    Route::post('users/editProfile/', [UsersController::class, 'editProfile']);
    Route::resource('users', UsersController::class, ['except' => ['show']]);
    Route::get('users/activate/{id}/{param?}', [UsersController::class, 'active']);
    Route::post('users/pup/', [UsersController::class, 'pup']);
    Route::post('users/filter/', [UsersController::class, 'filter']);
    Route::get('users/cp/{id}/{param?}', [UsersController::class, 'change_pass']);
        // :::::::: End User Route ::::::::::::::

});
