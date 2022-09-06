<?php

require_once ('Formats/XLSXSpout.php');

class Reports extends XLSXSpout
{

	public function exportarInventarioCuader( $request )
	{

		require_once substr(__DIR__, 0, strpos(__DIR__, 'exports') ) . 'dataObject\instrumento\class_instrumento.php';

		$instrumento = new clase_instrumento;

    $datos = $instrumento->exportInventarioCuadernillo( $request->params->codigo_caja_transito );


        $this-> createXLS( "Inventario_cuadernillo_". $request->params->codigo_caja_transito, [
													[
													    "nombre" => "inventario_cuadernillo",
													    "titulo" => "INVENTARIO CUADERNILLO",
													    "cabecera" => ["N° Caja Temporal","Código de cuadernillo","tipo de operativo","día", "forma", "Codmod", "correlativo", "nombre del instrumento", "Estado de inventario", "Fecha de registro", "Usuario Codigo"],
													    "data" => $datos
												    ]
												]);

	}



	public function exportarInventarioPaquete( $request )
	{
		require_once substr(__DIR__, 0, strpos(__DIR__, 'exports') ) . 'dataObject\instrumento\class_instrumento.php';

		$instrumento = new clase_instrumento;

    $datos = $instrumento->exportInventarioPaquete( $request->params->codigo_paquete );

        $this-> createXLS( "Inventario_paquete_" . $request->params->codigo_paquete, [
													[
													    "nombre" => "inventario_paquete",
													    "titulo" => "INVENTARIO PAQUETE",
													    "cabecera" => ["CORRELATIVO MINEDU",
																							"CODMOD",
																							"TIPO DE PAQUETE",
																							"CÓDIGO DE BARRA DEL CUADERNILLO",
																							"TIPO DE OPERATIVO",
																							"NOMBRE DEL INSTRUMENT",
																							"ESTADO DE INVENTARIO",
																							"FECHA Y HORA DE REGISTRO",
																							"CÓDIGO DE REGISTRADOR"],
													    "data" => $datos
												    ]
												]);		
	}

	public function exportarInventarioCaja( $request )
	{
		require_once substr(__DIR__, 0, strpos(__DIR__, 'exports') ) . 'dataObject\instrumento\class_instrumento.php';

		$instrumento = new clase_instrumento;

		$datos = $instrumento->exportInventarioCaja( $request->params->codigo_caja );

    $this-> createXLS( "Inventario_caja_" . $request->params->codigo_caja, [
									[
									    "nombre" => "inventario_paquete",
									    "titulo" => "INVENTARIO PAQUETE",
									    "cabecera" => ["CORRELATIVO MINEDU",
																			"CODMOD",
																			"TIPO DE OPERATIVO",
																			"NRO CAJA MODULADA",
																			"TIPO DE PAQUETE",
																			"ESTADO DE INVENTARIO",
																			"FECHA Y HORA DE REGISTRO",
																			"CÓDIGO DE REGISTRADOR"],
									    "data" => $datos
								    ]
								]);		


	}


	public function exportarInventarioPallet( $request )
	{
		require_once substr(__DIR__, 0, strpos(__DIR__, 'exports') ) . 'dataObject\instrumento\class_instrumento.php';

		$instrumento = new clase_instrumento;

		$datos = $instrumento->exportInventarioCajaPallet( $request->params->codigo_pallet );

    $this-> createXLS( "Inventario_pallet_" . $request->params->codigo_pallet, [
									[
									    "nombre" => "inventario_pallet",
									    "titulo" => "INVENTARIO PALLET",
									    "cabecera" => ["NRO DE PALLET",
									    							 "NRO DE CAJA",	
									    								"CORRELATIVO MINEDU",
																			"CODMOD",
																			"TIPO DE OPERATIVO",
																			"TIPO DE PAQUETE",
																			"ESTADO DE INVENTARIO",
																			"FECHA Y HORA DE REGISTRO",
																			"CÓDIGO DE REGISTRADOR"],
									    "data" => $datos
								    ]
								]);		


	}

	public function exportarPallet( $request )
	{

		require_once substr(__DIR__, 0, strpos(__DIR__, 'exports') ) . 'dataObject\instrumento\class_instrumento.php';

		$instrumento = new clase_instrumento;

		$datos = $instrumento->exportInventarioPallet( $request->params->codigo_pallet );

    $this-> createXLS( "Inventario_pallet_2_" . $request->params->codigo_pallet, [
									[
									    "nombre" => "inventario_pallet",
									    "titulo" => "INVENTARIO PALLET",
									    "cabecera" => ["NRO DE RUTA",
									    							 "NRO DE PALLET",	
									    							 "UBICACIÓN",
																		 "SEDE REGIONAL",
																		 "SEDE PROVINCIAL",
																		 "TIPO DE OPERATIVO",
																		 "TIPO DE CAJA",
																	   "ESTADO DE INVENTARIO",
																		 "FECHA Y HORA DE REGISTRO",
																		 "CÓDIGO DE REGISTRADOR"],
									    "data" => $datos
								    ]
								]);		

	}
	

	// public function downloadReporteModulo1( $request )
	// {

	// 	// $this-> createXLS( [ (array)$request->body ] );

	// 	$this-> createXLS( "Nombre de archivo" , [
	// 												[
	// 												    "nombre" => "hoja_prueba",
	// 												    "titulo" => "Titulo de reporte de prueba",
	// 												    "cabecera" => ["id","col1","col2","col3"],
	// 												    "data" => [
	// 												                [0,1,2,3],
	// 												                [0,1,2,3],
	// 												                [0,1,2,3],
	// 												                [0,1,2,3],
	// 												                [0,1,2,3],
	// 												                [0,1,2,3],
	// 												                [0,1,2,3],
	// 												                [0,1,2,3]
	// 												               ]
	// 											    ],

	// 												[
	// 												    "nombre" => "hoja_prueba2",
	// 												    "titulo" => "Titulo de reporte de prueba 2",
	// 												    "cabecera" => ["id","col1","col2","col3"],
	// 												    "data" => [
	// 												                [0,1,2,3],
	// 												                [0,1,2,3],
	// 												                [0,"Hola",2,3],
	// 												                [0,1,2,3],
	// 												                [0,1,2,3],
	// 												                [0,1,"Pedro",3],
	// 												                [0,1,2,3],
	// 												                [0,1,2,3]
	// 												               ]
	// 											    ]

	// 											]);


	// }

}