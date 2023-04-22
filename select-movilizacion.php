<?php
$consulta_movilizacion="SELECT * FROM movilizacion";
$resultado_consulta_movilizacion=mysqli_query($conexion,$consulta_movilizacion);
while($resultados=mysqli_fetch_assoc($resultado_consulta_movilizacion)){
	echo "<option value=".$resultados['id_movilizacion'].">".$resultados['movilizacion']."</option>";
	
	
}


?>