<?php
require_once 'includes/funciones.php';
incluirTemplate("header");
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guia para la decoracion de tu hogar</h1>


        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="Imagen de la propiedad">
        </picture>
        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

        <div class="resumen-propiedad">

            <p>Id velit reprehenderit aliqua ullamco cillum non incididunt nulla in non consequat. Adipisicing sit qui
                do cupidatat nulla magna amet laboris amet deserunt velit incididunt aute laborum. Do laborum duis
                excepteur sit est.

                Ad aliqua et qui enim do. Duis excepteur culpa excepteur commodo. Nulla exercitation ullamco
                reprehenderit veniam ullamco ex tempor Lorem consectetur ipsum.</p>

            <p>Laboris ipsum veniam id labore enim sit cillum incididunt dolor incididunt. Esse cupidatat aute nostrud
                do id magna nisi in veniam consequat nisi labore. Aliquip cillum magna minim ex nostrud voluptate Lorem.

                Culpa Lorem nulla consectetur ad veniam sint consectetur incididunt proident tempor exercitation. Cillum
                labore dolor consequat est ex cillum amet aute anim ullamco anim labore. Cillum quis exercitation id
                incididunt.</p>
        </div>
    </main>

    <?php
incluirTemplate("footer");
?>