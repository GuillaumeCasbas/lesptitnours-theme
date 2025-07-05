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
    <header>
        <?php
        if (is_singular()) :
            the_title('<h1>', '</h1>');
        else :
            the_title('<h2><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;

        if ('ptitnours_popote' === get_post_type()):
        ?>
            <div>
                <?php
                lesptitnours_posted_on();
                ?>
            </div>
        <?php elseif ('post' === get_post_type()) :
        ?>
            <div>
                <?php
                lesptitnours_posted_on();
                lesptitnours_posted_by();
                ?>
            </div>
        <?php endif; ?>
    </header>

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
                        __('Continue reading<span> "%s"</span>', 'lesptitnours'),
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
                    'before' => '<div>' . esc_html__('Pages:', 'lesptitnours'),
                    'after'  => '</div>',
                )
            );
            ?>
        </div>
    </div>

    <footer class="entry-footer">
    </footer>
</article><!-- #post-<?php the_ID(); ?> -->