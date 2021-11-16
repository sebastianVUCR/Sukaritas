<?php
  include 'usuario-class.php';
  session_start();
  $usuario = new Usuario();
  $cedula = $_POST["cedula"];
  /*Aqui hay que trabajar con la clave para evitar insercion de codigo */
  $clave = $_POST["contrasena"];
  $_POST["cedula"]= array();
  $_POST["contrasena"]= array();
  if($usuario->permisoIngresar($cedula,$clave)){
    $_SESSION["logeo"] = 1;
  }else{
    $_SESSION["logeo"] = 2;
  }
  header('Location: login.php');

?>