<?php
$c = new msqli('localhost', 'app_web', 'ClaveSegura*2026', 'demo_servidores2');
if ($c->connect_error) { die('Error de conexion'); }
$r = $c->query('SELECT nombre, carrera FROM alumnos');
while ($f = $r->fetch_assoc()) { echo htmlspecialchars($f['nombre']) . ' - ' . htmlspecialchars($f['carrera']) . '<br>'; }
?>
