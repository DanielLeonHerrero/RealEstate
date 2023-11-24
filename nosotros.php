<?php
require_once 'includes/funciones.php';
incluirTemplate("header");
?>
    <main class="contenedor seccion">
        <h1>Conoce sobre nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre Nosotros">
                </picture>
            </div>
            <div class="texto-nosotros">
                <blockquote>25 Años de Experiencia</blockquote>

                <p>
                    Non commodo et adipisicing aliquip esse nisi dolor eu sint enim reprehenderit proident et tempor. Do consectetur ea ullamco mollit cillum incididunt mollit. Magna Lorem commodo labore in elit pariatur irure mollit cupidatat aute. Occaecat irure cupidatat excepteur irure eu non ullamco non excepteur aute. Esse minim mollit ipsum ipsum non eiusmod adipisicing anim exercitation. Proident ipsum quis irure amet velit Lorem mollit quis reprehenderit est.
                </p>
                <p>Nostrud incididunt fugiat est in. Laboris ad consequat dolore aliquip mollit non nulla veniam ullamco velit cupidatat adipisicing quis. Aliqua minim minim velit est tempor proident dolore ipsum ad quis. Veniam tempor adipisicing exercitation occaecat nisi.</p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>

                <p>Nostrud esse laborum consectetur dolor veniam veniam ea in dolore non. Laboris dolore consequat cupidatat minim exercitation. 
                    Deserunt anim veniam ad dolore excepteur officia anim adipisicing reprehenderit cillum adipisicing.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>

                <p>Nostrud esse laborum consectetur dolor veniam veniam ea in dolore non. Laboris dolore consequat cupidatat minim exercitation. 
                    Deserunt anim veniam ad dolore excepteur officia anim adipisicing reprehenderit cillum adipisicing.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>

                <p>Nostrud esse laborum consectetur dolor veniam veniam ea in dolore non. Laboris dolore consequat cupidatat minim exercitation. 
                    Deserunt anim veniam ad dolore excepteur officia anim adipisicing reprehenderit cillum adipisicing.</p>
            </div>
        </div>
    </section>
    <?php
incluirTemplate("footer");
?>