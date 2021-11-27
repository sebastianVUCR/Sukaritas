<?php
  include_once 'cita-class.php';
  include_once 'ValidadorPaciente.php';

  /**
   * @codeCoverageIgnore
   */
  function llamarControladorRegistrarPaciente() {
    session_start();
    ControladorRegistrarPaciente();
  }

  function ControladorRegistrarPaciente() {
    
  }
  ControladorRegistrarPaciente();
?>