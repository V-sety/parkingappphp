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
    'uses'=>'ClientsController@deleteClient'
    ]);
Route::delete('/clients/car/{id}', [
    'before' => 'crsf',
    'uses'=>'CarsController@deleteCar'
    ]);
Route::get('/clients/car/{id}/edit', 'PagesController@editCar');
Route::get('/clients/create', 'ClientsController@addAclient');
Route::get('/clients/{id}', 'PagesController@showCars');
Route::get('/clients/{id}/edit', 'PagesController@editclient');
Route::get('/add', 'PagesController@add');
Route::put('/park', [
    'uses'=> 'CarsController@parkCar',
    'before' => 'crsf'
]);
Route::get('park/ajax/{id}', [
    'uses'=> 'CarsController@onChange',
    'as'=> 'park.ajax'
    ]);

Route::post('/clients/create', [
    'before' => 'crsf',
    'uses'=> 'ClientsController@saveInfo'
]);
Route::post('/add', [
    'before' => 'crsf',
    'uses' => 'CarsController@saveCar'
  ]);
Route::post('/clients/{id}/edit', [
    'before' => 'crsf',
    'uses'=> 'ClientsController@saveEditClient'
]);
Route::put('/clients/{id}/edit', [
    'before' => 'crsf',
    'uses'=> 'ClientsController@saveEditClient'
]);
Route::put('/clients/car/{id}/edit', [
    'before' => 'crsf',
    'uses'=> 'CarsController@saveEditCar'
]);
