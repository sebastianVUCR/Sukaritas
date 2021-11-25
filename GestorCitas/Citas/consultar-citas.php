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
			<form id="formulario-citas" name="formulario-citas" method="post" action="">
        <fieldset id="area-cedula">
          <label>Cédula</label>
          <input type="number" id="cedula" name="cedula" placeholder="116540419"/>
          <button type="submit" id="buscar">
            Filtrar <img class="icono" id="icono-buscar" src="icono-buscar.png"></img>
          </button>
          <a id="agregar" href="registrar-citas.php">Agregar citas <img id="icono-agregar" src="icono-agregar.png" alt="icono-agregar"></a>
        </fieldset>
       </form>
       <label id="mensaje-error" class="error">
					<p class="requerido" id="error"> </p>
				</label>
			<div id="contenedor-tabla">
				<table id="tabla">
					<tr class="titulo-columna">
						<td>Nombre</td>
						<td>Cédula</td>
						<td>Teléfono</td>
						<td>Fecha</td>
						<td>Hora</td>
						<td>Doctor</td>
					</tr>
          <tbody id="citas"></tbody>
				</table>
			</div>
		</main>
		<script
			src="https://code.jquery.com/jquery-3.3.1.min.js"
			integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			crossorigin="anonymous">
		</script>
    <script src="consultar-citas.js"></script>
	</body>
</html>