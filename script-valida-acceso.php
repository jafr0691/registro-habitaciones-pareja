<?php
include "Conexion.php";
include "datos-usuarios.php";
$_correo=   isset ($_POST['correo']) ? $_POST['correo']: null;
$_clave= isset ($_POST['clave']) ? $_POST['clave']: null;

if(isset($_correo)){
	
	
	$sql_consulta="SELECT * FROM empleado WHERE correo='$_correo' AND clave='$_clave' ";
	$resultado=mysqli_query($conexion,$sql_consulta) or die (mysqli_error());
	$fila=mysqli_fetch_array($resultado);
	$clavec=$fila['clave'];
	$id_empleado=$fila['id_empleado'];

	if(!$fila['id_empleado']){
		
    		   header("location:index.php?status=5");
	}else{
	   if($fila['id_estado_empleado']==2){
		   
	   header("location:index.php?status=4");
	   }else{

           if($clavec<>$_clave){
           	header("location:index.php?status=6");
	      }
	   else{

        $sql_insertar_sesion="INSERT INTO sesion SET fecha_sesion=curdate(), hora_sesion=curtime(),id_empleado='$id_empleado'";
	     mysqli_query($conexion,$sql_insertar_sesion) or die (mysqli_error($conexion));


	 	session_start();
		$_SESSION['id_empleado']=$fila['id_empleado'];
		$_SESSION['nombre'] =$fila['nombre'];
		$_SESSION['apellido'] =$fila['apellido'];
		header("location:start_menu.php");	

}
}
}
}

?>

