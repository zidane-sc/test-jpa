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

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/trending/{trending}', 'TrendingController@show')->name('trending.show');

Route::get('/settings/devices', 'DeviceController@index')->name('devices.index');

Route::get('/settings/devices/create', 'DeviceController@create')->name('devices.create');
Route::post('/settings/devices', 'DeviceController@store')->name('devices.store');

Route::get('/settings/devices/{device}/edit', 'DeviceController@edit')->name('devices.edit');
Route::patch('/settings/devices/{device}', 'DeviceController@update')->name('devices.update');

Route::delete('/settings/devices/{device}', 'DeviceController@destroy')->name('devices.destroy');

Route::get('/devices/set/{device}', 'DeviceController@set')->name('devices.set');
