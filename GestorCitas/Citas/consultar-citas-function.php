<?php
  include_once 'cita-class.php';
  include_once 'profesional-class.php';
  include_once 'paciente-class.php';

  function controladorConsultarCitas(){
    $cita = new Cita();
    $paciente = new Paciente();
    $profesional = new Profesional();
    $profesionalNuevo = new Profesional();
    //obtiene el valor del post
    if(isset($_POST["idProfesional"])){
      $idProfesional = $_POST["idProfesional"];
    } else { // si el campo está vacío
      $profesionales = $profesional->obtenerProfesionales();
      $primeraVez = false;
      foreach ( $profesionales as $profesional ) {
        if($primeraVez == false){
          $idProfesional = $profesional['id'];
          $primeraVez = true;
        }
      }
    }
    if(isset($_POST['cedula'])){
      $cedula = filter_var($_POST["cedula"], FILTER_SANITIZE_NUMBER_INT);
      $citas = $cita->buscaCitasCedula($cedula,$idProfesional);
    }
    else{
      $citas = $cita->buscaCitasCedula("",$idProfesional);
    }
    if($citas !== false){
      foreach ( $citas as $cita ) {
        $citasString[] = array(
          'fecha' => $cita['fecha'],
          'hora' =>  $cita['hora'],
          'nombreProfesional'=> $profesionalNuevo->obtenerNombre($cita['idProfesional']),
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
    return $citas;
  }
  controladorConsultarCitas();
?>