<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>Gestor de citas Softville</title>
		<?php
				include_once '../Compartido/navbar.php';
			?>
			<link rel="stylesheet" href="../Compartido/colores.css"/>
			<link rel="stylesheet" href="../Citas/registrar-citas.css"/>
	</head>
	<body>
		<header>
            <h1 id="titulo">Registrar pacientes</h1>	
		</header>
		<main>
            <label id="mensaje" ></label>  
			<form id="formulario-cita" name="formulario-cita" method="post" action="ControladorRegistrarPaciente.php">
            
                <fieldset class="input-registrar-cita">
                    <label>Cédula</label>
                    <input type="text" id="cedula" name="cedula" placeholder="116540419" required/>
                </fieldset>

				<fieldset class="input-registrar-cita">
                    <label>Nombre</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre del paciente" required/>
                </fieldset>

				<fieldset class="input-registrar-cita">
                    <label>Apellido</label>
                    <input type="text" id="apellido" name="apellido" placeholder="Ingrese el apellido del paciente" required/>
                </fieldset>

				<fieldset class="input-registrar-cita">
                    <label>Telefono</label>
                    <input type="number" id="telefono" name="telefono" placeholder="Ingrese el telefono del paciente"/>
                </fieldset>

                <div id="button-box">
                    <button type="submit" id="registrar">Registrar</button>
                </div>
            </form>
			
		</main>
	</body>
</html>