<?php

/**
 * 
 * Template seção historia home
 * 
 */
$titulo = get_field('titulo');
$subtitulo = get_field('subtitulo');
$texto = get_field('texto_historia');
$timeline = get_field('timeline');
?>
<section class="timeline-historia">
    <div class="container">
        <h2 class="c-title">
            <?php esc_html_e($titulo, 'desjoyaux'); ?>
        </h2>
        <h3 class="c-subtitle">
            <?php esc_html_e($subtitulo, 'desjoyaux'); ?>
        </h3>
        <div class="c-text timeline-historia__texto">
            <?php echo wp_kses_post($texto, 'desjoyaux'); ?>
        </div>
    </div>

    <div class="c-timeline slider-timeline swiper">
        <div class="swiper-wrapper">
            <?php
            foreach ($timeline as $item) :
            ?>
                <div class="c-timeline__event swiper-slide">
                    <div class="c-timeline__year"><?php esc_html_e( $item['ano'], 'desjoyaux' ) ?></div>
                    <?php echo wp_get_attachment_image( $item['imagem']['ID'], 'full' ); ?>
                    <p class="c-timeline__title"><?php esc_html_e( $item['titulo'], 'desjoyaux' ) ?></p>
                    <p class="c-timeline__subtitle"><?php esc_html_e( $item['subtitulo'], 'desjoyaux' ) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="container">
        <h4>
            Juntos, tornamos a piscina dos seus sonhos realidade!
        </h4>
    </div>
</section>