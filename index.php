<?php

// Obtener los comentarios de la base de datos
require_once __DIR__ . '/backend/obtener_comentarios.php';

// Contar los comentarios guardados
require_once __DIR__ . '/backend/contar_comentarios.php';

$total = $totalComentarios;

// Verificar si se publicó un comentario
$enviado = isset($_GET['enviado']);

function inicial($nombre) {
    $nombre = trim($nombre);
    $letra  = function_exists('mb_substr') ? mb_substr($nombre, 0, 1) : substr($nombre, 0, 1);
    return function_exists('mb_strtoupper') ? mb_strtoupper($letra) : strtoupper($letra);
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Su opinión es importante</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Iconos Font Awesome -->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Fuentes -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet" type="text/css" />
        <!-- Plantilla (incluye Bootstrap) -->
        <link href="css/styles.css" rel="stylesheet" />
        <!-- Estilos propios de la zona de comentarios -->
        <link href="css/comentarios.css" rel="stylesheet" />
    </head>
    <body id="page-top">

        <!-- Menú -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">Grupo VozLibre MKN</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Mostrar menú">
                    Menú
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#page-top">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#comentarios">Comentarios</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Encabezado -->
        <header class="masthead masthead-corto">
            <div class="container">
                <div class="masthead-subheading">Queremos escucharle</div>
                <div class="masthead-heading text-uppercase">Su opinión es importante</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#comentarios">Dejar un comentario</a>
            </div>
        </header>

        <!-- Zona de comentarios -->
        <section class="page-section seccion-comentarios" id="comentarios">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Comentarios</h2>
                    <h3 class="section-subheading">Escriba su opinión y vea lo que dicen los demás.</h3>
                </div>

                <?php if ($enviado): ?>
                <div class="alert alert-success text-center" role="alert">
                    <strong>¡Gracias!</strong> Su comentario fue publicado.
                </div>
                <?php endif; ?>

                <div class="row g-5">

                    <!-- Columna izquierda: formulario -->
                    <div class="col-lg-5">
                        <form id="form-comentario" action="backend/guardar_comentario.php" method="POST" novalidate>
                            <div class="form-group">
                                <input class="form-control" id="nombre" name="nombre" type="text"
                                       placeholder="Su nombre *" maxlength="50" required />
                                <div class="invalid-feedback">Por favor escriba su nombre.</div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="comentario" name="comentario"
                                          placeholder="Su comentario *" maxlength="500" required></textarea>
                                <div class="invalid-feedback">Por favor escriba su comentario.</div>
                                <div class="contador-letras text-end"><span id="letras">0</span>/500</div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary btn-xl text-uppercase" type="submit">Enviar</button>
                            </div>
                        </form>
                    </div>

                    <!-- Columna derecha: comentarios recibidos -->
                    <div class="col-lg-7">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h4 class="titulo-lista mb-0">Comentarios recibidos</h4>
                            <span class="badge contador-comentarios">
                                <?= $total ?> comentario<?= $total === 1 ? '' : 's' ?>
                            </span>
                        </div>

                        <div class="lista-comentarios">
                            <?php if ($total === 0): ?>
                                <p class="sin-comentarios">Aún no hay comentarios. ¡Sea el primero!</p>
                            <?php endif; ?>

                            <?php foreach ($comentarios as $c): ?>
                            <article class="tarjeta-comentario">
                                <div class="avatar"><?= htmlspecialchars(inicial($c['nombre'])) ?></div>
                                <div class="tarjeta-cuerpo">
                                    <div class="tarjeta-cabecera">
                                        <span class="tarjeta-nombre"><?= htmlspecialchars($c['nombre']) ?></span>
                                        <?php if (!empty($c['fecha'])): ?>
                                            <span class="tarjeta-fecha"><?= htmlspecialchars($c['fecha']) ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <p class="tarjeta-texto"><?= nl2br(htmlspecialchars($c['comentario'])) ?></p>
                                </div>
                            </article>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Pie de página -->
        <footer class="footer py-4">
            <div class="container">
                <div>Intituto Tecnologico de las Américas (ITLA) &copy; 2026</div>
                <div>Profesor: Daniel Parra</div>
                <div>Proyecto Grupal</div>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/validacion.js"></script>
    </body>
</html>
