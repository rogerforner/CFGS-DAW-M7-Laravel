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
    return 'Home';
});

Route::get('/users', function () {
    return 'Users';
});

Route::get('/users/new', function () {
    return 'Crear un nou usuari';
});

Route::get('/users/{id}', function ($id) {
    return "Mostrant l'usuari $id";
});

Route::get('/hi/{name}/{nickname}', function ($name, $nickname) {
    return "Benvingut {$name}, el teu apodo és {$nickname}";
});
