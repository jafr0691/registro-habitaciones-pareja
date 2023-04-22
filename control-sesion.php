<?php

session_start();

if(!isset($_SESSION['id_empleado']) AND $_SESSION['id_empleado'] == 0){

//if($_SESSION['id_usuario']) {

header("location:index.php");
}

?>