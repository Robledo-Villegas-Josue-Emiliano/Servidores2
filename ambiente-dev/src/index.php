<?php
$c = new mysqli('db', 'app_web', 'ClaveApp123', 'demo');
if ($c->connect_error) { die('Sin conexion a la base de datos'); }
$r = $c->query('SELECT nombre, carrera FROM alumnos');
while ($f = $r->fetch_assoc()) {
    echo htmlspecialchars($f['nombre']) . ' - ' . htmlspecialchars($f['carrera']) . '<br>';
}
