<?php 
include "Conexion.php";
include "control-sesion.php";
include "datos-usuarios.php";


$id_clientes_relajosos=isset($_GET['id_clientes_relajosos'])? $_GET['id_clientes_relajosos']:null ;
if(isset($id_clientes_relajosos)){
	//consultar el numero de la factura que se va a borrar
	$sql_consulta_malos_clientes="SELECT * FROM clientes_relajosos WHERE id_clientes_relajosos='$id_clientes_relajosos'";
    $resultado_consulta_malos_clientes=mysqli_query($conexion,$sql_consulta_malos_clientes);
    $fila_nro_clientes_malos=mysqli_fetch_array($resultado_consulta_malos_clientes);
    $nro_clientes_malos=$fila_nro_clientes_malos['cliente_relajoso'];
    

	//Borrar los datos de la factura
	$sql_borrar="DELETE FROM clientes_relajosos WHERE id_clientes_relajosos='$id_clientes_relajosos'";
	mysqli_query($conexion,$sql_borrar) or die (mysql_error($conexion));
	mysqli_close($conexion);
	header("location:Clientes_malos.php?status=1&cliente_relajoso=".$nro_clientes_malos);
}else{
	//header("location:listar-facturas.php?status=2&n_factura=".$nro_factura_borrada."");

}
?>