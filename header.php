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

    <header class="py-4 px-0 border-bottom">
        <div class="container">
            <div class="row w-100 align-items-center g-0 gx-lg-3">
                <div class="col">
                    <div class="d-lg-flex align-items-center text-center text-lg-left">
                        <?php // // the_custom_logo(); ?>
                        <a class="navbar-brand d-block" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <?php bloginfo('name'); ?>
                        </a>
                        <div class="w-100">
                            <div class="ps-lg-3 d-inline-block float-lg-end mt-3 mt-lg-0">
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                        <!--<a class="d-block" href="#">icon</a>-->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <nav class="navbar-expand">
        <?php
        wp_nav_menu(
            array(
                'theme_location'  => 'menu-1',
                'menu_id'         => 'primary-menu',
                'menu_class'      => 'navbar-nav gap-3 justify-content-center',
                'container_class' => 'container-fluid border-bottom',
                'walker'          => new WP_Bootstrap_Navwalker()
            )
        );
        ?>
    </nav>