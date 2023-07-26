<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

// Route for user
Route::match(['get', 'post'],'/user/list', [UserController::class, 'list'])->name('user.list');
Route::get('/user/listTrashed', [UserController::class, 'listTrashed'])->name('user.listTrashed');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::patch('/user/update/{id}', [UserController::class, 'update'])->name('user.update');

Route::post('/user/add', [UserController::class, 'addNew'])->name('user.add');
Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
Route::get('/user/restore/{id}', [UserController::class, 'restore'])->name('user.restore');
Route::get('/user/forceDelete/{id}', [UserController::class, 'forceDelete'])->name('user.forceDelete');
Route::get('/user/detail/{id}', [UserController::class, 'detail'])->name('user.detail');
Route::match(['get', 'patch'],'/user/changePassword/{id}', [UserController::class, 'changePassowrd'])->name('user.changePassword');
Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
    Route::get('/user/viewAdd', [UserController::class, 'viewAdd'])->name('user.viewAdd');
});