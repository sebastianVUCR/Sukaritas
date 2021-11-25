<?php
  include 'usuario-class.php';

  function llamarControlador() {
    session_start();
    controladorLogin();
  }

  function controladorLogin() {
    $usuario = new Usuario();
    /*Revisa que no se inyecte código*/
    $cedula = filter_var($_POST["cedula"], FILTER_SANITIZE_NUMBER_INT);
    $clave = filter_var($_POST["contrasena"], FILTER_SANITIZE_STRING);
    echo $cedula."  ".$clave;
    $_POST["cedula"]= array();
    $_POST["contrasena"]= array();
    if($usuario->permisoIngresar($cedula,$clave)) {
      $_SESSION["logeo"] = 1;
      $usuario->resetIntentos($cedula);
      header('Location: ../Citas/consultar-citas.php');
    }else{
      $usuario->reducirIntento($cedula);
      $_SESSION["logeo"] = 2;
      header('Location: login.php');
    }
    if($usuario->obtenerIntentos($cedula)=='0') {
      $_SESSION["logeo"] = 3;
      header('Location: login.php');
    }
  }
  llamarControlador();
?>