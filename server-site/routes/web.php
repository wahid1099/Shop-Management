<?php
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\UserController;
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
    return view('welcome');
});


//User Routing for user controller adding user and deleting selecting
Route::post('/addUser',[UserController::class,'addUser']);
Route::get('/SelectUser',[UserController::class,'SelectUser']);
Route::get('/deleteUse0/{id}r',[UserController::class,'deleteUser']);
Route::post('/updateUser',[UserController::class,'updateUser']);


//Category Routing for Category controller adding user and deleting Category
Route::post('/AddCategory',[CategoryController::class,'AddCategory']);
Route::get('/SelectCategory',[CategoryController::class,'SelectCategory']);
Route::get('/DeleteCategory/{id}',[CategoryController::class,'DeleteCategory']);
Route::post('/UpdateCategory',[CategoryController::class,'UpdateCategory']);