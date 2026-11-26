<?php

// Crear la carpeta de la base de datos si no existe
$carpeta = __DIR__ . '/../database';

if (!is_dir($carpeta)) {
    mkdir($carpeta, 0777, true);
}

// Ruta de la base de datos
$ruta = $carpeta . '/comentarios.db';

try {
    // Conexión con SQLite
    $conexion = new PDO('sqlite:' . $ruta);

    // Configurar el manejo de errores
    $conexion->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    // Crear la tabla de comentarios
    $conexion->exec("
        CREATE TABLE IF NOT EXISTS comentarios (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nombre TEXT NOT NULL,
            comentario TEXT NOT NULL,
            fecha DATETIME DEFAULT CURRENT_TIMESTAMP
        )
    ");

} catch (PDOException $e) {
    die('Error al conectar con la base de datos.');
}