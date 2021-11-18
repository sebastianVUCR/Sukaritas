<?php
require_once (dirname(__FILE__)).'/../GestorCitas/Citas/cita-class.php';
class LoginTest extends  PHPUnit\Framework\TestCase
{
    protected $cita;
    public function setUp(): void
    {
        $this->cita = new Cita();
        $this->cita->crearCita("2025-11-18 13:31",1,"116900860");
        $this->cita->crearPaciente("1111111111", "Juan", "Vainas", "88888888");



    }

    /** @test */
    public function nuevaCitaEnFechaYHoraReservada()
    {
        $this->assertFalse( $this->cita->verificarFechaCita("2025-11-18 13:31"));
    }



    /** @test */
    public function nuevaCitaConCedulaPacienteExistente()
    {
        $this->assertTrue( $this->cita->pacienteExiste("1111111111"));
    }

    /** @test */
    public function nuevaCitaConCedulaPacienteNuevo()
    {
        $this->assertFalse( $this->cita->pacienteExiste("2222222222"));
    }


    public function tearDown(): void
    {
        $this->cita->eliminarPaciente("1111111111");
    }
}
?>