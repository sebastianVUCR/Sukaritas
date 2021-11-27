<?php 
include_once '../login/connect.php';

echo '<script language="javascript">
console.log('.$_SESSION["mensaje"].');
</script>';

?>

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
			<link rel="stylesheet" href="registrar-citas.css"/>
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
                    <input type="text" id="cedula" name="cedula" placeholder=" " required/>
                </fieldset>
                

                <fieldset class="input-registrar-cita">
                    <label>Fecha de la cita </label>
                    <input type="date" id="fecha_cita" name="fecha_cita" required>
                </fieldset>

                <div id="button-box">
                    <button type="submit" id="registrar">Registrar</button>
                </div>
            </form>
			
		</main>
	</body>
</html>