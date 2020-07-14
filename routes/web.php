<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@index');
Route::get('/park', 'PagesController@park');

Route::get('/clients', 'PagesController@clients');
Route::delete('/clients/{id}', [
    'before' => 'csrf',
    'uses'=>'DBController@deleteClient'
    ]);
Route::delete('/clients/car/{id}', [
    'before' => 'crsf',
    'uses'=>'DBController@deleteCar'
    ]);
Route::get('/clients/car/{id}/edit', 'PagesController@editCar');
Route::get('/clients/create', 'DBController@addAclient');
Route::get('/clients/{id}', 'PagesController@showCars');
Route::get('/clients/{id}/edit', 'PagesController@editclient');
Route::get('/add', 'PagesController@add');
Route::put('/park', [
    'uses'=> 'DBController@parkCar',
    'before' => 'crsf'
]);
Route::get('park/ajax/{id}', [
    'uses'=> 'DBController@onChange',
    'as'=> 'park.ajax'
    ]);

Route::post('/clients/create', [
    'before' => 'crsf',
    'uses'=> 'DBController@saveInfo'
]);
Route::post('/add', [
    'before' => 'crsf',
    'uses' => 'DBController@saveCar'
  ]);
Route::post('/clients/{id}/edit', [
    'before' => 'crsf',
    'uses'=> 'DBController@saveEditClient'
]);
Route::put('/clients/{id}/edit', [
    'before' => 'crsf',
    'uses'=> 'DBController@saveEditClient'
]);
Route::put('/clients/car/{id}/edit', [
    'before' => 'crsf',
    'uses'=> 'DBController@saveEditCar'
]);
