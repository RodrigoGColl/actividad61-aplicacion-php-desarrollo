<?php
// Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>wow - Editar Personaje</title>
</head>
<body>
<div>
	<header>
		<h1>WORLD OF WARCRAFT - BASE DE DATOS</h1>
	</header>
	<main>				

<?php
if(isset($_POST['modifica'])) {
	// Se obtienen los datos del personaje desde el formulario
	$idpersonaje = $mysqli->real_escape_string($_POST['idpersonaje']);
	$nombre = $mysqli->real_escape_string($_POST['nombre']);
	$raza = $mysqli->real_escape_string($_POST['raza']);
	$clase = $mysqli->real_escape_string($_POST['clase']);
	$nivel = $mysqli->real_escape_string($_POST['nivel']);
	$faccion = $mysqli->real_escape_string($_POST['faccion']);

	// Se comprueba si existen campos vacíos
	if(empty($nombre) || empty($raza) || empty($clase) || empty($nivel) || empty($faccion)) {
		if(empty($nombre)) {
			echo "<font color='red'>Campo nombre vacío.</font><br/>";
		}
		if(empty($raza)) {
			echo "<font color='red'>Campo raza vacío.</font><br/>";
		}
		if(empty($clase)) {
			echo "<font color='red'>Campo clase vacío.</font><br/>";
		}
		if(empty($nivel)) {
			echo "<font color='red'>Campo nivel vacío.</font><br/>";
		}
		if(empty($faccion)) {
			echo "<font color='red'>Campo facción vacío.</font><br/>";
		}
		
		// Enlace para volver atrás
		echo "<a href='javascript:self.history.back();'>Volver atrás</a>";
	} else {
		// Se actualiza el registro en la base de datos
		$mysqli->query("UPDATE personajes SET nombre = '$nombre', raza = '$raza', clase = '$clase', nivel = '$nivel', faccion = '$faccion' WHERE personaje_id = $idpersonaje");
		$mysqli->close();
		echo "<div>Registro editado correctamente...</div>";
		echo "<a href='index.php'>Ver resultado</a>";
	}
}
?>

	</main>	
</div>
</body>
</html>

