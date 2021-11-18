<?php
require_once (dirname(__FILE__)).'/../GestorCitas/Citas/cita-class.php';
class LoginTest extends  PHPUnit\Framework\TestCase
{
    protected $cita;
    public function setUp(): void
    {
        $this->cita = new Cita();
        $this->cita->crearCita("2025-11-18 13:31",1,"116900860");

    }

    /** @test */
    public function nuevaCitaEnFechaYHoraReservada()
    {
        $this->assertFalse( $this->cita->verificarFechaCita("2025-11-18 13:31"));
    }
}
?>