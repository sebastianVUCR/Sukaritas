<?php
include_once 'connect.php';
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

    function crearPaciente($cedula,$nombre,$apellidos, $telefono  ) {

      $sql = "INSERT INTO  Paciente(cedula, nombre, apellidos, telefono)
      VALUES ('{$cedula}','{$nombre}','{$apellidos}', {$telefono});";
      if (!$this->conn) {
          die("Connection failed: " . mysqli_connect_error());
      }
      if (mysqli_query($this->conn, $sql)) {
          echo "New record created successfully";
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
      }
  }


    function eliminarCita($fecha) {
        $sql = "SELECT fecha FROM Cita WHERE fecha = '{$fecha}';";
        $resultado = mysqli_query($this->conn, $sql);
        if (!$this->conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        $data = 0;
        while ($fila = mysqli_fetch_row($resultado)) {
          $data = $fila[0];
        }
        if($data === $fecha){
          return false;
        }else{
            return true;
        }
    }


    function eliminarPaciente($cedula){
      $sql = "DELETE FROM Paciente WHERE cedula = '{$cedula}';";
      if (mysqli_query($this->conn, $sql)) {
        echo "New record created successfully";
        return true;
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
      }
      return false;
    }

    

    function verificarFechaCita($fecha) {
        $sql = "SELECT fecha FROM citas WHERE fecha = '{$fecha}';";
        $resultado = mysqli_query($this->conn, $sql);
        if (!$this->conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        $data = 0;
        while ($fila = mysqli_fetch_row($resultado)) {
          $data = $fila[0];
        }
        if($data == $fecha){//fecha duplicada
          return false;
        }else{
            return true;
        }
    }

    function profesionalExiste($id) {
      $sql = "SELECT id FROM profesional WHERE id = '{$id}';";
        $resultado = mysqli_query($this->conn, $sql);
        if (!$this->conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        $data = 0;
        while ($fila = mysqli_fetch_row($resultado)) {
          $data = $fila[0];
        }
        if($data){
          return true;
        }else{
            return false;
        }
    }

    function pacienteExiste($cedula) {
      $sql = "SELECT cedula FROM paciente WHERE cedula = '{$cedula}';";
        $resultado = mysqli_query($this->conn, $sql);
        if (!$this->conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        $data = 0;
        while ($fila = mysqli_fetch_row($resultado)) {
          $data = $fila[0];
        }
        if($data){
          return true;
        }else{
            return false;
        }
    }

}
?>
