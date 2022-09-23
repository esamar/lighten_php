<?php

	require ('libs/EasyRouter.php');

	Router::get('/obtener-prefijos', 'Prefijo@obtenerPrefijos:data', function( $data, $resp )
	{

			Returns::JSON( 200 , $resp );

	});

	// Router::get('/obtener-prefijos', 'Prefijo@obtenerPrefijos:data', function( $data, $resp )
	// {

	// 		Returns::JSON( 200 , $resp );

	// });

	// Router::post('/inventario-cuadernillo', 'Instrument@obtenerInventarioCuadernillo:data', function( $data, $resp )
	// {

	// 		Returns::JSON( 200 , $resp );

	// });

	// Router::post('/registrar-inventario-mod1', 'Inventory@registrarInventarioInstrumento:data', function( $data, $resp )
	// {

	// 		Returns::JSON( 200 , $resp );

	// });	


	// Router::get('/export-inventario-cuadernillo', 'Instrument@exportarInventarioCuader:data', function( $data, $resp )
	// {

	// 		Returns::JSON( 200 , $resp );

	// });	


	// Router::post('/inventario-paquete', 'Instrument@obtenerInventarioPaquete:data', function( $data, $resp )
	// {

	// 		Returns::JSON( 200 , $resp );

	// });

	// Router::post('/registrar-inventario-mod2', 'Inventory@registrarInventarioInstrumentoMod2:data', function( $data, $resp )
	// {

	// 		Returns::JSON( 200 , $resp );

	// });	


	// Router::post('/registrar-inventario-mod3', 'Inventory@registrarInventarioPaqueteMod3:data', function( $data, $resp )
	// {

	// 		Returns::JSON( 200 , $resp );

	// });	


	// Router::post('/inventario-cajas', 'Instrument@obtenerInventarioCajas:data', function( $data, $resp )
	// {

	// 		Returns::JSON( 200 , $resp );

	// });
	
	
	// Router::post('/inventario-cajas-pallet', 'Instrument@obtenerInventarioCajasPallet:data', function( $data, $resp )
	// {

	// 		Returns::JSON( 200 , $resp );

	// });	

	// Router::post('/registrar-inventario-mod4', 'Inventory@registrarInventarioPalletMod4:data', function( $data, $resp )
	// {

	// 		Returns::JSON( 200 , $resp );

	// });


	// Router::post('/registrar-inventario-mod5', 'Inventory@registrarInventarioPalletMod5:data', function( $data, $resp )
	// {

	// 		Returns::JSON( 200 , $resp );

	// });


	// Router::get('/export-inventario-paquete', 'Instrument@exportarInventarioPaquete:data', function( $data, $resp )
	// {

	// 		Returns::JSON( 200 , $resp );

	// });	




	// Router::get('/lista-ie/{dni}/{pass}', 'User@getIeByDirector', function( $data , $resp )
	// {
	
	// 	Returns::JSON( 200 , $resp );  

	// });


	// Router::get('/', function( $data )
	// {
	
	//     Returns::VIEW( 200 ,'public/login.php');

	// });

	// Router::get('/registrar-nuevo-usuario', function( $data )
	// {
	
	//     Returns::VIEW( 200 ,'public/registrar-nuevo-usuario.html');

	// });

	// Router::get('/cambiar-contrasena-acceso', function( $data )
	// {
	
	//     Returns::VIEW( 200 ,'public/cambiar-contrasena-acceso.php');

	// });

	// Router::get('/recuperar-acceso', function( $data )
	// {
	
	//     Returns::VIEW( 200 ,'public/recuperar-acceso.php');

	// });

	// Router::post('/set-nuevo-usuario' , 'User@setRegistroUsuario:data' , function( $data , $resp )
	// {

	// 	Returns::JSON( 200 , $resp );  
	
	// });

	// Router::get('/fin-registro-usuario', function( $data )
	// {
		
	//     Returns::VIEW( 200 ,'public/fin-registro-usuario.php', [ 'email' => $data->query->email ]);

	// });

	// Router::post('/cambiar-email-usuario' , 'User@setCambioEmailDirector:data' , function( $data , $resp )
	// {

	// 	Returns::JSON( 200 , $resp );  
	
	// });

	// Router::get('/set-email-validado/{email}/{token}', 'User@setEmailValidado:data' , function( $data , $resp )
	// {

	// 	if ( $resp['resp'] == 2 )
	// 	{

	//     	header('Location: ../../');

	// 	}
	// 	else
	// 	{

	// 	    Returns::VIEW( 200 ,'public/email-validado.php', [ 'resp' => $resp['resp'] , 'email' => $data->params->email ]);

	// 	}

	// });
