<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\UnitController;
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
Route::group(['middleware' => ['auth', 'is_admin']], function () {

    // Route::get('admin/view', function () {
    //     return view('admin.folder.file', ['view' => 'No Data']);
    // });

    //mail sending
    Route::get('admin/sendMail', [SendMailController::class, 'index'])->name('admin.sendMail');
    Route::post('admin/sendMail/send', [SendMailController::class, 'send'])->name('admin.sendMail.send');

    //dashboard
    Route::get('/dashboard/admin', [App\Http\Controllers\HomeController::class, 'admin'])
        ->name('admin')->middleware('is_admin');

    // :::::::: Start User Route ::::::::::::::

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


    Route::get('admin/users/profile/', function () {
        return View::make('admin/users/user_profile');
    });
    Route::post('admin/users/editProfile/', [UsersController::class, 'editProfile']);
    Route::resource('admin/users', UsersController::class, ['except' => ['show']]);
    Route::get('admin/users/activate/{id}/{param?}', [UsersController::class, 'active']);

    // :::::::: End User Route ::::::::::::::

    //product start

    Route::post('admin/productCategory/filter/', [ProductCategoryController::class, 'filter']);
    Route::get('admin/productCategory', [ProductCategoryController::class, 'index'])->name('productCategory.index');
    Route::get('admin/productCategory/create', [ProductCategoryController::class, 'create'])->name('productCategory.create');
    Route::post('admin/productCategory', [ProductCategoryController::class, 'store'])->name('productCategory.store');
    Route::get('admin/productCategory/{id}/edit', [ProductCategoryController::class, 'edit'])->name('productCategory.edit');
    Route::patch('admin/productCategory/{id}', [ProductCategoryController::class, 'update'])->name('productCategory.update');
    Route::delete('admin/productCategory/{id}', [ProductCategoryController::class, 'destroy'])->name('productCategory.destroy');

    Route::post('admin/brand/filter/', [BrandController::class, 'filter']);
    Route::get('admin/brand', [BrandController::class, 'index'])->name('brand.index');
    Route::get('admin/brand/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('admin/brand', [BrandController::class, 'store'])->name('brand.store');
    Route::get('admin/brand/{id}/edit', [BrandController::class, 'edit'])->name('brand.edit');
    Route::patch('admin/brand/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::delete('admin/brand/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');

    Route::post('admin/unit/filter/', [UnitController::class, 'filter']);
    Route::get('admin/unit', [UnitController::class, 'index'])->name('unit.index');
    Route::get('admin/unit/create', [UnitController::class, 'create'])->name('unit.create');
    Route::post('admin/unit', [UnitController::class, 'store'])->name('unit.store');
    Route::get('admin/unit/{id}/edit', [UnitController::class, 'edit'])->name('unit.edit');
    Route::patch('admin/unit/{id}', [UnitController::class, 'update'])->name('unit.update');
    Route::delete('admin/unit/{id}', [UnitController::class, 'destroy'])->name('unit.destroy');

    //product end
});
