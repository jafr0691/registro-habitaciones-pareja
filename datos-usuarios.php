<?php

//Consultar los datos que esta logeado
$consultar_usuario="SELECT*FROM empleado WHERE id_empleado='".$_SESSION['id_empleado']."'";
$resultado_usuario=mysqli_query($conexion,$consultar_usuario);
$fila_usuario=mysqli_fetch_array($resultado_usuario);

$id_usuario=$fila_usuario['id_empleado'];
$nombres=$fila_usuario['nombre'];
$apellidos=$fila_usuario['apellido'];
$correo=$fila_usuario['correo'];
$id_perfil=$fila_usuario['id_perfil'];

?>