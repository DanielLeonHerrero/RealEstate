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

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Casa en la playa</td>
                <td><img src="/imagenes/d7924930e32418f96194df82f4b302e3.jpg" class="imagen-tabla"></td>
                <td>$120000000</td>
                <td>
                    <a href="#" class="boton-rojo-block">Eliminar</a>
                    <a href="#" class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
        </tbody>
    </table>
</main>

<?php
incluirTemplate("footer");
?>