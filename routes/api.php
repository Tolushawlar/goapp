<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AjaxRequest;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!

*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// route for the storeowners api call in the frontend
Route::resource('suggestions', 'SuggestionsController')->except(['create', 'edit']);


