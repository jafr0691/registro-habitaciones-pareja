<?php
include "Conexion.php";
include "control-sesion.php";
include "datos-usuarios.php";


$id_parejas=isset($_GET['id_parejas'])? $_GET['id_parejas']:null ;
$observaciones=isset($_GET['observaciones'])? $_GET['observaciones']:null ;

if(isset($id_parejas)){
	$sql_insertar_salida="INSERT INTO salida_parejas SET fecha_salida=curdate(), hora_salida=curtime(),id_parejas='$id_parejas',observaciones='$observaciones'";
	mysqli_query($conexion,$sql_insertar_salida) or die (mysqli_error($conexion));


    $actualiza_estado_clientes="UPDATE ingreso_parejas SET id_estado_cliente='2' WHERE id_parejas='$id_parejas'";
    mysqli_query($conexion,$actualiza_estado_clientes);
    

	$actualiza_estado_habitaciones="UPDATE numero_habitacion,ingreso_parejas SET id_estado_habitacion='2' WHERE ingreso_parejas.id_parejas='$id_parejas' and  numero_habitacion.id_numero_habitacion=ingreso_parejas.id_numero_habitacion";
    mysqli_query($conexion,$actualiza_estado_habitaciones);

  $Consulta_habitacion="SELECT * from numero_habitacion,ingreso_parejas WHERE ingreso_parejas.id_parejas='$id_parejas' and  numero_habitacion.id_numero_habitacion=ingreso_parejas.id_numero_habitacion";
    
    $resultado_consulta_habitaciones=mysqli_query($conexion,$Consulta_habitacion);
     $fila_consulta_habitaciones=mysqli_fetch_array($resultado_consulta_habitaciones);
    $habitacion=$fila_consulta_habitaciones['numero_habitacion'];
	mysqli_close($conexion);
	header("location:parejas_ingresadas.php?status=1&numero_habitacion=".$habitacion."");
}else{
	
	header("location:start_menu.php");
}
	
	
?>