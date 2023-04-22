<?php
require_once 'Conexion.php';
function get_tipo_servicio(){
  $mysqli = getConn();
  $idtipserv = $_POST['id_tipo_servicio'];
  $query = "SELECT * FROM tipo_servicio where id_tipo_servicio='1' ";
  $result = $mysqli->query($query);
  $tip_serv = '<option value="">Tipo de servicio</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $tip_serv .= "<option value='$row[id_tipo_servicio]'>$row[servicio]</option>";
  }
  return $tip_serv;
}

echo get_tipo_servicio();

?>