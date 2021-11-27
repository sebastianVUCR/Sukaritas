<?php
require_once (dirname(__FILE__)).'/../GestorCitas/Paciente/ValidadorDatosPaciente.php';

class LoginTest extends  PHPUnit\Framework\TestCase
{
    
    public function setUp(): void
    {
        
    }

    /** @test */
    public function dobleCerosTest()
    {
        $this->assertFalse(ValidadorDatosPaciente::cedulaEsValida('006540419'));
    }

    /** @test */
    public function cedulaCortaTest()
    {
        $this->assertFalse(ValidadorDatosPaciente::cedulaEsValida('12345678'));
    }

    /** @test */
    public function cedulaCortaGuionesTest()
    {
        $this->assertFalse(ValidadorDatosPaciente::cedulaEsValida('1-2345-678'));
    }

    /** @test */
    public function cedulaSinNumerosTest()
    {
        $this->assertFalse(ValidadorDatosPaciente::cedulaEsValida('NoEsUnaCedula'));
    }

    /** @test */
    public function cedulaLargaInvalidaTest()
    {
        $this->assertFalse(ValidadorDatosPaciente::cedulaEsValida('1234567890123456'));
    }

    /** @test */
    public function cedulaLargaValidaTest()
    {
        $this->assertTrue(ValidadorDatosPaciente::cedulaEsValida('123456789012345'));
    }

    /** @test */
    public function cedulaValidaCortaTest()
    {
        $this->assertTrue(ValidadorDatosPaciente::cedulaEsValida('116540419'));
    }

    /** @test */
    public function cedulaValidaLargaTest()
    {
        $this->assertTrue(ValidadorDatosPaciente::cedulaEsValida('12345789012345'));
    }

    /** @test */
    public function nombreValidoTest() {
        $this->assertTrue(ValidadorDatosPaciente::nombreValidoTest('Sebastiánñ'));
    }

    /** @test */
    public function apellidoValidoTest() {
        $this->assertTrue(ValidadorDatosPaciente::nombreValidoTest('Vargas Soto'));
    }

    /** @test */
    public function telefonoCortoTest() {
        $this->assertFalse(ValidadorDatosPaciente::telefonoValidoTest('91'));
    }

    /** @test */
    public function telefonoLetrasTest() {
        $this->assertFalse(ValidadorDatosPaciente::telefonoValidoTest('91egqwe1'));
    }

    /** @test */
    public function telefonoCaracteresTest() {
        $this->assertFalse(ValidadorDatosPaciente::telefonoValidoTest('91eg(qwe1'));
    }

    /** @test */
    public function telefonoValidoTest() {
        $this->assertTrue(ValidadorDatosPaciente::telefonoValidoTest('911'));
    }

    public function tearDown(): void
    {
        
    }
}
?>