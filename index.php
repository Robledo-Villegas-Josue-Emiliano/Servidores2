<?php
$c = new msqli('localhost', 'app_web', 'ClaveSegura*2026', 'demo_servidores2');
if ($c->connect_error) { die('Error de conexion'); 
}

$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre  = $_POST['nombre'] ?? '';
    $carrera  = $_POST['carrera'] ?? '';

    if (!empty($nombre) && !empty($carrera)) {
        $stmt = $c->prepare("INSERT INTO alumnos (nombre, carrera) VALUES (?, ?)");
        $stmt->bind_param("ss", $nombre, $carrera);

        if ($stmt->execute()) {
            $mensaje = "!Alumno registrado con  exito!";
        } else {
            $mensaje = "Error al registrar el alumno.";
        }
        $stmt->close();
    } else {
        $mensaje = "Por favor, completa todos los campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Gestion de Alumnos</title>
</head>
<body>
	<h2>Registro de nuevos alumnos</h2>

	<?php if  (!empty($mensaje)) echo "<p><strong>$mensaje</strong></p>"; ?>

	<!-- Formulario HTML para dar de alta alumnos-->
	<form method="POST" action="">
		<label>Nombre:</label><br>
		<input type="text" name="nombre" required><br><br>

		<label>Carrera:</label><br>
                <input type="text" name="carrera" required><br><br>

		<input type="submit" value="Guardar Alumno">
	</form>

	<h2>Lista de Alumnos Registrados </h2>
	<?php
	$r = $c->query('SELECT nombre, carrera FROM alumnos');
	while ($f = $r->fetch_assoc()) {
		echo htmlspecialchars($f['nombre']) . ' - ' . htmlspecialchars($f['carrera']) . '<br>';
</body>
</hmtl> 
