<?php

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
    return view('welcome');
});

Route::resource('admin/posts', 'Admin\\PostsController');
Route::resource('camps/camps', 'Camps\\CampsController');
Route::resource('datos/datos', 'Datos\\DatosController');
Route::resource('listas/listas', 'listas\\listasController');
