<?php

require_once 'app.php';

// Define the path to the templates folder
function incluirTemplate(string $nombre, bool $inicio = false)
{
    include TEMPLATES_URL . "/$nombre.php";
}

function estaAuthenticado() : bool
{
    session_start();

    $auth = $_SESSION['login'];

    if($auth){
        return true;
    }

    return false;
    
}