<?php
  include_once 'cita-class.php';
  include_once 'profesional-class.php';
  include_once 'paciente-class.php';

  function controladorConsultarCitas(){
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
      if(isset($citasString)){
        $citas = json_encode($citasString);
      }else{
        $citas = "SinCita";
      }
    }else{
      $citas = json_encode($citas);
    }
    echo $citas;
  }
  controladorConsultarCitas();
?>