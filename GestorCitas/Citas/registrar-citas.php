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
            <h1 id="titulo">Registrar citas</h1>	  
		</header>
		<main>
			<form id="formulario-cita" name="formulario-cita" method="post" action="nuevaCita-function.php">
                <fieldset id="area-cedula">
                <label>Cédula</label>
				    <input type="text" id="cedula" name="cedula" placeholder=" " required/>
                
                <label>Telefono</label>
				    <input type="text" id="telefono" name="cedula" placeholder=" " required/>
                
                <label>Profesional que atiende</label>
				    <input type="text" id="IdProfesional" name="cedula" placeholder=" " required/>
                

                <label>Fecha de la cita </label><input type="date" id="fecha_cita" name="fecha_cita">

                <label>Fecha de la cita </label><input type="time" id="appt" name="hora_cita" min="08:00" max="18:00" required>
               
                
                <button type="submit" id="registrar">Registrar</button>
                </fieldset>   
            </form>
			
		</main>
	</body>
</html>