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
            the_title('<h1>', '</h1>');
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
            <div class="col-md-5">
                <?php
                // Thumbnail
                if (has_post_thumbnail()):
                    $thumbnail_id = get_post_thumbnail_id();
                    $image = wp_get_attachment_image(
                        $thumbnail_id,
                        'large',
                        false,
                        array(
                            'class' => 'img-fluid rounded',
                        )
                    );
                    echo $image;
                endif; ?>
            </div>

            <div class="col-md-7">
                <?php
                // TODO extract to a global function (ex: get_ingredients(): array) in the plugin
                $ingredients = get_post_meta($post->ID, 'popote_ingredients', true);

                if (!empty($ingredients) && count($ingredients)): ?>
                    <h2><?php echo __( 'Ingredients list', 'lesptitnours' ); ?></h2>
                    <ul class="list-group mb-4">
                        <?php foreach($ingredients as $ingredient): ?>
                        <li class="list-group-item fw-lighter fst-italic">
                            <span class="d-inline-block fw-bold me-3"><?php echo $ingredient['name']; ?></span>
                            <?php echo "{$ingredient['quantity']} {$ingredient['unit']}"; ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif;?>

                <?php
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
                        'before' => '<div>' . esc_html__('Pages:', 'lesptitnours'),
                        'after'  => '</div>',
                    )
                );
                ?>
            </div>

        </div>

        <footer class="entry-footer">
        </footer>
    <?php
    else:
        get_template_part('template-parts/_popote-card');
    endif;
    ?>

</article><!-- #post-<?php the_ID(); ?> -->