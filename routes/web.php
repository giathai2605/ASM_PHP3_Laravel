<?php

use Illuminate\Support\Facades\Route;
use  Illuminate\Routing\AbstractRouteCollection;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PropertyCategoryController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PostCategoryController;


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


// Login
Route::match(['get','post'],'/login', [UserController::class, 'login'])->name('login');
// Register
Route::match(['get','post'],'/register', [UserController::class, 'register'])->name('register');

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('welcome');
    });
    Route::match(['get', 'post'],'/user/list', [UserController::class, 'list'])->name('user.list');

Route::middleware(['check.role'])->group(function(){
    // Route for user
Route::get('/user/listTrashed', [UserController::class, 'listTrashed'])->name('user.listTrashed');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::patch('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::post('/user/add', [UserController::class, 'addNew'])->name('user.add');
Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
Route::get('/user/restore/{id}', [UserController::class, 'restore'])->name('user.restore');
Route::get('/user/forceDelete/{id}', [UserController::class, 'forceDelete'])->name('user.forceDelete');
Route::get('/user/detail/{id}', [UserController::class, 'detail'])->name('user.detail');
Route::match(['get', 'patch'],'/user/changePassword/{id}', [UserController::class, 'changePassowrd'])->name('user.changePassword');
Route::get('/user/viewAdd', [UserController::class, 'viewAdd'])->name('user.viewAdd');

// File Manager
Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

// Route Property Category
Route::match(['get', 'post'],'/propertyCategory/list', [PropertyCategoryController::class, 'list'])->name('propertyCategory.list');
Route::match(['get', 'post'],'/propertyCategory/listTrashed', [PropertyCategoryController::class, 'listTrashed'])->name('propertyCategory.listTrashed');
Route::match(['get', 'patch'],'/propertyCategory/edit/{id}', [PropertyCategoryController::class, 'edit'])->name('propertyCategory.edit');
Route::match(['get', 'post'],'/propertyCategory/add', [PropertyCategoryController::class, 'add'])->name('propertyCategory.add');
Route::get('/propertyCategory/delete/{id}', [PropertyCategoryController::class, 'delete'])->name('propertyCategory.delete');
Route::get('/propertyCategory/restore/{id}', [PropertyCategoryController::class, 'restore'])->name('propertyCategory.restore');
Route::get('/propertyCategory/forceDelete/{id}', [PropertyCategoryController::class, 'forceDelete'])->name('propertyCategory.forceDelete');

// Route Post Category
Route::match(['get', 'post'],'/postCategory/list', [PostCategoryController::class, 'list'])->name('postCategory.list');
Route::match(['get', 'post'],'/postCategory/listTrashed', [PostCategoryController::class, 'listTrashed'])->name('postCategory.listTrashed');
Route::match(['get', 'patch'],'/postCategory/edit/{id}', [PostCategoryController::class, 'edit'])->name('postCategory.edit');
Route::match(['get', 'post'],'/postCategory/add', [PostCategoryController::class, 'add'])->name('postCategory.add');
Route::get('/postCategory/delete/{id}', [PostCategoryController::class, 'delete'])->name('postCategory.delete');
Route::get('/postCategory/restore/{id}', [PostCategoryController::class, 'restore'])->name('postCategory.restore');
Route::get('/postCategory/forceDelete/{id}', [PostCategoryController::class, 'forceDelete'])->name('postCategory.forceDelete');

// Route Role
Route::match(['get', 'post'],'/role/list', [RoleController::class, 'list'])->name('role.list');
Route::match(['get', 'post'],'/role/listTrashed', [RoleController::class, 'listTrashed'])->name('role.listTrashed');
Route::match(['get', 'patch'],'/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
Route::match(['get', 'post'],'/role/add', [RoleController::class, 'add'])->name('role.add');
Route::get('/role/delete/{id}', [RoleController::class, 'delete'])->name('role.delete');
Route::get('/role/restore/{id}', [RoleController::class, 'restore'])->name('role.restore');
Route::get('/role/forceDelete/{id}', [RoleController::class, 'forceDelete'])->name('role.forceDelete');

});

// Route Logout
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

});

