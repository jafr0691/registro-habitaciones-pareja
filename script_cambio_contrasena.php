<?php
include "Conexion.php";
	
include "control-sesion.php";
include "datos-usuarios.php";

$pass = isset ($_POST['password']) ? $_POST['password']:null;
$pass2= isset ($_POST['password2']) ? $_POST['password2']: null;

$cambio_contrasena_p=mysqli_query($conexion,"SELECT clave from empleado where clave='$pass'"); 

if(isset($pass)){
    if($pass2==$pass)
	{	
    header("location: cambio_contrasena.php?status=3");
	}
	else {
		
	if(mysqli_num_rows($cambio_contrasena_p)>0){
		
	$sql_actualizar_contrasena="UPDATE empleado SET clave='$pass2' where id_empleado='$id_usuario'";
	mysqli_query($conexion,$sql_actualizar_contrasena);
	
	mysqli_close($conexion);
    header("location: cambio_contrasena.php?status=1");
	}else{
		
		header("location: cambio_contrasena.php?status=2");
}
}

}else{
	

	echo "No se logro guardar";
}
	
	
?>