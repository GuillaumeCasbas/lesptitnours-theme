<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package LesPtitnours
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">

                <div class="col-4 text-center"></div>
                <div class="col-4 text-center">
                    <?php
                    // the_custom_logo();
                    if (is_front_page() && is_home()) :
                    ?>
                        <h1 class="site-title"><a class="blog-header-logo text-dark" href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                    <?php
                    else :
                    ?>
                        <p class="site-title"><a class="blog-header-logo text-dark" href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                    <?php
                    endif;
                    ?>
                </div>
                <div class="col-4 text-center">
                <?php get_search_form(); ?>
                </div>
            </div>
        </header>
        <nav id="site-navigation" class="navbar-expand">
            <?php
            wp_nav_menu(
                array(
                    'theme_location'  => 'menu-1',
                    'menu_id'         => 'primary-menu',
                    'menu_class'      => 'navbar-nav gap-3 justify-content-center',
                    'container_class' => 'container-fluid',
                    'walker'          => new WP_Bootstrap_Navwalker()
                )
            );
            ?>
        </nav><!-- #site-navigation -->

    </div>