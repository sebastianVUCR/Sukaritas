<?php
require_once (dirname(__FILE__)).'/../GestorCitas/Citas/cita-function.php';
require_once (dirname(__FILE__)).'/../GestorCitas/Citas/profesional-class.php';
require_once (dirname(__FILE__)).'/../GestorCitas/Login/usuario-class.php';

session_start();

class cajaBlancaRegirarCitaTest extends  PHPUnit\Framework\TestCase
{
    protected $citas;
    protected $profesional;
    protected $usuario;
    public function setUp(): void
    {
        $this->citas = new Cita();
        $this->profesional = new Profesional();
        $this->usuario = new Usuario();
        $this->usuario->crearUsuario("12345658","profesional",5,"activo","password");
        $this->citas->crearPaciente("101110111","Juan","Perez Oso","88888888");
        $this->profesional->agregarProfesional($this->usuario->obtenerId(12345658),"Luke");
        $this->citas->crearCita("2032-11-25 14:14:00", $this->usuario->obtenerId(12345658),"101110111");

    }

    public function llenarPost($horaCita, $fechaCita, $idProfesional, $cedula){

        $_POST = array('hora_cita' => $horaCita, 
        'fecha_cita' => $fechaCita,
        'idProfesional' => $idProfesional,
        'cedula' => $cedula);

        /*
        $_POST["hora_cita"] = $horaCita;
        $_POST["fecha_cita"] = $fechaCita;
        $_POST["idProfesional"] = $idProfesional;
        $_POST["cedula"] = $cedula;*/
    }
   
    /**
     * Seccion de pruebas para el consultar citas por nombre de profesional
     */

    /** @test */
    public function pacienteNoExistePrueba()
    {
        /*
        $this->llenarPost("13:14","2030-11-25", $this->usuario->obtenerId(12345658),"101110333");
        controladorRegistrarCita();
        $this->assertTrue($_SESSION["mensaje"] === 2);
        */
    }

    

    public function tearDown(): void
    {
        $this->citas->eliminarCita("101110111", $this->usuario->obtenerId(12345658));
        $this->profesional->eliminarProfesional($this->usuario->obtenerId(12345658));
        $this->usuario->eliminarUsuario("12345658");
        $this->citas->eliminarPaciente("101110111");
    }
}
?>