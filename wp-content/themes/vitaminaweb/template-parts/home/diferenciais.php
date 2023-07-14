<?php

/**
 * 
 * Template Seção Diferenciais
 * 
 */
$texto_diferenciais = get_field('texto_diferenciais');
$link_diferenciais = get_field('link_diferenciais');
?>
<section class="diferenciais">
    <div class="container">
        <div class="c-text">
            <?php echo wp_kses_post($texto_diferenciais); ?>
        </div>
        <a href="<?php echo esc_url($link_diferenciais['url']); ?>" class="c-link c-link--blue" title="<?php esc_attr_e($link_diferenciais['title'], 'desjoyaux'); ?>" target="<?php esc_attr_e($link_diferenciais['target'], 'desjoyaux'); ?>">
            <?php esc_html_e($link_diferenciais['title'], 'desjoyaux'); ?>
        </a>
        <p class="diferenciais__texto-bottom">
            Se o mundo inteiro escolhe a Desjoyaux, por que não fazer o mesmo?
        </p>
    </div>
</section>