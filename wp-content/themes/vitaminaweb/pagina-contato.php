<?php

/**
 * 
 * Template Name: Contato
 * 
 */
get_header();
?>
<main class="contato">
    <div class="container">
        <h2 class="c-title">
            Contato
        </h2>

        <h3 class="c-subtitle">
            Fale conosco!
        </h3>

        <div class="c-form-contato">
            <?php echo do_shortcode('[contact-form-7 id="96" title="Contato"]'); ?>
        </div>
    </div>
</main>
<?php
get_footer();
?>