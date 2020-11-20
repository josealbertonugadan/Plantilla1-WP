<?php get_header(); ?>

<main class="container">
    <!-- Creamos un condicional para saber si tenemos información que mostrar-->
    <?php if (have_posts()) {
        // Iniciamos un while utilizando la misma función para instanciar el contenido de nuestra página
        while(have_posts()) {
            // Esta función le indicará al while si hay contenido por mostrar, se encargará de instanciar cada ciclo del while o finalizarlo.
            the_post(  ); ?>
            <!-- Está función nos trae el título de la página-->
            <h1 class="my-3"><?php the_title( ); ?></h1>
            <!-- Esta función nos trae el contenido, esta nos retorna el contenido y el contenido de los bloques de Gutenberg en la página -->
            <?php the_content( ); ?>
            <?php
        }
    } else {
        echo "<p>Esta página no tiene contenido</p>";
    } ?>
</main>

<?php get_footer(); ?>