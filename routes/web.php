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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/usuarios/obtenerlistadousuarios', 'UsuarioController@obtenerListadoUsuarios');
Route::get('/usuarios/obtenerlistadoroles', 'UsuarioController@obtenerListadoRoles');
Route::get('/usuarios/obtenerlistadoparrocos', 'UsuarioController@obtenerParrocos');
Route::get('/iglesias/obtenerlistadoiglesias', 'IglesiaController@obtenerIglesias');
Route::get('/iglesias/obtenerlistadodiocesis', 'IglesiaController@obtenerDiocesis');
Route::get('/beneficiarios/obtenerlistadobeneficiarios', 'BeneficiarioController@obtenerBeneficiarios');
Route::get('/beneficiarios/obtenerlistadotiposdoc', 'BeneficiarioController@obtenerTipoDocumento');
Route::get('/ayudas/obtenerlistadoayudas', 'AyudaController@obtenerAyudas');
Route::get('/ayudas/obtenertiposayudas', 'AyudaController@obtenerTipoAyuda');

Route::resource('/usuarios', 'UsuarioController',
    ['except' => ['destroy']])->middleware('auth', 'role:admin');

Route::resource('/iglesias', 'IglesiaController',
    ['except' => ['destroy']])->middleware('auth', 'role:admin, user');

Route::resource('/beneficiarios', 'BeneficiarioController',
    ['except' => ['destroy']])->middleware('auth', 'role:admin, user');

Route::resource('/ayudas', 'AyudaController')->middleware('auth', 'role:admin, user');
    