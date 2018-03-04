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
    return view('shop');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Ruta emprada per dur endavant la verificació del correu electrònic.
Route::get('/verify/{token}', 'EmailVerifyController@verify')->name('verify');

// Rutes emprades per verificar el compte amb GitHub (Socialite).
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');

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
// Només el rol "admin" té capacitat per dur accions sobre usuaris.
// Ho controlem amb el midleware propi de spatie-permission.
Route::middleware(['role:admin'])->group(function () {
    Route::resource('users', 'UserController');
    Route::get('/users/pdf/{view_type}', 'UserController@pdf');
});

// Creem un controlador per controlar la vista del perfil d'usuari ja que ens
// interessa que cada usuari pugui vere, només, el seu perfil i, també, editar-lo.
Route::resource(
    'user',
    'UserProfileController',
    ['only' => [
      'show',
      'edit',
      'update',
      'destroy'
    ]]
);

// Els administradors i treballadors poden gestionar productes.
Route::middleware(['role:admin|worker'])->group(function () {
    Route::resource('products', 'ProductController');
});

// Ruta del RSS, aquest segons el format JSON Fedd.
Route::resource(
    'products-feed',
    'ProductJsonFeedController',
    ['only' => ['index']]
);
