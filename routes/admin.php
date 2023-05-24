<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])
    ->name('admin.login');
Route::get('/admin/logout', [App\Http\Controllers\Auth\LogoutController::class, 'adminLogout'])
    ->name('admin.logout');

Route::get('/admin', function () {
    return redirect('/admin/login');
});
Route::get('/dashboard', function () {
    return redirect('/admin/login');
});


Route::get('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'perform'])->name('logout.perform');

// <--- Admin access --->
Route::group(['middleware' => ['auth','is_admin']], function () {

    Route::get('admin/sendMail', [SendMailController::class, 'index'])->name('admin.sendMail');
    Route::post('admin/sendMail/send', [SendMailController::class, 'send'])->name('admin.sendMail.send');

    Route::get('/dashboard/admin', [App\Http\Controllers\HomeController::class, 'admin'])
        ->name('admin')->middleware('is_admin');

    Route::post('admin/userGroup/filter/', [UserGroupController::class, 'filter']);
    Route::get('admin/userGroup', [UserGroupController::class, 'index'])->name('userGroup.index');
    Route::get('admin/userGroup/create', [UserGroupController::class, 'create'])->name('userGroup.create');
    Route::post('admin/userGroup', [UserGroupController::class, 'store'])->name('userGroup.store');
    Route::get('admin/userGroup/{id}/edit', [UserGroupController::class, 'edit'])->name('userGroup.edit');
    Route::patch('admin/userGroup/{id}', [UserGroupController::class, 'update'])->name('userGroup.update');
    Route::delete('admin/userGroup/{id}', [UserGroupController::class, 'destroy'])->name('userGroup.destroy');

    Route::post('admin/designation/filter/', [DesignationController::class, 'filter']);
    Route::get('admin/designation', [DesignationController::class, 'index'])->name('designation.index');
    Route::get('admin/designation/create', [DesignationController::class, 'create'])->name('designation.create');
    Route::post('admin/designation', [DesignationController::class, 'store'])->name('designation.store');
    Route::get('admin/designation/{id}/edit', [DesignationController::class, 'edit'])->name('designation.edit');
    Route::patch('admin/designation/{id}', [DesignationController::class, 'update'])->name('designation.update');
    Route::delete('admin/designation/{id}', [DesignationController::class, 'destroy'])->name('designation.destroy');

    Route::post('admin/department/filter/', [DepartmentController::class, 'filter']);
    Route::get('admin/department', [DepartmentController::class, 'index'])->name('department.index');
    Route::get('admin/department/create', [DepartmentController::class, 'create'])->name('department.create');
    Route::post('admin/department', [DepartmentController::class, 'store'])->name('department.store');
    Route::get('admin/department/{id}/edit', [DepartmentController::class, 'edit'])->name('department.edit');
    Route::patch('admin/department/{id}', [DepartmentController::class, 'update'])->name('department.update');
    Route::delete('admin/department/{id}', [DepartmentController::class, 'destroy'])->name('department.destroy');


    // :::::::: Start User Route ::::::::::::::

    Route::get('admin/users/profile/', function () {
        return View::make('admin/users/user_profile');
    });
    Route::post('admin/users/editProfile/', [UsersController::class, 'editProfile']);
    Route::resource('admin/users', UsersController::class, ['except' => ['show']]);
    Route::get('admin/users/activate/{id}/{param?}', [UsersController::class, 'active']);

        // :::::::: End User Route ::::::::::::::

});
