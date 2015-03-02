<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/








// LOGIN

Route::get('login', function(){
    return View::make('login.login');
});


Route::post('login', array('uses' => 'UsuariosController@postLogin'));

Route::get('logout', 'UsuariosController@logOut');




Route::group(array('before' => 'auth'), function()
{


	


	// Clientes

	Route::get('cliente', array('uses'=>'ClienteController@mostrar'));
	Route::get('cliente/nuevo', array('uses'=>'ClienteController@nuevo'));
	Route::post('cliente/crear', array('uses'=>'ClienteController@nuevo2'));
	Route::get('cliente/editar/{id}', array('uses'=>'ClienteController@editar'));
	Route::post('cliente/editar/{id}', array('uses'=>'ClienteController@editar2'));
	Route::get('cliente/eliminar', 'ClienteController@eliminar');

	// Productos



	Route::get('producto', array('uses'=>'ProductoController@mostrar'));
	Route::get('producto/nuevo', array('uses'=>'ProductoController@nuevo'));
	Route::post('producto/crear', array('uses'=>'ProductoController@nuevo2'));
	Route::get('producto/editar/{id}', array('uses'=>'ProductoController@editar'));
	Route::post('producto/editar/{id}', array('uses'=>'ProductoController@editar2'));
	Route::get('producto/eliminar', 'ProductoController@eliminar');


	// Guia

	Route::get('guia', array('uses'=>'GuiaController@mostrar'));
	Route::get('guia/nuevo', array('uses'=>'GuiaController@nuevo'));
	Route::post('guia/crear', array('uses'=>'GuiaController@nuevo2'));
	Route::get('guia/editar/{id}', array('uses'=>'GuiaController@editar'));
	Route::post('guia/editar/{id}', array('uses'=>'GuiaController@editar2'));
	Route::get('guia/eliminar', 'GuiaController@eliminar');
	Route::get('guia/pdf/{id}', 'GuiaController@pdf');



	// FACTURA CON GUIAS

	Route::get('factura', array('uses'=>'FacturaController@mostrar'));
	Route::get('factura/nuevo', array('uses'=>'FacturaController@nuevo'));
	Route::post('factura/crear', array('uses'=>'FacturaController@nuevo2'));
	Route::get('factura/editar/{id}', array('uses'=>'FacturaController@editar'));
	Route::post('factura/editar/{id}', array('uses'=>'FacturaController@editar2'));
	Route::get('factura/eliminar', 'FacturaController@eliminar');
	Route::get('factura/pdf/{id}', 'FacturaController@pdf');
	Route::get('factura/buscarguias', array('uses'=>'FacturaController@buscarguias'));

	// FACTURA SIN GUIAS



	Route::get('facturasg', array('uses'=>'FacturaSgController@mostrar'));
	Route::get('facturasg/nuevo', array('uses'=>'FacturaSgController@nuevo'));
	Route::post('facturasg/crear', array('uses'=>'FacturaSgController@nuevo2'));
	Route::get('facturasg/pdf/{id}', 'FacturaSgController@pdf');
		


			Route::get('/', array('uses'=>'DashboardController@mostrarDashboard'));


	Route::get('dashboard', array('uses'=>'DashboardController@mostrarDashboard'));

	// USUARIOS
	Route::get('usuarios', array('uses' => 'UsuariosController@mostrar'));

	Route::get('usuarios/nuevo', array('uses' => 'UsuariosController@nuevo'));
	 
	Route::post('usuarios/crear', array('uses' => 'UsuariosController@nuevo2'));
	// esta ruta es a la cual apunta el formulario donde se introduce la información del usuario
	// como podemos observar es para recibir peticiones POST
	 
	Route::get('usuarios/{id}', array('uses'=>'UsuariosController@verUsuario'));
	// esta ruta contiene un parámetro llamado {id}, que sirve para indicar el id del usuario que deseamos buscar
	// este parámetro es pasado al controlador, podemos colocar todos los parámetros que necesitemos
	// solo hay que tomar en cuenta que los parámetros van entre llaves {}
	// si el parámetro es opcional se colocar un signo de interrogación {parámetro?}

	Route::get('usuarios/editar/{id}', 'UsuariosController@editar');

	Route::post('usuarios/editar/{id}', 'UsuariosController@editar2');

	Route::get('usuarios/probando/oli', 'UsuariosController@pruebaSQL');




});