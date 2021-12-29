<?php

use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use Illuminate\Support\Str;
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
        return response()->json(ProductAttribute::with('attr_values')->get());
    });
    Route::post('/attributes', function(Request $request) {
        $attribute = ProductAttribute::firstOrCreate([
            'name' => $request->name,
            'slug' => $request->slug ?? $request->name
        ]);

        foreach($request->values as $value) {
            ProductAttributeValue::firstOrCreate([
                'name'         => trim($value),
                'slug'         => trim($value),
                'attribute_id' => $attribute->id,
            ]);
        }
        return response()->json(ProductAttribute::where('id', $attribute->id)->with('attr_values')->get());
    });
    Route::post('/attributes/{attribute}/values', function(Request $request, ProductAttribute $attribute) {
        $value = ProductAttributeValue::firstOrCreate([
            'name'         => trim($request->name),
            'slug'         => trim($request->slug ?? $request->name),
            'attribute_id' => $attribute->id,
        ]);
        return response()->json($value);
    });
});