<?php
require_once (dirname(__FILE__)).'/../GestorCitas/Citas/cita-class.php';
class LoginTest extends  PHPUnit\Framework\TestCase
{
    protected $citas;
    protected $paciente;
    protected $profesional;
    protected $usuario;
    public function setUp(): void
    {
        $this->citas = new Cita();
        $this->profesional = new Profesional();
        $this->paciente = new Paciente();
        $this->usuario = new Usuario();
        $this->usuario->crearUsuario("12345658","profesional",5,"activo","password");
        $this->usuario->crearUsuario("123456897","secretaria",5,"activo","password");
        $this->paciente->agregarPaciente("101110111","Juan","Perez Oso","88888888");
        $this->profesional->agregarProfesional($this->usuario->obtenerId(12345658),"Luke");
        $this->usuario->agregarCita("17/11/21",$this->profesional->obtenerId(12345658),"101110111");
        $this->usuario->agregarCita("02/11/21",$this->profesional->obtenerId(12345658),"101110111");
        $this->usuario->agregarCita("15/11/21",$this->profesional->obtenerId(12345658),"101120111");
    }
    /** @test */
    public function tienePermisoConsultas()
    {
        $this->assertTrue( $this->citas->tienePermisoConsultas($this->profesional->obtenerId(12345658)));
    }
    /** @test */
    public function buscarCitas()
    {
        $this->assertCount(2, $this->citas->buscaCitasCedula("101110111"));
    }
     /** @test */
     public function buscarCitasSinFiltro()
     {
         $this->assertCount(3, $this->citas->buscaCitasCedula(""));
     }
    /** @test */
    public function existeCedulaCliente()
    {
        $this->assertTrue( $this->citas->existePaciente("101110111"));
    }

    public function tearDown(): void
    {
        $this->usuario->eliminarProfesional($this->profesional->obtenerId(12345658));
        $this->usuario->eliminarUsuario("12345658");
        $this->usuario->eliminarUsuario("123456897");
        $this->usuario->eliminarPaciente("123456897");
    }
}
?>