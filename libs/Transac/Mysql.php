<?php

namespace Libs\Transac;

class Mysql
{
    protected $connection;

    public $id_insert;

    public $sql_string;

    public $rows;

    function __construct( )
    {

        try{
            
            @$this -> connection = mysqli_connect( __HOST__ , __USER__ , __PWD__ );
                    // or die ( "ERROR ACCESO BD" . mysqli_errno() );
            if ( !$this -> connection )
            {

                throw new \Exception(json_encode( 
                                                [
                                                    "msj" => "ERROR ACCESO",
                                                    "err_num" => null,
                                                    "err_estate" => null, 
                                                    "error" => "Error de acceso a BD ".__USER__."@".__HOST__,
                                                    "script" => null
                                                ]));
                
            }

            mysqli_select_db ( $this -> connection , __NAME_BD__ ); 
                    // or die ( "ERROR AL SELECCIONAR BD" . mysqli_errno() );
            if ( mysqli_errno( $this -> connection ) )
            {

                throw new \Exception(json_encode( 
                                                [
                                                    "msj" => "ERROR AL SELECCIONAR BD: " . __NAME_BD__ ,
                                                    "err_num" => mysqli_errno( $this -> connection ),
                                                    "err_estate" => mysqli_sqlstate( $this -> connection ), 
                                                    "error" => mysqli_error( $this -> connection ),
                                                    "script" => ""
                                                ]));
                
            }

            mysqli_query ( $this -> connection , "SET NAMES 'utf8'" );
            
        }
        catch( \Exception $e)
        {

            $this->errorToHtml( $e );

            die();

        }

    }

    protected function end()
    {

        mysqli_close( $this -> connection );

    }

    public function selectExt( $sql , $JSON = 'ARRAY' )
    {

        $this -> sql_string = $sql;
        
        try{

            $query = mysqli_query ( $this -> connection ,  $sql ) ;

            if ( mysqli_errno( $this -> connection ) )
            {

                throw new \Exception(json_encode( 
                                                [
                                                    "msj" => "Error de consulta selectExt",
                                                    "err_num" => mysqli_errno( $this -> connection ),
                                                    "err_estate" => mysqli_sqlstate( $this -> connection ), 
                                                    "error" => mysqli_error( $this -> connection ),
                                                    "script" => $sql
                                                ]));
                
            }

            $res = mysqli_fetch_assoc( $query );

            $this -> rows = mysqli_num_rows( $query );

            do
            {
                  
                $array[] = $res ;

            } while ( $res = mysqli_fetch_assoc ( $query ) );
                
            if ( $JSON == 'ARRAY' )
            {

                return $array;

            }
            else if ( $JSON == 'JSON' )
            {

                return json_encode( $array );

            }
            else
            {
            
                return false;
            
            }

        }
        catch( \Exception $e)
        {

            $this->errorToHtml( $e );

            die();

        }

    }

    public function updateExt( $sql )
    {

        $this -> sql_string = $sql;

        try{

            $query = mysqli_query ( $this -> connection , $sql );

            if ( mysqli_errno( $this -> connection ) )
            {

                throw new \Exception(json_encode( 
                                                [
                                                    "msj" => "Error de consulta updateExt",
                                                    "err_num" => mysqli_errno( $this -> connection ),
                                                    "err_estate" => mysqli_sqlstate( $this -> connection ), 
                                                    "error" => mysqli_error( $this -> connection ),
                                                    "script" => $sql
                                                ]));
                
            }

            $afected = mysqli_affected_rows( $this -> connection );

            return $afected; 

        }
        catch( \Exception $e)
        {

            $this->errorToHtml( $e );

            die();

        }

    }
    
    public function deleteExt( $sql )
    {
        
        $this -> sql_string = $sql;

        try{

            $query = mysqli_query ( $this -> connection , $sql );

            if ( mysqli_errno( $this -> connection ) )
            {

                throw new \Exception( json_encode( 
                                            [
                                                "msj" => "Error de consulta deleteExt",
                                                "err_num" => mysqli_errno( $this -> connection ),
                                                "err_estate" => mysqli_sqlstate( $this -> connection ), 
                                                "error" => mysqli_error( $this -> connection ),
                                                "script" => $sql
                                            ] ) );
            
            }

            $afected = mysqli_affected_rows( $this -> connection );

            return $afected; 

        }
        catch( \Exception $e)
        {

            $this->errorToHtml( $e );

            die();

        }
        
    }  

    public function insertExt( $sql )
    {

        $this -> sql_string = $sql;

        try
        {

            $query = mysqli_query ( $this -> connection , $sql );

            $this -> id_insert = mysqli_insert_id ( $this -> connection );

            $afected = mysqli_affected_rows( $this -> connection );

            if ( mysqli_errno( $this -> connection ) )
            {

                throw new \Exception( json_encode( 
                                            [
                                                "msj" => "Error de consulta insertExt",
                                                "err_num" => mysqli_errno( $this -> connection ),
                                                "err_estate" => mysqli_sqlstate( $this -> connection ), 
                                                "error" => mysqli_error( $this -> connection ),
                                                "script" => $sql
                                            ] ) );
            
            }

            return $afected; 

        }
        catch (\Exception $e)
        {

            $this->errorToHtml( $e );

            die();

        }

    }

    private function errorToHtml( $e )
    {

        // final public  function getMessage();        // mensaje de excepción
        // final public  function getCode();           // código de excepción
        // final public  function getFile();           // nombre de archivo fuente
        // final public  function getLine();           // línea fuente
        // final public  function getTrace();          // un array de backtrace()
        // final public  function getPrevious();       // excepción anterior
        // final public  function getTraceAsString();

        $err = json_decode( $e->getMessage() );

        $trace =$e->getTrace();
        
        $template ="<body style='margin: 30px;font-family: Arial, Helvetica, sans-serif;'>
                        <div><h2><span style='background-color: red;
                        color: white;
                        border-radius: 5px;
                        padding: 5px;
                        margin-right: 10px;'>Exception</span> TransacMysql: {$err->msj}</h2></div>
                        <div style='width: 100%;'>
                            <table style='width: 100%;border:none;border-collapse: collapse;color:aquamarine'>
                                <thead style='background-color: rgb(59, 60, 61);
                                            height: 35px;'>
                                    <th style='width: 20%;'>Tipo</th>
                                    <th>Detalle del error</th>
                                </thead>
                                <tbody style='background-color: black;'>
                                    <tr>
                                        <td>Mensaje</td>
                                        <td style='padding-top:7px;padding-bottom:7px;'>{$err->msj}</td>
                                    </tr>
                                    <tr>
                                        <td>response error</td>
                                        <td style='padding-top:7px;padding-bottom:7px;'>{$err->error}</td>
                                    </tr>
                                    <tr>
                                        <td>script</td>
                                        <td style='padding-top:7px;padding-bottom:7px;'>{$err->script}</td>
                                    </tr>
                                    <tr>
                                        <td>File</td>
                                        <td style='padding-top:7px;padding-bottom:7px;'>{$trace[0]['file']}</td>
                                    </tr>
                                    <tr>
                                        <td>Line</td>
                                        <td style='padding-top:7px;padding-bottom:7px;'>{$trace[0]['line']}</td>
                                    </tr>
    
                                    <tr>
                                        <td>err_num</td>
                                        <td style='padding-top:7px;padding-bottom:7px;'>{$err->err_num}</td>
                                    </tr>
                                    <tr>
                                        <td>err_estate</td>
                                        <td style='padding-top:7px;padding-bottom:7px;'>{$err->err_estate}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <h3>Extend</h3>
                            <div style='
                                background-color: black;
                                padding: 15px;
                                margin-top: 15px;
                                color:aquamarine;
                                font-size: 9pt;
                                overflow:auto;'>
                                <pre>";

        $template_end ="</pre>
                            </div>
                        </div>
                    </body>";
        
		http_response_code(500);

        echo $template;

            print_r($e);

        echo $template_end;

    }

}
