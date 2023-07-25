<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Todocontroller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('/todo')->group (function () {
     
    Route::post('/store', [Todocontroller::class, 'store']);
    Route::put('/{id}', [Todocontroller::class, 'update']);
    Route::delete('/{id}' ,[Todocontroller::class, 'destroy']);
    Route::get('/', [Todocontroller::class, 'index']);

});
