<?php

use App\Http\Controllers\Api\v1\ApiHelperController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\LoginController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::prefix('v1')->group(function () {

    Route::get('/',function(Request $request){
        return 'Working...';
    });
    Route::post('/login',[LoginController::class,'login']);

    Route::post('/category/create',[ApiHelperController::class,'create_category']);
    Route::post('/post/create',[ApiHelperController::class,'create_post']);

Route::group(['middleware'=>'auth:sanctum',
            'namespace' => 'v1',] ,function(){
    Route::get('/user',[LoginController::class,'getUser']);
});
});