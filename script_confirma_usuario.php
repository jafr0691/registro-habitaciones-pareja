<?php 
include "Conexion.php";
include "control-sesion.php";
include "datos-usuarios.php";


$id_empleado=isset($_GET['id_empleado'])? $_GET['id_empleado']:null ;
if(isset($id_empleado)){
	//Consultar los datos de usuario
	
	$sql_consulta_confirma_usuario="SELECT *FROM empleado WHERE id_empleado='$id_empleado'";
    $resultado_consulta_confirma_usuario=mysqli_query($conexion,$sql_consulta_confirma_usuario);
    $fila_confirma_usuario=mysqli_fetch_array($resultado_consulta_confirma_usuario);
    $confirma_usuario=$fila_confirma_usuario['nombre'];
	$confirma_usuariop=$fila_confirma_usuario['apellido'];
	
	//Consulta de actualizar
    $actualiza_estado_usuario="UPDATE empleado SET id_estado_empleado='1' WHERE id_empleado='$id_empleado'";
    mysqli_query($conexion,$actualiza_estado_usuario);
	mysqli_close($conexion);

	header("location:usuarios_por_confirmar.php?status=1&nombre=".$confirma_usuario."&apellido=".$confirma_usuariop."");
}else{
	//header("location:listar-facturas.php?status=2&n_factura=".$nro_factura_borrada."");

}
?>