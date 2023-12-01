<?php
//Requires
require_once '../includes/funciones.php';

$auth = estaAuthenticado();
if(!$auth){
    header('Location: /');
}
require_once '../includes/config/database.php';
$db = conectarDB();

$querry = "SELECT * FROM propiedades";

$resultado = mysqli_query($db, $querry);

//Recuperar datos de tipo GET
$mensaje = $_GET['resultado'] ?? null;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    
    if($id){
        //Eliminar archivo de la imagen
        $querry = "SELECT imagen FROM propiedades WHERE id = $id";
        $resultado = mysqli_query($db, $querry);
        $propiedad = mysqli_fetch_assoc($resultado);
        unlink('../imagenes/' . $propiedad['imagen']);
        
        //Eliminar propiedad de la base de datos
        $querry = "DELETE FROM propiedades WHERE id = $id";
        $resultado = mysqli_query($db, $querry);
        
        if($resultado){
            header('Location: /admin?resultado=3');
        }
    }
}
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
        } else if (intval($mensaje) === 3){
            $mensaje = "Anuncio eliminado correctamente";
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
                    <form method="POST" class="w-100">
                        <input type="hidden" name="id" value="<?php echo $propiedad['id']; ?>">
                        <input type="submit" class="boton-rojo-block" value="Eliminar"/>
                    </form>
                    <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">Actualizar</a>
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