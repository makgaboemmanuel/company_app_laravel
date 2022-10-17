<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvcontacter within a group which
| contains the "web" mcontactdleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* Route::get('/contacts', 'ContactController@index' )->name('contacts.index')->middleware('auth');


Route::post('/contacts', 'ContactController@store' )->name('contacts.store')->middleware('auth');


Route::get('/contacts/create', 'ContactController@create' )->name('contacts.create')->middleware('auth') ;



Route::get( '/contacts/{contact}', 'ContactController@show' )->name('contacts.show')->middleware('auth') ;


Route::put( '/contacts/{contact}', 'ContactController@update' )->name('contacts.update')->middleware('auth') ;


Route::delete( '/contacts/{contact}', 'ContactController@destroy' )->name('contacts.destroy')->middleware('auth') ;


Route::get( '/contacts/{contact}/edit', 'ContactController@edit' )->name('contacts.edit')->middleware('auth') ;

*/

/* to replace all the commented:  */
//  Route::resource('/contacts', 'ContactController')->only('create', 'store', 'edit', 'update', 'destroy');

// Route::resource('/companies.contacts', 'ContactController');

Route::resources([
                    '/contacts' => 'ContactController',
                    '/companies' => 'CompanyController']
);


Auth::routes(  ['verify' => true] );


Route::get('/dashboard', 'HomeController@index')->name('home')->middleware('auth');


/* for account password confirmation */

Route::get('/settings/account', 'Settings\AccountController@index');

Route::get('/settings/profile', 'Settings\ProfileController@edit')->name('settings.profile.edit');

Route::put('/settings/profile', 'Settings\ProfileController@update')->name('settings.profile.update');
