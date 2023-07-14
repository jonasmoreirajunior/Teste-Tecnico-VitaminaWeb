<?php

/**
 * 
 * Template Slider Home
 * 
 */
$titulo_secao = get_field('titulo_secao_slider');
$subtitulo_secao = get_field('subtitulo_secao_slider');
$sliders = get_field('sliders');
?>
<section class="slider-home swiper">
    <div class="slider-home__items swiper-wrapper">
        <?php foreach ($sliders as $slide) : ?>
            <div class="slider-home__item swiper-slide">
                <figure class="slider-home__bg-image">
                    <?php echo wp_get_attachment_image($slide['imagem_de_fundo']['ID'], 'full'); ?>
                </figure>

                <h2 class="c-title">
                    <?php esc_html_e($titulo_secao, 'desjoyaux'); ?>
                </h2>
                <h3 class="c-subtitle">
                    <?php esc_html_e($subtitulo_secao, 'desjoyaux'); ?>
                </h3>

                <div class="slider-home__content">
                    <h4 class="slider-home__content-number">
                        <?php esc_html_e($slide['numero_slider'],  'desjoyaux'); ?>
                    </h4>
                    <p class="slider-home__content-title">
                        <?php esc_html_e($slide['titulo'],  'desjoyaux'); ?>
                    </p>
                    <div class="slider-home__content-text">
                        <?php echo wp_kses_post($slide['texto_slide']); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>