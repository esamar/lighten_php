<?php

	require ('../app/libs/EasyRouter.php');

	Router::dirController('../app/exports');

	Router::get('/export-inventario-cuadernillo/{codigo_caja_transito}', 'Reports@exportarInventarioCuader:data');	

	Router::get('/export-inventario-paquete/{codigo_paquete}', 'Reports@exportarInventarioPaquete:data');	
	
	Router::get('/export-inventario-caja/{codigo_caja}', 'Reports@exportarInventarioCaja:data');	

	Router::get('/export-inventario-pallet/{codigo_pallet}', 'Reports@exportarInventarioPallet:data');	
	
	Router::get('/export-pallet/{codigo_pallet}', 'Reports@exportarPallet:data');	

	// Router::get('/reporte-avance-operador', 'Reports@downloadReporteModulo1:data');