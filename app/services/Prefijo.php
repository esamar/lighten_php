<?php

use App\dataObject\Prefijobd as PrefijoModel;

class Prefijo extends PrefijoModel
{

    public function obtenerPrefijos() : array
    {

        $datos = PrefijoModel::getConfigPrefijos();

		return [ 
	 			
	 				"resp" => 1,
	 				  	
	 				"data" => $datos

	 			];
	 			    	
    }

}
