<?php 
include_once '../login/connect.php';

session_start();

$connect = new Connect();
$conn = $connect->connectar();

?>

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
			<link rel="stylesheet" href="registrar-citas.css"/>
	</head>
	<body>
		<header>
            <h1 id="titulo">Registrar citas</h1>	  
		</header>
		<main>
			<form id="formulario-cita" name="formulario-cita" method="post" action="cita-function.php">
            
                <fieldset class="input-registrar-cita">
                    <label>Cédula</label>
                    <input type="text" id="cedula" name="cedula" placeholder=" " required/>
                </fieldset>
                
                <fieldset class="input-registrar-cita">
                    <label>Profesional encargado</label>
                    <select required id="idProfesional" name="idProfesional">
                        <option value = 0>Seleccione uno</option>
                    <?php 
                    $sqli ="Select * from profesional";
                    $resultado=mysqli_query($conn,$sqli);
                    while($row =mysqli_fetch_array($resultado)){
                        echo '<option value='.$row['id'].' >'.$row['nombre'].'</option>';
                    }
                    ?>
                    </select>
                </fieldset>

                <fieldset class="input-registrar-cita">
                    <label>Fecha de la cita </label>
                    <input type="date" id="fecha_cita" name="fecha_cita" required>
                </fieldset>

                <fieldset class="input-registrar-cita">
                    <label>Hora de la cita </label>
                    <input type="time" id="hora_cita" name="hora_cita" min="08:00" max="18:00" required>
                </fieldset>

                <div id="button-box">
                    <button type="submit" id="registrar">Registrar</button>
                </div>
            </form>
			
		</main>
	</body>
</html>