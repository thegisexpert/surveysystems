<?php
	session_start();
require_once "cConstantes.php";

$login = $_SESSION['USBID'];
$tipo = $_SESSION['tipo'];
$email = $_SESSION['email'];
/*
if ($_SESSION['tipo'] == "empleados") {
    $sql7 = "SELECT * FROM Usuario WHERE usbid='$login'";
    $resultado7 = ejecutarConsulta($sql7, $conexion);
    $fila = obtenerResultados($resultado7);
    $num = numResultados($resultado7);

    if ($num != 0) {
        $_SESSION[ROL] = $fila['rol'];
    }
}
*/



//$resultado = ejecutarConsulta($sql, $conexion);

//Se verifica que el USBID est� almacenado en la BD local al Sistema, si no est�, se incluyen los datos b�sicos
//if (numResultados($resultado) == 0) {
//    $resultado=insertarUsuario($login,$email,$tipo,$conexion);
//}

$existe = existeUsuario($conexion);
cerrarConexion($conexion);

if($existe == true) {
	header("Location: ../index.php");
} else if($existe == false) {
	$_SESSION['MSJ'] = "Sus datos no se encuentran registrados en el sistema. Por favor diríjase a la Sección de Evaluación y Adiestramiento del Departamento de Administración de Personal de la Dirección de Gestión del Capital Humano para solventar esta situación, pedimos disculpas por las molestias ocasionadas";
	header("Location: ../index.php?warning");
}

?>

