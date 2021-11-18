<?php
include 'cita-class.php';
session_start();

$hora = $_POST["hora_cita"];
$fecha = $_POST["fecha_cita"]." ".$hora.":00";

$idProfesional = filter_var($_POST["idProfesional"], FILTER_SANITIZE_NUMBER_INT);
$cedula = filter_var($_POST["cedula"], FILTER_SANITIZE_NUMBER_INT);

print_r($_POST);

$_POST["fecha_cita"]= array();
$_POST["hora_cita"]= array();
$_POST["idProfesional"]= array();
$_POST["cedula"]= array();

$nuevaCita= new Cita();
//$nuevaCita->crearCita($fecha,$idProfesional,$cedula);
$nuevaCita->crearCita($fecha,$idProfesional,$cedula);

?>