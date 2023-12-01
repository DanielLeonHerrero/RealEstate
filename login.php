<?php
require_once 'includes/config/database.php';
$db = conectarDB();

$errores = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email =  mysqli_real_escape_string($db,filter_var($_POST["email"], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db,$_POST["password"]);
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);
    // $query = "INSERT INTO usuarios (email, password) VALUES ('$email', '$passwordHash');";
    // mysqli_query($db, $query);
    if (!$email) {
        $errores[] = "El email es obligatorio o no es válido";
    }
    if (!$password) {
        $errores[] = "El password es obligatorio";
    }
    if (empty($errores)) {
        $query = "SELECT * FROM usuarios WHERE email = '$email'";
        $resultado = mysqli_query($db, $query);
        if ($resultado->num_rows) {
            $usuario = mysqli_fetch_assoc($resultado);
            $auth = password_verify($password, $usuario["password"]);
            if ($auth) {
                session_start();
                $_SESSION["usuario"] = $usuario["email"];
                $_SESSION["login"] = true;
                header("Location: /admin");
            } else {
                $errores[] = "El password es incorrecto";
            }
        } else {
            $errores[] = "El usuario no existe";
        }
}


}

require_once 'includes/funciones.php';
incluirTemplate("header");
?>
<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php 
        foreach ($errores as $error) {
            echo "<div class='alerta error'>";
            echo $error;
            echo "</div>";
        }
    ?>

    <form method="POST" class="formulario" novalidate>
        <fieldset>
                    <legend>Email y Password</legend>
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="Tu email" name="email" required>


                    <label for="Password">Contraseña</label>
                    <input type="password" id="Password" placeholder="Tu Password" name="password" required>

            </fieldset>

            <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate("footer");
?>