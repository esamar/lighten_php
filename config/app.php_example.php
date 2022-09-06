<?php
        
/**
*CONF DE VISTA Y NOMBRES
*/
$NAME_APP = 'INVENTARIO IMPRENTA';
$VERSION_APP = '1.0';
$NAME_PROJECT = '******************************* *****DEV: Piloto 2022**** *******************************';
$NAME_ENVIORONMENT = 'Env: DEV - Local';

/**
*CONF GENERAL
*
*CONFIGURACION BD
*/

$HOST = '';
$USER = '';
$NAME_DB = '';
$PWD = '';
$PORT = '3306';

/**
 * CONF PHP
 */

date_default_timezone_set('America/Lima');


/**
*CONFIGURACION SERVICIOS
*
$URL_IMPORT = 'https://stackontrol.dev.sistemasumc.com';
$API_CUEST_ACTIVE = false;
$URL_API_CRED_CUEST = 'https://stackontrol.dev.sistemasumc.com/api/import-credentials';
$API_SEEL_ACTIVE = false;
$API_SEEL_RANGE = ['08:00:00', '21:00:00'];
$URL_API_UPDATE_PARTICIPACION = 'https://stackontrol.dev.sistemasumc.com/api/update-participa';

*/

define('__HOST__', $HOST );
define('__NAME_BD__', $NAME_DB );
define('__USER__', $USER );
define('__PWD__', $PWD );
define('__PORT__', $PORT );

define('__NAME_APP__', $NAME_APP);
define('__VERSION_APP__', $VERSION_APP);
define('__NAME_PROJECT__', $NAME_PROJECT);
define('__NAME_ENVIRONMENT__', $NAME_ENVIORONMENT);