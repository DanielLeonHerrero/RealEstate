<?php 
function conectarDB() : mysqli{
    $db = mysqli_connect('srv1161.hstgr.io','u341974841_root','Realestate157','u341974841_realestate');
    if(!$db){
        echo "Error no se pudo conectar";
        exit;
    }

    return $db;
}

?>