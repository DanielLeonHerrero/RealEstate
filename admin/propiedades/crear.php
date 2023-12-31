<?php
require_once '../../includes/funciones.php';
$auth = estaAuthenticado();
if(!$auth){
    header('Location: /');
}
require_once '../../includes/config/database.php';
$db = conectarDB();

//Consulta para obtener los vendedores
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

// Array con mensajes de errores
$errores = [];

$titulo = "";
$precio = "";
$descripcion = "";
$habitaciones = "";
$wc = "";
$estacionamiento = "";
$vendedorId = "";


// Ejecutar el codigo despues de que el usuario envía el formulario
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    // echo "<pre>";
    // var_dump($_FILES);
    // echo "</pre>";

    $titulo = mysqli_real_escape_string($db,$_POST['titulo']);
    $precio = mysqli_real_escape_string($db,$_POST['precio']);
    $descripcion = mysqli_real_escape_string($db,$_POST['descipcion']);
    $habitaciones = mysqli_real_escape_string($db,$_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db,$_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db,$_POST['estacionamiento']);
    $vendedorId = mysqli_real_escape_string($db,$_POST['vendedor']);
    $creado = date('Y/m/d');

    $imagen = $_FILES['imagen'];

    if(!$titulo){
        $errores[] = "Debes añadir un titulo";
    }
    if(!$precio){
        $errores[] = "Debes añadir un precio";
    }
    if(strlen($descripcion) < 50){
        $errores[] = "Debes añadir una descripción de al menos 50 caracteres";
    }
    if(!$habitaciones){
        $errores[] = "Debes añadir un numero de habitaciones";
    }
    if(!$wc){
        $errores[] = "Debes añadir un numero de baños";
    }
    if(!$estacionamiento){
        $errores[] = "Debes añadir un numero de estacionamientos";
    }
    if(!$vendedorId){
        $errores[] = "Debes añadir un vendedor";
    }
    if(!$imagen['name'] || $imagen['error']){
        $errores[] = "Debes añadir una imagen";
    }
    //Validar por tamaño (1 MB max)
    $medida = 1000 * 1000;
    if($imagen['size'] > $medida){
        $errores[] = "La imagen es muy pesada";
    }

    if (empty($errores)) {
        // Crear carpeta
        $carpetaImagenes = '../../imagenes/';
        if(!is_dir($carpetaImagenes)){
            mkdir($carpetaImagenes);
        }
        // Generar nombre único
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
        // Subir las imágenes
        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);



        // Insertar en la base de datos
        $query = "INSERT INTO propiedades (titulo, precio,imagen, descripcion, habitaciones, wc, estacionamiento,creado, vendedorId) 
        VALUES ('$titulo', '$precio','$nombreImagen','$descripcion', '$habitaciones', '$wc', '$estacionamiento','$creado', '$vendedorId')";
    
        // echo $query;
    
        $resultado = mysqli_query($db, $query);
    
        if($resultado){
            // echo "Insertado correctamente";
            header('Location: /admin?resultado=1');
        }
    }

}

incluirTemplate("header");
?>

<main class="contenedor seccion">
    <h1>Crear nueva propiedad</h1>

    <?php 
    foreach($errores as $error){ ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <form action="" class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
        <fieldset>
            <legend>Información General</legend>
            
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" placeholder="Titulo propiedad" value="<?php echo $titulo; ?>">
            
            <label for="precio">Precio:</label>
            <input type="text" name="precio" id="precio" placeholder="precio propiedad" value="<?php echo $precio ?>">
            
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">
            
            <label for="descripcion">Descripción:</label>
            <textarea name="descipcion" id="descipcion"><?php  echo $descripcion;?></textarea>
            
        </fieldset>

        <fieldset>
            <legend>Información Propiedad</legend>
            
            <label for="habitaciones">Habitaciones:</label>
            <input type="number" name="habitaciones" id="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones; ?>">
            
            <label for="wc">Baños:</label>
            <input type="number" name="wc" id="wc" placeholder="Ej: 3" min="1" max="9" value="<?php echo $wc; ?>">
            
            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" name="estacionamiento" id="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            
            <select name="vendedor" id="vendedor">
                <option value="">-- Seleccione --</option>
                <?php while($row = mysqli_fetch_assoc($resultado)){ ?>
                    <option <?php echo $vendedorId === $row['id'] ? 'selected' : ''; ?> value="<?php echo $row['id']; ?>"><?php echo $row['nombre'] . " " . $row['apellido']; ?></option>
                <?php } ?>
            </select>
        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>

</main>

<?php
incluirTemplate("footer");
?>