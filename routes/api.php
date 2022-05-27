<?php

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('CheckAge','CheckGender')->group(function(){
//     // Route::get('contact',function(){
//     //     return response()->json(['status' => 'OK', 'success' => true], 200);
//     // });
//     Route::get('home',function(){
//         return response()->json(['status' => 'OK', 'success' => true], 200);
//     });
//     Route::get('about',function(){
//         return response()->json(['status' =>'OK', 'success'=> true],200);
//     })->withoutMiddleware(['CheckAge','CheckGender']);
// });

// #CheckRole
// Route::get('role',function(){
//     return response()->json(['status'=> 'OK', 'success'=> true],200);
// })->middleware('CheckRole');

// #CheckName
// Route::get('name',function(){
//     return response()->json(['status'=> 'OK', 'success'=> true],200);
// })->middleware('CheckName');

// Route::middleware('CheckRole','CheckName')->group(function(){
//     Route::get('marks',function(){
//         return response()->json(['status'=>'OK', 'success'=> true,'message'=>'Marks from last test'],200);
//     });
// });

// Route::get('test',function(){
//     return response()->json(['status'=>'OK', 'success'=> true],200);
// })->middleware('CheckStudent');

// Route::post('products/create','API\ProductController@create');
// Route::get('products/index','API\ProductController@index');
// Route::put('products/update/{id}','API\ProductController@update');

// #prefix products to every route in this group
// Route::prefix('products')->group(function(){
//     Route::delete('delete/{id}','API\ProductController@delete');
//     Route::get('show/{id}','API\ProductController@show');
// });

// Route::apiResource('categories','API\CategoryController');

// Route::any('/test-request','TestRequestController@index');
Route::any('/test-request','TestRequestController@testRequest');
