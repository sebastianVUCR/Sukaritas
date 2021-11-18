<?php
include_once '../login/connect.php';
class Cita {
    public $conn;

    /*
    Constructor de la clase que inicia la conexion
     */
    function __construct(){
      $conector = new Connect();
      $this->conn = $conector->connectar();
    }

    /*
    Destructor de la clase que inicia la conexión
     */
    function __destruct(){
      $this->conn -> close();
    }

    /*
    Esta función se utiliza para que los desarrollador creen citas
    */
    function crearCita($fecha,$idProfesional,$cedula  ) {

        $sql = "INSERT INTO citas (fecha,idProfesional,cedulaPaciente) VALUES ('{$fecha}','{$idProfesional}','{$cedula}');";
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        if (mysqli_query($this->conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        }
        
    }
}
?>
