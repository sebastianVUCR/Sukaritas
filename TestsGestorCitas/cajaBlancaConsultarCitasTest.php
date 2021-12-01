<?php
/*
include_once (dirname(__FILE__)).'/../GestorCitas/Citas/cita-class.php';
include_once (dirname(__FILE__)).'/../GestorCitas/Citas/profesional-class.php';
include_once (dirname(__FILE__)).'/../GestorCitas/Citas/paciente-class.php';
*/

require_once (dirname(__FILE__)).'/../GestorCitas/Citas/consultar-citas-function.php';
require_once (dirname(__FILE__)).'/../GestorCitas/Citas/profesional-class.php';
require_once (dirname(__FILE__)).'/../GestorCitas/Login/usuario-class.php';




session_start();

class cajaBlancaConsultarCitasTest extends  PHPUnit\Framework\TestCase
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
        $this->usuario->crearUsuario("123456580","profesional",5,"activo","password");
        $this->citas->crearPaciente("1011101110","Juan","Perez Oso","888888880");
        $this->profesional->agregarProfesional($this->usuario->obtenerId(123456580),"Luke");
        $this->citas->crearCita("2032-11-25 14:14:00", $this->usuario->obtenerId(123456580),"1011101110");

        /*Segundo set de datos*/
        $this->usuario->crearUsuario("1414141410","profesional",5,"activo","password");
        $this->citas->crearPaciente("1011100000","María","Perez Oso","888888880");
        $this->profesional->agregarProfesional($this->usuario->obtenerId(141414141),"Ian");
        $this->citas->crearCita("2032-11-25 14:14:00", $this->usuario->obtenerId(1414141410),"1011101110");
        $this->citas->crearCita("2031-11-25 14:14:00", $this->usuario->obtenerId(1414141410),"1011101110");
    }

    //todo llenar fecha inicial y fecha inicial para pruebas de citas por rango de tiempo
    public function llenarPost($cedulaParam, $idProfesionalparam, $fechaInicial, $FechaFinal){

        $_POST = array('idProfesional' => $idProfesionalparam, 
        'cedula' => $cedulaParam);
    }

    public function contieneConRegex($string) {
        return '/'.$string.'/';
    }
   
    /**
     * Seccion de pruebas para el consultar citas por nombre de profesional
     */

    /** @test */
    public function consultarProfesionalVariasCitasTest()
    {
        $cedulaPaciente = '101110000';
        $idProfesional = $this->usuario->obtenerId(141414141);
        $fechaInicial = '2030-11-25 14:14:00';
        $FechaFinal = '2033-11-25 14:14:00';
        $nombreProfesional = 'Ian';
        $this->llenarPost($cedulaPaciente, $idProfesional, $fechaInicial, $FechaFinal);
        $stringEsperado = $nombreProfesional;
        $this->expectOutputRegex($this->contieneConRegex($stringEsperado));
        controladorConsultarCitas();
        
    }   

    public function tearDown(): void
    {
        /* Se elimina el primer set de datos */
        $this->citas->eliminarCita("1011101110", $this->usuario->obtenerId(123456580));
        $this->profesional->eliminarProfesional($this->usuario->obtenerId(123456580));
        $this->usuario->eliminarUsuario("123456580");
        $this->citas->eliminarPaciente("1011101110");
        /* Se elimina el segundo set de datos */
        $this->citas->eliminarCita("1011100000", $this->usuario->obtenerId(1414141410));
        $this->profesional->eliminarProfesional($this->usuario->obtenerId(1414141410));
        $this->citas->eliminarPaciente("1011100000");
        $this->usuario->eliminarUsuario("1414141410");
    }
}
?>