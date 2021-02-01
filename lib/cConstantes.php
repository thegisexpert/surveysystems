<?php
//Constantes para la conexión con la BD
define ("MANEJADOR_BD", "postgres");
define ("NOMBRE_BD", "sievapao_bd");
define ("USER" , "root");
define ("PASS" , "harkonnen");

//Constantes para la conexión con LimeSurvey
define ("PATH_LS", "http://localhost/limesurvey/index.php/admin/remotecontrol");
define ("USER_LS", "admin");
define ("PSWD_LS", "selusasecundus");

require_once "cFunciones.php";

// Conectar con la base de datos
if (MANEJADOR_BD == "mysql") {
	$conexion = crearConexion("localhost", USER, PASS); //Cambiar si cambia contrasena Base de Datos

}else if(MANEJADOR_BD == "postgres"){
	$conexion = crearConexion("localhost", NOMBRE_BD , USER, PASS); //Cambiar si cambia contrasena Base de Datos
	$is_supervisor = isSupervisor($conexion); //Determinar si el usuario conectado es supervisor o no
	$notificaciones= countNotifications($conexion); //Determinar el número de nuevas notificaciones
}

/*
 * Evitamos SQL Injection en datos entrantes!
 */
foreach($_POST as $key => $value)
	$_POST[$key] = escaparString($value);

foreach($_GET  as $key => $value)
	$_GET[$key] = escaparString($value);

?>
