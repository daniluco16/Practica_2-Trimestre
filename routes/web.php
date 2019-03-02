<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');




Route::get('/listado/{ordenar?}/{campo?}/{search?}', 'UserController@listado')->name('listado');

Route::get('/listado_inactivos', 'UserController@listado_activo')->name('listado_inactivos');

Route::get('/mensaje', 'MensajeController@envio')->name('mensaje');

Route::get('/listado_activos', 'UserController@listado_activo')->name('listado_activos');

Route::get('/perfil/{id}', 'UserController@perfil')->name('perfil');

Route::get('/eliminar_act/{id}', 'UserController@borrar_activos')->name('borrar_act');

Route::get('/eliminar_inac/{id}', 'UserController@borrar_inactivos')->name('borrar_inac');

Route::get('/generar', 'PdfController@generar')->name('generar');

Route::get('/bandeja', 'UserController@bandeja_entrada')->name('bandeja_entrada');

Route::get('/activar/{id}', 'UserController@confirmar_registro')->name('activar');

Route::get('/ver_editar/{id}', 'UserController@ver_editar')->name('ver_editar');

Route::post('/update', 'UserController@update')->name('update');

Route::group(['middleware' => ['web']], function () {
 
    Route::get('lang/{lang}', function ($lang) {
        session(['lang' => $lang]);
        return \Redirect::back();
    })->where([
        'lang' => 'en|es'
    ]);
 
});


