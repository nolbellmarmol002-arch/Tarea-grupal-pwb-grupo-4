# Grupo VozLibre MKN - Tarea grupal PWB, Grupo 4

Página web donde los visitantes pueden dejar su opinión y leer lo que han escrito los demás. Está hecha con PHP y SQLite, y los comentarios quedan guardados en una base de datos.

## Qué hace la página

- **Inicio:** pantalla de bienvenida con el mensaje "Queremos escucharle - Su opinión es importante" y el botón **Dejar un comentario**, que lleva a la sección de comentarios.
- **Comentarios:** formulario con los campos **Su nombre** y **Su comentario** (ambos obligatorios, con un contador de hasta 500 caracteres) y el botón **Enviar**.
- Al enviar, la página muestra el aviso "¡Gracias! Su comentario fue publicado."
- **Comentarios recibidos:** lista con todos los comentarios guardados. Cada uno muestra la inicial del autor, su nombre, la fecha y hora, y el texto. Un contador indica cuántos comentarios hay.

## Integrantes

- Kelvin Garcia Vargas - 2024-1606 - Backend
- Michael Ryan Peguero García - 2025-1175 - Frontend
- [Nolbell Marmol 2025-1226] - servidor y pruebas

## Tecnologías

- PHP
- SQLite (con PDO)
- HTML, CSS y JavaScript
- Bootstrap

## Estructura del proyecto

```
├── assets/                       Recursos del sitio
├── backend/
│   ├── conexion.php              Conexión a SQLite y creación de la tabla
│   ├── guardar_comentario.php    Guarda un comentario nuevo
│   ├── obtener_comentarios.php   Devuelve los comentarios guardados
│   └── contar_comentarios.php    Cuenta los comentarios
├── css/                          Estilos
├── js/                           Scripts del frontend
├── index.php                     Página principal
└── .gitignore
```

## Base de datos

La base de datos es SQLite y no requiere instalación ni configuración. El archivo `database/comentarios.db` se crea automáticamente la primera vez que se abre la página, junto con la tabla `comentarios`:

| Campo      | Tipo                                     |
|------------|------------------------------------------|
| id         | INTEGER, clave primaria, autoincremental |
| nombre     | TEXT, obligatorio                        |
| comentario | TEXT, obligatorio                        |
| fecha      | DATETIME, por defecto la fecha actual    |

La carpeta `database/` está en el `.gitignore`, por eso no se sube al repositorio.

## Requisitos

- PHP con la extensión `pdo_sqlite` habilitada (Laragon la trae activa)

## Cómo ejecutarlo

1. Clona el repositorio:
   ```
   git clone https://github.com/nolbellmarmol002-arch/Tarea-grupal-pwb-grupo-4.git
   ```
2. Si usas Laragon, deja la carpeta dentro de `www` y abre `http://localhost/Tarea-grupal-pwb-grupo-4/` en el navegador. También puedes ejecutar desde la carpeta del proyecto:
   ```
   php -S localhost:8000
   ```
   y abrir `http://localhost:8000`.
3. Escribe un nombre y un comentario, pulsa **Enviar** y verás tu comentario en la lista.

## Ramas

- `main`: versión final del proyecto
- `frontend`: formulario y zona de comentarios
- `backend`: base de datos SQLite y archivos PHP del servidor