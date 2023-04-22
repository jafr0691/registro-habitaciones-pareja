
<?php
include "Conexion.php";
include "control-sesion.php";
include "datos-usuarios.php";

$respuestaImp='';
$suma= "SELECT
case when (NOW()>= ADDDATE(TIMESTAMP(i.fecha_de_entrada,i.hora_de_entrada), INTERVAL t.tiempo HOUR)) then
CONCAT('ACABA DE CONCLUIR EL TIEMPO DE LA HABITACIÓN ',' ',h.numero_habitacion) ELSE 'NO ENVIAR' END hora
from ingreso_parejas i 
INNER JOIN tipo_servicio t ON t.id_tipo_servicio=i.id_tipo_servicio
INNER JOIN numero_habitacion h ON h.id_numero_habitacion=i.id_numero_habitacion
 AND id_parejas NOT IN (SELECT id_parejas FROM salida_parejas s)";
 $res_suma=mysqli_query($conexion,$suma);
 $res_suma_1= mysqli_num_rows($res_suma);
while($res_reportes_obtenidos=mysqli_fetch_assoc($res_suma)){
	$respuestaImp.=$res_reportes_obtenidos['hora'].',';
	}
	echo substr($respuestaImp,0,-1);

 ?>