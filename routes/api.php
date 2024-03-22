<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('stands/trash', [\App\Http\Controllers\StandController::class, 'trash'])->name('stand.trash');
Route::delete('stands/{stand}/trash', [\App\Http\Controllers\StandController::class, 'forceDelete'])->name('stand.forceDelete');
Route::post('stands/{stand}/restore', [\App\Http\Controllers\StandController::class, 'restore'])->name('stand.restore');
Route::apiResource('stands', \App\Http\Controllers\StandController::class)->names('stand');


Route::apiResource('stands/{stand}/products', \App\Http\Controllers\ProductController::class)->names('product')->middleware('product.check');
// Route::apiResource('stands/{stand}/products/{product}/prices', \App\Http\Controllers\ProductPriceController::class)->names('product.price');
