<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LesPtitnours
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    if ( isset($args['isCard']) && $args['isCard'] === true ):
        get_template_part('template-parts/_popote-card');
    elseif ( is_singular() ):
    ?>
        <header class="entry-header">
            <?php
            the_title('<h1 class="entry-title">', '</h1>');
            if ('ptitnours_popote' === get_post_type()):
            ?>
                <div class="entry-meta">
                    <?php
                    lesptitnours_posted_on();
                    ?>
                </div><!-- .entry-meta -->
            <?php elseif ('post' === get_post_type()) :
            ?>
                <div class="entry-meta">
                    <?php
                    lesptitnours_posted_on();
                    lesptitnours_posted_by();
                    ?>
                </div><!-- .entry-meta -->
            <?php endif; ?>
        </header><!-- .entry-header -->

        <div class="row">
            <div class="entry-content clearfix">
                <?php
                // Thumbnail
                if (has_post_thumbnail()):
                    $thumbnail_id = get_post_thumbnail_id();
                    $image = wp_get_attachment_image(
                        $thumbnail_id,
                        'large',
                        false,
                        array(
                            'class' => 'img-thumbnail rounded col-md-3 float-md-start mb-3 me-md-5',
                        )
                    );
                    echo $image;
                endif;

                the_content(
                    sprintf(
                        wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                            __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'lesptitnours'),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        wp_kses_post(get_the_title())
                    )
                );

                wp_link_pages(
                    array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'lesptitnours'),
                        'after'  => '</div>',
                    )
                );
                ?>
            </div><!-- .entry-content -->
        </div> <!-- .row -->

        <footer class="entry-footer">
        </footer><!-- .entry-footer -->
    <?php
    else:
        get_template_part('template-parts/_popote-card');
    endif;
    ?>

</article><!-- #post-<?php the_ID(); ?> -->