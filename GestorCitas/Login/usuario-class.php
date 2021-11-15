<?php
include_once 'connect.php';
class Usuario {
    public $conn;
    function __construct(){
      $conector = new Connect();
      $this->conn = $conector->connectar();
    }

    function __destruct(){
      $this->conn -> close();
    }

    function crearUsuario($cedula,$rol,$intentos,$estado,$clave) {
      if(!$this->existeUsuario($cedula)) {
        $password = password_hash($clave, PASSWORD_DEFAULT);
        $sql = "INSERT INTO Usuario (cedula,rol,intentos,estado,clave) VALUES ('{$cedula}','{$rol}','{$intentos}','{$estado}','{$password}');";
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        if (mysqli_query($this->conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
      }else{
        echo "Error: usuario ya existe";
      }
    }

    function existeUsuario($cedula){
      $sql = "SELECT cedula FROM Usuario WHERE cedula = '{$cedula}';";
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

    function revisarCredenciales($cedula,$clave){
      if($this->existeUsuario($cedula)){
        $sql = "SELECT clave FROM Usuario WHERE cedula = '{$cedula}';";
        $resultado = mysqli_query($this->conn, $sql);
        if (!$this->conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        $data = 0;
        while ($fila = mysqli_fetch_row($resultado)) {
          $data = $fila[0];
        }
        if(password_verify($clave, $data)){
          return true;
        }
      }
      return false;
    }

    function bloquearUsuario($cedula){
      if($this->existeUsuario($cedula)){
        $sql = "UPDATE Usuario SET estado='bloqueado' WHERE cedula = '{$cedula}';";
        if (!$this->conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        if (mysqli_query($this->conn, $sql)) {
          echo "New record created successfully";
          return true;
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        }
      }
      return false;
    }

    function desbloquearUsuario($cedula){
      if($this->existeUsuario($cedula)){
        $sql = "UPDATE Usuario SET estado='activo' WHERE cedula = '{$cedula}';";
        if (!$this->conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        if (mysqli_query($this->conn, $sql)) {
          echo "New record created successfully";
          return true;
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        }
      }
      return false;
    }

    function permisoIngresar($cedula,$clave){
      if($this->existeUsuario($cedula)){
        if($this->revisarCredenciales($cedula,$clave)){
          if($this->usuarioDesbloqueado($cedula)){
            return true;
          }
        }
      }
      return false;
    }

    function usuarioDesbloqueado($cedula){
      if($this->existeUsuario($cedula)){
        $sql = "SELECT estado FROM Usuario WHERE cedula = '{$cedula}';";
        $resultado = mysqli_query($this->conn, $sql);
        if (!$this->conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        $data = 0;
        while ($fila = mysqli_fetch_row($resultado)) {
          $data = $fila[0];
        }
        if($data === "activo"){
          return true;
        }
      }
      return false;
    }

    function eliminarUsuario($cedula){
      if($this->existeUsuario($cedula)){
        $sql = "DELETE FROM Usuario WHERE cedula = '{$cedula}';";
        if (mysqli_query($this->conn, $sql)) {
          echo "New record created successfully";
          return true;
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        }
      }
      return false;
    }
}
?>
