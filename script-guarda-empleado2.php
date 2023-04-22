<?php
include "Conexion.php";
include "control-sesion.php";
include "datos-usuarios.php";

$nombre=    isset ($_POST['nombre']) ? $_POST['nombre']:null;
$_apellido= isset ($_POST['apellido']) ? $_POST['apellido']: null;
$_correo=   isset ($_POST['correo']) ? $_POST['correo']: null;
$_password= isset ($_POST['clave']) ? $_POST['clave']: null;
$_idperfil= isset ($_POST['id_perfil']) ? $_POST['id_perfil']: null;
$empleado_ingreso_repetido=mysqli_query($conexion,"SELECT correo from empleado where 
 correo='$_correo'"); 



if(isset($_correo)){
	if(mysqli_num_rows($empleado_ingreso_repetido)>0){
		header("location:Registro_usuarios.php?status=3");
	}else{
	$sql_insertar_empleado="INSERT INTO empleado SET nombre='$nombre', apellido='$_apellido' ,correo='$_correo', clave='$_password', id_estado_empleado='1' ,id_perfil='$_idperfil'";
	mysqli_query($conexion,$sql_insertar_empleado) or die (mysqli_error($conexion));
	mysqli_close($conexion);
	header("location:Registro_usuarios.php?status=1");
}}
else{
	
	header("location:Registro_usuarios.php?status=2");
}
	
	
?>