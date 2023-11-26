<?php
$mensaje = $_GET['resultado'] ?? null;
require_once '../includes/funciones.php';
incluirTemplate("header");
?>

<main class="contenedor seccion">
    <h1>Administrador de Bienes Raíces</h1>
    <?php 
        if(intval($mensaje) === 1){
            $mensaje = "Anuncio creado correctamente";
            echo "<p class='alerta exito'>" . $mensaje . "</p>";
        }
    ?>

    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
</main>

<?php
incluirTemplate("footer");
?>