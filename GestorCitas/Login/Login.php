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
			<form id="formulario-login" name="formulario-login" method="post" action="">
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
					<p class="requerido error"> * </p>
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
	if(isset($_POST['cedula']) && isset($_POST['contrasena'])){
		include 'usuario-class.php';
		$usuario = new Usuario();
		$cedula = $_POST["cedula"];
		/*Aqui hay que trabajar con la clave para evitar insercion de codigo */
    $clave = $_POST["contrasena"];
		$_POST["cedula"]= array();
		$_POST["contrasena"]= array();
		if($usuario->permisoIngresar($cedula,$clave)){
			echo '<script language="javascript">alert("Login exitoso, hay que cambiar esta retroalimentación");</script>';
		}else{
			echo '<script language="javascript">alert("Logeo incorrecto");</script>';
		}
	} 	
?>