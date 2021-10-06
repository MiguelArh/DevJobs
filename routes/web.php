<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Auth;
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


Auth::routes(['verify'=>true]);




//Rutas Protegidas

Route::group(['middleware' => ['auth', 'verified']], function(){

    // Rutas de Vacantes
    Route::get('/vacantes', 'VacanteController@index')->name('vacantes.index');
    Route::get('/vacantes/create', 'VacanteController@create')->name('vacantes.create');
    Route::post('/vacantes/', 'VacanteController@store')->name('vacantes.store');
    Route::delete('vacantes/{vacante}', 'VacanteController@destroy')->name('vacantes.destroy');
    Route::get('/vacantes{vacante}/edit', 'VacanteController@edit')->name('vacantes.edit');
    Route::put('/vacantes{vacante}', 'VacanteController@update')->name('vacantes.update');


    //Subir Imagenes
    Route::post('/vacantes/imagen', 'VacanteController@imagen')->name('vacantes.imagen');
    //Borrar Imagen
    Route::post('/vacantes/borrarimagen', 'VacanteController@borrarimagen')->name('vacantes.borrar');

    //Cambiar estado de la Vacante
    Route::post('/vacantes/{vacante}', 'VacanteController@estado')->name('vacantes.estado');
    //Notificaciones

    Route::get('/notificaciones', 'NotificacionesController')->name('notificaciones');
});

//Pagina de Inicio
Route::get('/', 'InicioController')->name('inicio');

//Filtrar por Categoria
Route::get('/categorias/{categoria}', 'CategoriaController@show')->name('categorias.show');

//Enviar Datos para una Vacante
Route::get('/candidatos/{id}', 'CandidatoController@index')->name('candidatos.index');
Route::post('/candidatos/store', 'CandidatoController@store')->name('candidatos.store');

// Muestra los trabajos en el frontEnd sin Autenticacion

Route::post('/busqueda/buscar', 'VacanteController@buscar')->name('vacantes.buscar');
Route::get('/busqueda/buscar', 'VacanteController@resultados')->name('vacantes.resultados');
Route::get('/vacantes/{vacante}', 'VacanteController@show')->name('vacantes.show');

