<?php
require_once 'Conexion.php';
function get_tip_habitacion(){
  $mysqli = getConn();
  $query = 'SELECT * FROM `tipo_habitacion`';
  $result = $mysqli->query($query);
  $tip_hab = '<option value="">Tipo de Habitación</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $tip_hab .= "<option value='$row[id_tipo_habitacion]'>$row[tipo]</option>";
  }
  return $tip_hab;
}

echo get_tip_habitacion();
?>