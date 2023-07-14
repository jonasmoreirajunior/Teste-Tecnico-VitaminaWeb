<?php

/**
 * 
 * Template Name: Página Inicial
 * 
 */

get_header();
?>

<main class="home-page">

    <?php get_template_part('template-parts/home/historia'); ?>

    <?php get_template_part('template-parts/home/slider-home'); ?>

    <?php get_template_part('template-parts/home/diferenciais'); ?>

    <?php include get_template_directory() . '/template-parts/home/ultimas-noticias.php'; ?>

    <?php include get_template_directory() . '/template-parts/home/fazer-parte.php'; ?>

</main>

<?php get_footer(); ?>