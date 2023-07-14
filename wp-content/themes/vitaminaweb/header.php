<?php
/**
 * 
 * Theme header
 *
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <title><?php bloginfo('title'); ?></title>

    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="c-header">
        <div class="container c-header__container">
            <figure class="c-header__logo">
                <h1>
                    <?php
                    if (function_exists( 'the_custom_logo' )) {
                        the_custom_logo();
                    } else {
                        bloginfo('name');
                    }
                    ?>
                </h1>
            </figure>

            <button class="c-header__menu-mobile js-open-mobile-menu">
                <div class="dot dot1"></div>
                <div class="dot dot2"></div>
                <div class="dot dot3"></div>
            </button>

            <nav class="c-header__menu">
                <?php
                $args = array(
                    'theme_location' 	=> 'header-menu',
					'menu_class'		=> 'menu',
					'container'			=> 'div',
					'container_class' 	=> 'main-menu'
                );

                wp_nav_menu($args);
                ?>
            </nav>

            <a href="<?php bloginfo('url'); ?>/contato" class="c-header__btn-contato">Contato</a>
        </div>
    </header>