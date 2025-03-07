<?php
// Incluye fichero con parámetros de conexión a la base de datos
include("config.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baja de Personaje</title>
</head>
<body>
<div>
	<header>
		<h1>WORLD OF WARCRAFT - BASE DE DATOS</h1>
	</header>
	<main>

<?php
// Obtiene el id del personaje a eliminar desde la URL con el método GET
$idpersonaje = $_GET['idpersonaje'];

// Protege contra inyección SQL escapando caracteres especiales
$idpersonaje = $mysqli->real_escape_string($idpersonaje);

// Ejecuta la consulta para eliminar el registro
$result = $mysqli->query("DELETE FROM personajes WHERE personaje_id = $idpersonaje");

// Cierra la conexión a la base de datos
$mysqli->close();

echo "<div>Personaje eliminado correctamente...</div>";
echo "<a href='index.php'>Ver resultado</a>";
// Redirección opcional
// header("Location: index.php");
?>

    </main>
</div>
</body>
</html>

