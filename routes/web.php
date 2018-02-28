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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Route::resource
 *
 * Mitjançant aquest tipus de "ruta" fem servir l'arquitectura REST i ens
 * estalviem crear una ruta per a cada acció, és el mètode el que determina
 * quina acció dur a terme.
 *
 * GET /users            -> index()
 * GET /users/create     -> create()
 * POST /users           -> store(Request $request)
 * GET /users/:id        -> show($id)
 * GET /users/:id/edit   -> edit($id)
 * PUT/PATCH /users/:id  -> update(Request $request, $id)
 * DELETE /users/:id     -> destroy($id)
 *
 * $ php artisan route:list
 */
Route::resource('users', 'UserController');
