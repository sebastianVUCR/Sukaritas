<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>Gestor de citas Softville</title>
		<link rel="stylesheet" href="../Compartido/colores.css"/>
		<link rel="stylesheet" href="../Compartido/boton-generico.css"/>
		<link rel="stylesheet" href="Login.css"/>
		
	</head>
	<body>
		<header>
      <h1 id="titulo">Gestor de citas Softville</h1>	  
		</header>
		<main>
			<form id="formulario-login" name="formulario-login" method="post" action="login-function.php">
				<h2 id="titulo-formulario">Iniciar Sesión</h2>
        <fieldset id="area-cedula">
          <label>Cédula</label>
				  <input type="number" id="cedula" name="cedula" placeholder="116540419 " required/>
        </fieldset>
        <fieldset id="area-contrasena">
          <label>Contraseña</label>
				  <input type="password" id="contrasena" name="contrasena" placeholder="*********" required/>
        </fieldset>
				<label id="mensaje-error" class="error">
					<p class="requerido"> Los datos ingresados son incorrectos </p>
				</label>
				<div id="contenedor-boton">
          <button type="submit" id="ingresar">Ingresar</button>
				</div>
        <button type="submit" id="submit-escondido" class="hidden-submit" hidden>validar entradas</button>
      </form>
		</main>
	</body>
</html>

<?php
  //@codeCoverageIgnoreStart
  session_start();
	if(isset( $_SESSION["logeo"])){
    if($_SESSION["logeo"]== 1){
      $_SESSION["logeo"] = 0;
      echo '<script language="javascript">
      document.getElementById("mensaje-error").innerHTML="logeo exitoso, aqui debe redirigir a home";
      document.getElementById("mensaje-error").style.visibility="visible"
      </script>';
    }
    if($_SESSION["logeo"]== 2){
      $_SESSION["logeo"] = 0;
      echo '<script language="javascript">
      document.getElementById("mensaje-error").style.visibility="visible";</script>';
    }
    if($_SESSION["logeo"]== 3){
      $_SESSION["logeo"] = 0;
      echo '<script language="javascript">
      document.getElementById("mensaje-error").innerHTML="Ha sobrepasado el limite de intentos, su cuenta está bloqueada";
      document.getElementById("mensaje-error").style.visibility="visible"
      </script>';
    }
	}else{
		$_SESSION["logeo"] = 0;
	}
  //@codeCoverageIgnoreEnd  
?>