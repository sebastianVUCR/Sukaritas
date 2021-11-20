<?php
  include 'cita-class.php';
  include_once 'profesional-class.php';
  include_once 'paciente-class.php';
  session_start();
  $cita = new Cita();
  $paciente = new Paciente();
  $profesional = new Profesional();
  /*Revisa que no se inyecte código*/
  if(isset($_POST['cedula'])){
    $cedula = filter_var($_POST["cedula"], FILTER_SANITIZE_NUMBER_INT);
    $citas = $cita->buscaCitasCedula($cedula);
  }
  else{
    $citas = $cita->buscaCitasCedula("");
  }
  if($citas !== false){
    foreach ( $citas as $cita ) {
      $citasString[] = array(
        'fecha' => $cita['fecha'],
        'hora' =>  $cita['hora'],
        'nombreProfesional'=> $profesional->obtenerNombre($cita['idProfesional']),
        'nombrePaciente'=> $paciente->obtenerNombre($cita['cedulaPaciente']),
        'cedulaPaciente' => $cita['cedulaPaciente'],
        'telefono'=> $paciente->obtenerTelefono($cita['cedulaPaciente']),
      );
     }
    $citas = json_encode($citasString);
  }else{
    $citas = json_encode($citas);
  }
  echo $citas;
  
?>