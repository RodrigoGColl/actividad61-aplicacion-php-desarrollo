<?php
//Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>World of Warcraft - Modificar Personaje</title>
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
	<h2>Modificar personaje</h2>

<?php
// Recoge el id del personaje a modificar desde la URL usando GET
$idpersonaje = $_GET['idpersonaje'];

// Protege el dato para evitar inyección SQL
$idpersonaje = $mysqli->real_escape_string($idpersonaje);

// Obtiene los datos del personaje a modificar
$resultado = $mysqli->query("SELECT raza, nombre, nivel, clase, faccion FROM personajes WHERE id = $idpersonaje");

// Extrae los datos del personaje
$fila = $resultado->fetch_array();
$raza = $fila['nombre'];  
$nombre = $fila['raza'];
$nivel = $fila['nivel'];  
$clase = $fila['clase'];  
$faccion = $fila['faccion']; // Nueva columna de facción

// Cierra la conexión a la base de datos
$mysqli->close();
?>

<!-- Formulario de edición -->
	<form action="edit_action.php" method="post">
		<div>
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" id="nombre" value="<?php echo $nombre;?>" required>
		</div>

		<div>
			<label for="raza">Raza</label>
			<input type="text" name="raza" id="raza" value="<?php echo $raza;?>" required>
		</div>

		<div>
			<label for="nivel">Nivel</label>
			<input type="number" name="nivel" id="nivel" value="<?php echo $nivel;?>" required>
		</div>

		<div>
			<label for="clase">Clase</label>
			<select name="clase" id="clase">
				<option value="<?php echo $clase;?>" selected><?php echo $clase;?></option>
				<option value="Guerrero">Guerrero</option>
				<option value="Mago">Mago</option>
				<option value="Pícaro">Pícaro</option>
				<option value="Sacerdote">Sacerdote</option>
				<option value="Cazador">Cazador</option>
				<option value="Druida">Druida</option>
				<option value="Brujo">Brujo</option>
				<option value="Chamán">Chamán</option>
				<option value="Paladín">Paladín</option>
				<option value="Caballero de la Muerte">Caballero de la Muerte</option>
				<option value="Monje">Monje</option>
				<option value="Cazador de Demonios">Cazador de Demonios</option>
			</select>	
		</div>

		<div>
			<label for="faccion">Facción</label>
			<select name="faccion" id="faccion">
				<option value="<?php echo $faccion;?>" selected><?php echo $faccion;?></option>
				<option value="Alianza">Alianza</option>
				<option value="Horda">Horda</option>
			</select>
		</div>

		<div>
			<input type="hidden" name="idpersonaje" value="<?php echo $idpersonaje;?>">
			<input type="submit" name="modifica" value="Guardar">
			<input type="button" value="Cancelar" onclick="location.href='index.php'">
		</div>
	</form>
	</main>	
	<footer>
		Created by the IES Miguel Herrero team &copy; 2025
  	</footer>
</div>
</body>
</html>



