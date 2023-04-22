<?php 
include "Conexion.php";
include "control-sesion.php";
include "datos-usuarios.php";


$id_empleado=isset($_GET['id_empleado'])? $_GET['id_empleado']:null ;
if(isset($id_empleado)){
	//consultar el numero de la factura que se va a borrar
	$sql_consulta_usuario="SELECT * FROM empleado WHERE id_empleado='$id_empleado'";
    $resultado_consulta_usuario=mysqli_query($conexion,$sql_consulta_usuario);
    $fila_nro_usuario=mysqli_fetch_array($resultado_consulta_usuario);
    $nro_usuario_borrada=$fila_nro_usuario['nombre'];
    $nro_usuario_borradap=$fila_nro_usuario['apellido'];

	//Borrar los datos de la factura
	$sql_borrar="DELETE FROM empleado WHERE id_empleado='$id_empleado'";
	mysqli_query($conexion,$sql_borrar);
	mysqli_close($conexion);
	header("location:usuarios_confirmados.php?status=2&nombre=".$nro_usuario_borrada."&apellido=".$nro_usuario_borradap."");
}else{
	//header("location:listar-facturas.php?status=2&n_factura=".$nro_factura_borrada."");

}
?>