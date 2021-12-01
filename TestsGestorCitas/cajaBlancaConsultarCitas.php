<?php
require_once (dirname(__FILE__)).'/../GestorCitas/Citas/cita-function.php';
require_once (dirname(__FILE__)).'/../GestorCitas/Citas/profesional-class.php';
require_once (dirname(__FILE__)).'/../GestorCitas/Login/usuario-class.php';

session_start();

class cajaBlancaRegirarCitaTest extends  PHPUnit\Framework\TestCase
{
    protected $cedula;
    protected $idProfesional;
    protected $usuario;
    public function setUp(): void
    {
        $this->citas = new Cita();
        $this->profesional = new Profesional();
        $this->usuario = new Usuario();
        /*Primer set de datos */
        $this->usuario->crearUsuario("12345658","profesional",5,"activo","password");
        $this->citas->crearPaciente("101110111","Juan","Perez Oso","88888888");
        $this->profesional->agregarProfesional($this->usuario->obtenerId(12345658),"Luke");
        $this->citas->crearCita("2032-11-25 14:14:00", $this->usuario->obtenerId(12345658),"101110111");

        /*Segundo set de datos*/
        $this->usuario->crearUsuario("141414141","profesional",5,"activo","password");
        $this->citas->crearPaciente("101110000","María","Perez Oso","88888888");
        $this->profesional->agregarProfesional($this->usuario->obtenerId(141414141),"Luke");
        $this->citas->crearCita("2032-11-25 14:14:00", $this->usuario->obtenerId(141414141),"101110111");
        $this->citas->crearCita("2031-11-25 14:14:00", $this->usuario->obtenerId(141414141),"101110111");
    }

    //todo llenar fecha inicial y fecha inicial para pruebas de citas por rango de tiempo
    public function llenarPost($cedulaParam, $idProfesionalparam, $fechaInicial, $FechaFinal){

        $_POST = array('idProfesional' => $idProfesionalparam, 
        'cedula' => $cedulaParam);
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
        /* Se elimina el primer set de datos */
        $this->citas->eliminarCita("101110111", $this->usuario->obtenerId(12345658));
        $this->profesional->eliminarProfesional($this->usuario->obtenerId(12345658));
        $this->usuario->eliminarUsuario("12345658");
        $this->citas->eliminarPaciente("101110111");

        /* Se elimina el segundo set de datos */
        $this->citas->eliminarCita("101110000", $this->usuario->obtenerId(141414141));
        $this->profesional->eliminarProfesional($this->usuario->obtenerId(141414141));
        $this->usuario->eliminarUsuario("141414141");
        $this->citas->eliminarPaciente("101110000");
    }
}
?>