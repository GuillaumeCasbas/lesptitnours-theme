<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LesPtitnours
 */

get_header();
?>

	<main class="container">
        <?php if ( have_posts() ) : ?>

            <header>
                <?php
                the_archive_title( '<h1>', '</h1>' );
                the_archive_description( '<div>', '</div>' );
                ?>
            </header>

            <div class="row">
                <?php
                /* Start the Loop */
                while ( have_posts() ) :
                    the_post();

                    ?>
                    <div class="col-md-6 col-lg-3">
                    <?php
                    get_template_part( 'template-parts/content', get_post_type() );
                    ?>
                    </div>
                    <?php

                endwhile;
                ?>
            </div>

            <?php
            the_posts_navigation();

        else :

            get_template_part( 'template-parts/content', 'none' );

        endif;
        ?>
	</main>

<?php
get_sidebar();
get_footer();
