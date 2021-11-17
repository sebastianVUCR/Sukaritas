<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>Gestor de citas Softville</title>
		<?php
				include '../Compartido/navbar.php';
			?>
			<link rel="stylesheet" href="../Compartido/colores.css"/>
			<link rel="stylesheet" href="consultar-citas.css"/>
	</head>
	<body>
		<header>
            <h1 id="titulo">Consultar citas</h1>	  
		</header>
		<main>
			<form id="formulario-login" name="formulario-login" method="post" action="login-function.php">
                <fieldset id="area-cedula">
                    <label>Cédula</label>
				    <input type="number" id="cedula" name="cedula" placeholder="116540419"/>
					<button type="submit" id="buscar">Buscar</button>
					<a id="agregar-citas" href="#">Agregar citas</a>

                </fieldset>   	
            </form>
			<div id="contenedor-tabla">
			</div>
		</main>
	</body>
</html>