<?php
require_once '../../includes/config/database.php';
$db = conectarDB();

// Array con mensajes de errores
$errores = [];

// Ejecutar el codigo despues de que el usuario envia el formulario
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    // echo "<pre>";
    // var_dump($_FILES);
    // echo "</pre>";

    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descipcion'];
    $habitaciones = $_POST['habitaciones'];
    $wc = $_POST['wc'];
    $estacionamiento = $_POST['estacionamiento'];
    $vendedorId = $_POST['vendedor'];

    if(!$titulo){
        $errores[] = "Debes añadir un titulo";
    }
    if(!$precio){
        $errores[] = "Debes añadir un precio";
    }
    if(strlen($descripcion) < 50){
        $errores[] = "Debes añadir una descripcion de al menos 50 caracteres";
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

    if (empty($errores)) {
        // Insertar en la base de datos
        $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, vendedorId) 
        VALUES ('$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$vendedorId')";
    
        // echo $query;
    
        $resultado = mysqli_query($db, $query);
    
        if($resultado){
            echo "Insertado correctamente";
        }
    }

}

require_once '../../includes/funciones.php';
incluirTemplate("header");
?>

<main class="contenedor seccion">
    <h1>crear</h1>

    <?php 
    foreach($errores as $error){ ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <form action="" class="formulario" method="POST" action="/admin/propiedades/crear.php">
        <fieldset>
            <legend>Información General</legend>
            
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" placeholder="Titulo propiedad">
            
            <label for="precio">Precio:</label>
            <input type="text" name="precio" id="precio" placeholder="precio propiedad">
            
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png">
            
            <label for="descripcion">Descripción:</label>
            <textarea name="descipcion" id="descipcion"></textarea>
            
        </fieldset>

        <fieldset>
            <legend>Información Propiedad</legend>
            
            <label for="habitaciones">Habitaciones:</label>
            <input type="number" name="habitaciones" id="habitaciones" placeholder="Ej: 3" min="1" max="9">
            
            <label for="wc">Baños:</label>
            <input type="number" name="wc" id="wc" placeholder="Ej: 3" min="1" max="9">
            
            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" name="estacionamiento" id="estacionamiento" placeholder="Ej: 3" min="1" max="9">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            
            <select name="vendedor" id="vendedor">
                <option value="">-- Seleccione --</option>
                <option value="1">Daniel</option>
                <option value="2">Bianca</option>
            </select>
        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>

</main>

<?php
incluirTemplate("footer");
?>