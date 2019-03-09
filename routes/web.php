<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//Google login
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

//Ckfinder
Route::any('/ckfinder/examples/{example?}', 'CKSource\CKFinderBridge\Controller\CKFinderController@examplesAction')
    ->name('ckfinder_examples');


Route::get('/formacion', 'UserController@addFormacion')->name('formacion');

Route::post('/getCiclos', 'UserController@getCiclos');

Route::post('/insertFormacion', 'UserController@insertFormacion')->name('insertFormacion');

//Curriculum

Route::get('/curriculum', 'UserController@opcionesCurriculum')->name('opcionesCurriculum');

Route::post('/addCurriculum', 'UserController@addCurriculum')->name('addCurriculum');

Route::get('/verCurriculum/{id}', 'UserController@verCurriculum')->name('verCurriculum');

Route::get('/generarPDF/{id}', 'PdfController@generar_pdf_curriculum')->name('generar_pdf_curriculum');

Route::get('/eliminarCurriculum/{id}', 'UserController@eliminarCurriculum')->name('eliminarCurriculum');

Route::get('/modCurriculum', 'UserController@modCurriculum')->name('modCurriculum');

Route::post('/updateCurriculum', 'UserController@updateCurriculum')->name('updateCurriculum');

//OFertas

Route::get('/ofertas', 'OfertaController@oferta')->name('oferta');

Route::post('/crearOfertas', 'OfertaController@crearOferta')->name('crearOferta');

Route::get('/listado_ofertas', 'OfertaController@verOfertas')->name('listado_ofertas');

Route::get('/eliminar_oferta/{id}', 'OfertaController@eliminar_oferta')->name('eliminar_oferta');

//Dar alta

Route::get('/insert_alumno', 'UserController@insert_alumnos')->name('insert_alumno');

Route::post('/darAlta', 'UserController@darAlta')->name('darAlta');

//Perfil , mensaje y correo

Route::get('/perfil/{id}', 'UserController@perfil')->name('perfil');

Route::get('/mensaje', 'UserController@envio')->name('mensaje');

Route::post('/enviar_mensaje', 'MensajeController@enviar_mensaje')->name('enviar_mensaje');

Route::get('/listado_mensaje', 'MensajeController@listar_mensaje')->name('listado_mensaje');

Route::get('/delete/{id}', 'MensajeController@delete')->name('delete_mensaje');

Route::get('/mostrar_image/{filename}', 'UserController@getImage')->name('ver_imagen');



//Listado

Route::get('/listado/{ordenar?}/{campo?}/{search?}', 'UserController@listado')->name('listado');

Route::get('/listado_inactivos', 'UserController@listado_activo')->name('listado_inactivos');

Route::get('/listado_activos', 'UserController@listado_activo')->name('listado_activos');

//PDF

Route::get('/generar', 'PdfController@generar')->name('generar');

Route::get('/generar_perfil/{id}', 'PdfController@generar_perfil')->name('generar_perfil');

//Ediccion

Route::get('/ver_editar/{id}', 'UserController@ver_editar')->name('ver_editar');

Route::post('/update', 'UserController@update')->name('update');

//Borrado

Route::get('/eliminar_act/{id}', 'UserController@borrar_activos')->name('borrar_act');

Route::get('/eliminar_inac/{id}', 'UserController@borrar_inactivos')->name('borrar_inac');

Route::get('/bandeja', 'UserController@bandeja_entrada')->name('bandeja_entrada');

Route::get('/activar/{id}', 'UserController@confirmar_registro')->name('activar');


Route::group(['middleware' => 'admin'], function () {

    Route::get('/correo', 'UserController@correo')->name('correo');

    Route::post('/envio_correo', 'UserController@envio_correo')->name('envio_correo');
});


Route::group(['middleware' => ['web']], function () {

    Route::get('lang/{lang}', function ($lang) {
        session(['lang' => $lang]);
        return \Redirect::back();
    })->where([
        'lang' => 'en|es'
    ]);
});


