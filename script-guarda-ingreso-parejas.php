<?php
include "Conexion.php";
include "control-sesion.php";
include "datos-usuarios.php";


$_movilizacion=   isset ($_POST['movilizacion']) ? $_POST['movilizacion']: null;
$_placa= isset ($_POST['placa']) ? $_POST['placa']: null;
$_descripcion= isset ($_POST['descripcion']) ? $_POST['descripcion']: null;
$_selecttipohabitaciones=   isset ($_POST['selecttipohabitaciones']) ? $_POST['selecttipohabitaciones']: null;
$_selectnumerohabitaciones= isset ($_POST['selectnumerohabitaciones']) ? $_POST['selectnumerohabitaciones']: null;
$tipo_servicio= isset ($_POST['tipo_servicio']) ? $_POST['tipo_servicio']: null;

$placa_cliente_malo=mysqli_query($conexion,"SELECT * from clientes_relajosos where
 cliente_relajoso='$_placa'");



if(isset($_movilizacion)){
      if(mysqli_num_rows($placa_cliente_malo)>0){
      	header("location:Registro_parejas.php?status=3");
		$sql_insertar_parejas="INSERT INTO ingreso_parejas SET id_movilizacion='$_movilizacion', placa='$_placa' ,descripcion='$_descripcion', id_tipo_habitacion='$_selecttipohabitaciones',fecha_de_entrada=curdate(),hora_de_entrada=curtime(), id_numero_habitacion='$_selectnumerohabitaciones', id_empleado='$id_usuario', id_estado_cliente='1', id_tipo_servicio='$tipo_servicio'";
	mysqli_query($conexion,$sql_insertar_parejas) or die (mysqli_error($conexion));
	}else{
	$sql_insertar_parejas="INSERT INTO ingreso_parejas SET id_movilizacion='$_movilizacion', placa='$_placa' ,descripcion='$_descripcion', id_tipo_habitacion='$_selecttipohabitaciones',fecha_de_entrada=curdate(),hora_de_entrada=curtime(), id_numero_habitacion='$_selectnumerohabitaciones', id_empleado='$id_usuario', id_estado_cliente='1', id_tipo_servicio='$tipo_servicio'";
	mysqli_query($conexion,$sql_insertar_parejas) or die (mysqli_error($conexion));





	$actualiza_estado_habitaciones="UPDATE numero_habitacion SET id_estado_habitacion='1' WHERE id_numero_habitacion='$_selectnumerohabitaciones'";
    mysqli_query($conexion,$actualiza_estado_habitaciones) or die (mysqli_error($conexion));
	mysqli_close($conexion);
	header("location:Registro_parejas.php?status=1");
}}else{

	header("location:Registro_parejas.php?status=2");
}


?>