<?php

use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('catalogue')->group(function () {
    Route::get('/attributes', function() {
        return response()->json(ProductAttribute::all());
    });

    Route::post('/attributes/{attribute}/values/store', function(Request $request, ProductAttribute $attribute) {
        return response()->json($attribute);
    });
});