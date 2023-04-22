<?php
require_once 'Conexion.php';
function get_num_habitacion(){
  $mysqli = getConn();
  $idnumhabit = $_POST['idnumerohabitaciones'];
  $query = "SELECT * FROM `numero_habitacion` WHERE id_tipo_habitacion = $idnumhabit and id_estado_habitacion='3'";
  $result = $mysqli->query($query);
  $num_habit = '<option value="">Habitaciones</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $num_habit .= "<option value='$row[id_numero_habitacion]'>$row[numero_habitacion]</option>";
  }
  return $num_habit;
}

echo get_num_habitacion();

?>