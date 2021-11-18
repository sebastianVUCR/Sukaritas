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
        //echo ($fecha), "\n";
        //echo ($data), "\n";
        if($data === $fecha){//fecha duplicada
            //echo ("Fechas iguales"), "\n";
          return false;
        }else{
            return true;
        }
    }
    function verificarFechaCitaFutura($fecha) {
        
        $data =date("Y/m/d h:i:s");
        
        echo ($fecha), "\n";
        echo ($data), "\n";
        if($data <= $fecha){//fecha duplicada
            echo ("Hora posible"), "\n";
          return true;
        }else{
            echo ("Hora en el pasado"), "\n";
            return false;
        }
    }
}
?>
