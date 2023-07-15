<?php

/**
 * 
 * Template Name: Confirmação de Email
 * 
 */
get_header();
$UF = $_GET['UF'];
if (!empty($UF)) {
    $args = array(
        'post_type' => 'unidades',
        'tax_query' => array(
            array(
                'taxonomy' => 'uf',
                'field' => 'slug',
                'terms' => $UF
            )
        )
    );
}

$query = new WP_Query($args);
?>
<main class="contato confirmacao-contato">
    <div class="container">
        <h2 class="c-title">
            Obrigado...
        </h2>

        <h3 class="c-subtitle">
            Recebemos sua mensagem!
        </h3>

        <?php
        if ($query->have_posts()) :
            while ($query->have_posts()) :
                $query->the_post();
        ?>
                <p class="c-text">
                    Conheça as unidades da Desjoyaux próximas a sua região.
                </p>

                <div class="contato__unidades">
                    <div class="contato__unidade">
                        <div class="contato__endereco">
                            <h4><?php the_title(); ?></h4>
                            <div class="contato__infos">
                                <p>Telefone:</p>
                                <p><?php esc_html_e(get_field('telefone'), 'desjoyaux'); ?></p>
                            </div>
                            <div class="contato__infos">
                                <p>E-mail:</p>
                                <p><?php esc_html_e(get_field('email'), 'desjoyaux'); ?></p>
                            </div>
                            <div class="contato__infos">
                                <p>Endereço:</p>
                                <p><?php esc_html_e(get_field('endereco'), 'desjoyaux'); ?></p>
                            </div>
                            <div class="contato__infos">
                                <p>CEP:</p>
                                <p><?php esc_html_e(get_field('cep'), 'desjoyaux'); ?></p>
                            </div>
                            <div class="contato__infos">
                                <p>Horário de Funcionamento:</p>
                                <p><?php esc_html_e(get_field('horario_de_funcionamento'), 'desjoyaux'); ?></p>
                            </div>
                        </div>

                        <figure class="contato__imagem-unidade">
                            <img src="<?php echo get_template_directory_uri() ?>/resources/images/imagem-unidade-rj.png" alt="Unidade RJ">
                        </figure>
                    </div>
                </div>

            <?php
            wp_reset_postdata(); endwhile;
        else : ?>
            <p class="c-text">Entraremos em contato em breve!</p>
        <?php endif; ?>

    </div>
</main>
<?php
get_footer();
?>