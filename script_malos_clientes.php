<?php
include "Conexion.php";
	
include "control-sesion.php";
include "datos-usuarios.php";


$Placa= isset ($_POST['Placa']) ? $_POST['Placa']: null;
$placa_repetido=mysqli_query($conexion,"SELECT * from clientes_relajosos where 
 cliente_relajoso='$Placa'"); 



if(isset($Placa)){
	if(mysqli_num_rows($placa_repetido)>0){
		header("location:registrar_clientes_malos.php?status=3");
	}else{
	$sql_insertar_placa="INSERT INTO clientes_relajosos SET cliente_relajoso='$Placa'";
	mysqli_query($conexion,$sql_insertar_placa) or die (mysqli_error($conexion));
	mysqli_close($conexion);
	header("location:registrar_clientes_malos.php?status=1");
}

}
else{
	
	header("location:registrar_clientes_malos.php?status=2");
}
	
	
?>