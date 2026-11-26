<?php

require_once __DIR__ . '/conexion.php';

// Verificar que los datos lleguen por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recibir y limpiar los datos
    $nombre = trim($_POST['nombre'] ?? '');
    $comentario = trim($_POST['comentario'] ?? '');

    // Validar que los campos no estén vacíos
    if ($nombre === '' || $comentario === '') {
        http_response_code(400);
        exit('Todos los campos son obligatorios.');
    }

    // Validar la cantidad de caracteres
    if (iconv_strlen($nombre, 'UTF-8') > 50 ||
        iconv_strlen($comentario, 'UTF-8') > 500) {
        http_response_code(400);
        exit('Se ha excedido el límite de caracteres.');
    }

    // Preparar la consulta SQL
    $sql = "INSERT INTO comentarios (nombre, comentario)
            VALUES (:nombre, :comentario)";

    $consulta = $conexion->prepare($sql);

    // Guardar los datos
    $consulta->execute([
        ':nombre' => $nombre,
        ':comentario' => $comentario
    ]);

    // Regresar a la página principal
    header('Location: ../index.php?enviado=1#comentarios');
    exit;
}