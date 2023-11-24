<?php
require_once '../../includes/funciones.php';
incluirTemplate("header");
?>

<main class="contenedor seccion">
    <h1>crear</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <form action="" class="formulario">
        <fieldset>
            <legend>Información General</legend>
            
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" placeholder="Titulo propiedad">
            
            <label for="precio">Precio:</label>
            <input type="text" name="precio" id="precio" placeholder="precio propiedad">
            
            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">
            
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