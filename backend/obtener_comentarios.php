<?php

require_once __DIR__ . '/conexion.php';

// Consultar los comentarios guardados
$sql = "SELECT * FROM comentarios
        ORDER BY fecha DESC, id DESC";

$consulta = $conexion->query($sql);

// Obtener todos los comentarios
$comentarios = $consulta->fetchAll(PDO::FETCH_ASSOC);