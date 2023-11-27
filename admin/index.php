<?php
require_once '../includes/config/database.php';
$db = conectarDB();

$querry = "SELECT * FROM propiedades";

$resultado = mysqli_query($db, $querry);

//Recuperar datos de tipo GET
$mensaje = $_GET['resultado'] ?? null;
//Requires
require_once '../includes/funciones.php';
incluirTemplate("header");
?>

<main class="contenedor seccion">
    <h1>Administrador de Bienes Raíces</h1>
    <?php 
        if(intval($mensaje) === 1){
            $mensaje = "Anuncio creado correctamente";
            echo "<p class='alerta exito'>" . $mensaje . "</p>";
        } else if (intval($mensaje) === 2){
            $mensaje = "Anuncio actualizado correctamente";
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
            <?php while($propiedad = mysqli_fetch_assoc($resultado)): ?> 
            <tr>
                <td><?php echo $propiedad['id']; ?></td>
                <td><?php echo $propiedad['titulo']; ?></td>
                <td><img src="/imagenes/<?php echo $propiedad['imagen']; ?>" class="imagen-tabla"></td>
                <td><?php echo $propiedad['precio']; ?></td>
                <td>
                    <a href="#" class="boton-rojo-block">Eliminar</a>
                    <a href="admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
            <?php endwhile; ?>
            
            <!-- <tr>
                <td>1</td>
                <td>Casa en la playa</td>
                <td><img src="/imagenes/d7924930e32418f96194df82f4b302e3.jpg" class="imagen-tabla"></td>
                <td>$120000000</td>
                <td>
                    <a href="#" class="boton-rojo-block">Eliminar</a>
                    <a href="#" class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr> -->
        </tbody>
    </table>
</main>

<?php
mysqli_close($db);
incluirTemplate("footer");
?>