<?php
$consulta_perfil="SELECT * FROM perfil where id_perfil>1";
$resultado_consulta_perfil=mysqli_query($conexion,$consulta_perfil);
while($resultados=mysqli_fetch_assoc($resultado_consulta_perfil)){
	echo "<option value=".$resultados['id_perfil'].">".$resultados['cargo']."</option>";
	
	
}


?>