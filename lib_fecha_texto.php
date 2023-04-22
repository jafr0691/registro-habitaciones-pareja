<?php
 
function saber_dia($nombredia) {
$dias =  array('', 'Lunes','Martes','Miercoles','Jueves','Viernes','Sabado', 'Domingo');
$fecha = $dias[date('N', strtotime($nombredia))];
echo $fecha;
}

function nombremes($mes){
 setlocale(LC_TIME, 'spanish');  
 $nombre=strftime("%B",mktime(0, 0, 0, $mes, 1, 2000)); 
 return $nombre;
} 
?>
