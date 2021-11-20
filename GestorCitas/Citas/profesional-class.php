<?php
require_once (dirname(__FILE__)).'/../login/connect.php';
class Profesional {
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
    Devuelve el nombre del profesional con el id ingresado
    */
    function obtenerNombre($id) {
      if($this->existeProfesional($id)){
        $sql = "SELECT nombre FROM Profesional WHERE id = '{$id}';";
        $resultado = mysqli_query($this->conn, $sql);
        if (!$this->conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        $data = "";
        while ($fila = mysqli_fetch_row($resultado)) {
          $data = $fila[0];
        }
        return $data;
      }
    }

    /*
    Verifica si ya exite un profesional con el id ingresado.
     */
    function existeProfesional($id){
        $sql = "SELECT id FROM Profesional WHERE id = '{$id}';";
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
        }
        return false;
      }
}
?>
