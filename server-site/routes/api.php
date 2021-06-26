<?php

use App\Http\Controllers\ReportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransectionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DahsBoardController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




//User Routing for user controller adding user and deleting selecting
Route::post('/addUser',[UserController::class,'addUser']);
Route::get('/SelectUser',[UserController::class,'SelectUser']);
Route::get('/deleteUser/{id}',[UserController::class,'deleteUser']);
Route::post('/updateUser',[UserController::class,'updateUser']);





//Category table Routing for user controller adding user and deleting selecting
Route::post('/AddCategory',[CategoryController::class,'AddCategory']);
Route::get('/SelectCategory',[CategoryController::class,'SelectCategory']);
Route::get('/DeleteCategory/{id}',[CategoryController::class,'DeleteCategory']);
Route::post('/UpdateCategoryWithImage',[CategoryController::class,'UpdateCategoryWithImage']);
Route::post('/UpdateCategoryWithoutImage',[CategoryController::class,'UpdateCategoryWithoutImage']);





//Prodcut table Routing for user controller adding user and deleting selecting
Route::post('/AddProduct',[ProductController::class,'AddProduct']);
Route::get('/SelectProduct',[ProductController::class,'SelectProduct']);
Route::get('/DeleteProduct/{id}',[ProductController::class,'DeleteProduct']);
Route::post('/UpdateProductWithImage',[ProductController::class,'UpdateProductWithImage']);
Route::post('/UpdateProductWithoutImage',[ProductController::class,'UpdateProductWithoutImage']);



Route::post('/SelectProductByCategory/{Category}',[ProductController::class,'SelectProductByCategory']);


//Cart table Routing for user controller adding user and deleting selecting
Route::post('/AddCart',[CartController::class,'AddCart']);
Route::get('/CartList',[CartController::class,'CartList']);
Route::get('/RemoveCartList/{id}',[CartController::class,'RemoveCartList']);
Route::get('/CartItemPlus/{id}/{quantity}/{price}',[CartController::class,'CartItemPlus']);
Route::get('/CartItemMinus/{id}/{quantity}/{price}',[CartController::class,'CartItemMinus']);;



//DashBoard Controller Routing for user controller adding user and deleting selecting
Route::get('/CoutProduct',[DahsBoardController::class,'CoutProduct']);
Route::get('/CountTransection',[DahsBoardController::class,'CountTransection']);
Route::get('/CountCategory',[DahsBoardController::class,'CountCategory']);
Route::get('/IncomeLast7Days',[DahsBoardController::class,'IncomeLast7Days']);
///
////Transection Api route
///
Route::get('/CartSell/{invoice}',[TransectionController::class,'CartSell']);

//Report
Route::get('/TransactionList',[ReportController::class,'TransactionList']);
Route::get('/TransactionListByDate',[ReportController::class,'TransactionListByDate']);
