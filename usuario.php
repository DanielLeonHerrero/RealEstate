<?php 
    require_once 'includes/config/database.php';
    $db = conectarDB();

    $email = 'admin@lioncode.es';
    $password = '123456';

    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    $querry = "INSERT INTO usuarios (email, password) VALUES ('$email', '$passwordHash');";

    mysqli_query($db, $querry);
?>