<?php

namespace App\Model;

use Libs\Transac\Mysql as TransacSQL;

class Prefijo extends TransacSQL
{
        
    public function getConfigPrefijos()
    {

        $sql = "SELECT 
                    
                    P.PRF_CODIGO as prefijo, P.PRF_NOMBRE as nombre, P.PRF_FORMA as forma, P.TPI_CODIGO as idtipo, TI.TPI_NOMBRE as tipo, P.PRF_DIA as dia
                FROM 
                    
                    tb_prefijo P
                
                INNER JOIN
                    
                    tb_tipo_instrumento TI
                
                ON 
                    P.TPI_CODIGO = TI.TPI_CODIGO";

        $prefijo_datos = TransacSQL::selectExt( $sql );



        $sql2 = "SELECT char_length(P.PRF_CODIGO) as largo FROM tb_prefijo P GROUP BY largo";

        $prefijo_largo = TransacSQL::selectExt( $sql2 );

        $pref_largo = ( count($prefijo_largo) > 1 ) ? 'error' :  $prefijo_largo[0]['largo'] ;

        $arr_datos = [
                        "largo_prefijo" => $pref_largo, 
                        "prefijo"       => $prefijo_datos 
                        ];

        return $arr_datos;

    }

    function __destruct()
    {
        
        TransacSQL::end();

    }

}

?>