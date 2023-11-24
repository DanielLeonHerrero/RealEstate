<?php

require_once 'app.php';

// Define the path to the templates folder
function incluirTemplate(string $nombre, bool $inicio = false)
{
    include TEMPLATES_URL . "/$nombre.php";
}
