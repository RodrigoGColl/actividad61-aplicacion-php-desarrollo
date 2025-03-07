<?php
/*Incluye parámetros de conexión a la base de datos: 
DB_HOST: Nombre o dirección del gestor de BD MariaDB
DB_NAME: Nombre de la BD
DB_USER: Usuario de la BD
DB_PASSWORD: Contraseña del usuario de la BD
*/
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>World of Warcraft - Personajes</title>
</head>
<body>
<div>
	<header>
		<h1>WORLD OF WARCRAFT - BASE DE DATOS</h1>
	</header>

	<main>
	<ul>
		<li><a href="index.php">Inicio</a></li>
		<li><a href="add.html">Añadir personaje</a></li>
	</ul>
	<h2>Lista de personajes</h2>
	<table border="1">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Raza</th>
			<th>Nivel</th>
			<th>Clase</th>
			<th>Faccion</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>

<?php
/*Se realiza una consulta de selección a la tabla personajes ordenados y se almacena en $resultado*/
$resultado = $mysqli->query("SELECT * FROM personajes ORDER BY nombre, faccion");

//Cierra la conexión de la BD
$mysqli->close();

//Comprobamos si hay registros
if ($resultado->num_rows > 0) {

	// Recorremos cada fila de la tabla
	while($fila = $resultado->fetch_array()) {
		echo "<tr>\n";
		echo "<td>".$fila['nombre']."</td>\n";
		echo "<td>".$fila['raza']."</td>\n";  // Raza del personaje
		echo "<td>".$fila['nivel']."</td>\n";  // Nivel del personaje
		echo "<td>".$fila['clase']."</td>\n";  // Clase del personaje
		echo "<td>".$fila['faccion']."</td>\n";  // Clase del personaje
		echo "<td>";
		echo "<a href=\"edit.php?idpersonaje=$fila[id]\">Editar</a> | ";
		echo "<a href=\"delete.php?idpersonaje=$fila[id]\" onClick=\"return confirm('¿Seguro que quieres eliminar este personaje?')\">Eliminar</a></td>\n";
		echo "</tr>\n";
	}
}
?>

	</tbody>
	</table>
	</main>
	<footer>
    	Created by the IES Miguel Herrero team &copy; 2025
  	</footer>
</div>
</body>
</html>

