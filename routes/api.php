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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*  user added code   */

Route::apiResources([
    '/contacts' => 'API\ContactController',
    '/companies' => 'API\CompanyController']
);

// Route::apiResource('/contacts', 'ContactController');

/* deleted code: ->only('create', 'store', 'edit', 'update', 'destroy')  */
