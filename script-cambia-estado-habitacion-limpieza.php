<?php
include "Conexion.php";
include "control-sesion.php";
include "datos-usuarios.php";


$id_numero_habitacion=isset($_GET['id_numero_habitacion'])? $_GET['id_numero_habitacion']:null ;


if(isset($id_numero_habitacion)){

    $consulta_estado_habitaciones="SELECT * from numero_habitacion WHERE id_numero_habitacion='$id_numero_habitacion'";
    $resultado_consulta_habitaciones=mysqli_query($conexion,$consulta_estado_habitaciones);
     $fila_consulta_habitaciones=mysqli_fetch_array($resultado_consulta_habitaciones);
    $habitacion=$fila_consulta_habitaciones['numero_habitacion'];

	$actualiza_estado_habitaciones="UPDATE numero_habitacion SET id_estado_habitacion='3' WHERE id_numero_habitacion='$id_numero_habitacion'";
    mysqli_query($conexion,$actualiza_estado_habitaciones) or die (mysqli_error($conexion));
	mysqli_close($conexion);
	header("location:habitaciones_limpieza.php?status=1&numero_habitacion=".$habitacion."");
}else{
	
	header("location:start_menu.php");
}
	
	
?>