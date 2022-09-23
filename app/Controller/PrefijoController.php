<?php

use App\Model\Prefijo;

class PrefijoController extends Prefijo
{

    public function obtenerPrefijos() : array
    {

        $datos = Prefijo::getConfigPrefijos();

		return [ 
	 			
	 				"resp" => 1,
	 				  	
	 				"data" => $datos

	 			];
	 			    	
    }

}
