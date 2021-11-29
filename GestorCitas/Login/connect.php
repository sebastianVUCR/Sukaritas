<?php
Class Connect {
  function __construct(){
  }

  function __destruct(){
  }
  function connectar(){
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = '12345678';
    $db = "gestorcitas";
    $conn =  mysqli_connect($dbhost, $dbuser, $dbpass,$db,3307);
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
  }
}
?>