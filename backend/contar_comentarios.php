<?php

require_once __DIR__ . '/conexion.php';

// Contar los comentarios guardados
$sql = "SELECT COUNT(*) FROM comentarios";

$consulta = $conexion->query($sql);

// Obtener la cantidad de comentarios
$totalComentarios = (int) $consulta->fetchColumn();