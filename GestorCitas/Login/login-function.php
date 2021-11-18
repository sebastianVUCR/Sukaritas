<?php
  include 'usuario-class.php';
  session_start();
  $usuario = new Usuario();
  /*Revisa que no se inyecte código*/
  $cedula = filter_var($_POST["cedula"], FILTER_SANITIZE_NUMBER_INT);
  $clave = filter_var($_POST["contrasena"], FILTER_SANITIZE_STRING);
  echo $cedula."  ".$clave;
  $_POST["cedula"]= array();
  $_POST["contrasena"]= array();
  if($usuario->permisoIngresar($cedula,$clave)){
    $_SESSION["logeo"] = 1;
    $usuario->resetIntentos($cedula);
  }else{
    $usuario->reducirIntento($cedula);
    $_SESSION["logeo"] = 2;
  }
  if($usuario->obtenerIntentos($cedula)=='0'){
    $_SESSION["logeo"] = 3;
  }
  header('Location: login.php');

?>