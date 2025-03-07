<?php
//Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Alta de Personaje</title>
</head>
<body>
<div>
	<header>
		<h1>Gestión de Personajes</h1>
	</header>
	<main>

<?php
if(isset($_POST['inserta'])) 
{
	$nombre = $mysqli->real_escape_string($_POST['nombre']);
	$raza = $mysqli->real_escape_string($_POST['raza']);
	$clase = $mysqli->real_escape_string($_POST['clase']);
	$nivel = $mysqli->real_escape_string($_POST['nivel']);
	$faccion = $mysqli->real_escape_string($_POST['faccion']);

	if(empty($nombre) || empty($raza) || empty($clase) || empty($nivel) || empty($faccion)) 
	{
		if(empty($nombre)) {
			echo "<div>Campo nombre vacío.</div>";
		}
		if(empty($raza)) {
			echo "<div>Campo raza vacío.</div>";
		}
		if(empty($clase)) {
			echo "<div>Campo clase vacío.</div>";
		}
		if(empty($nivel)) {
			echo "<div>Campo nivel vacío.</div>";
		}
		if(empty($faccion)) {
			echo "<div>Campo facción vacío.</div>";
		}
		$mysqli->close();
		echo "<a href='javascript:self.history.back();'>Volver atrás</a>";
	} 
	else 
	{
		$result = $mysqli->query("INSERT INTO personajes (nombre, raza, clase, nivel, faccion) VALUES ('$nombre', '$raza', '$clase', '$nivel', '$faccion')");	
		$mysqli->close();
		echo "<div>Registro añadido correctamente...</div>";
		echo "<a href='index.php'>Ver resultado</a>";
	}
}
?>

  	</main>
</div>
</body>
</html>
