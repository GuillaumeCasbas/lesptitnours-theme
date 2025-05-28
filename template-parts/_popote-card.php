<?php

/**
 * Template part for displaying popotes cards
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LesPtitnours
 */
?>
<div class="card mb-4 box-shadow">
    <?php
    // Thumbnail
    if (has_post_thumbnail()):
        $thumbnail_id = get_post_thumbnail_id();
        $image = wp_get_attachment_image(
            $thumbnail_id,
            'large',
            false,
            array(
                'class' => 'img-fluid',
            )
        );
        echo $image;
    endif;
    ?>
    <div class="card-body">
        <strong class="d-inline-block mb-2 text-primary">
            <?php //the_category('', 'single'); ?>
        </strong>
        <?php the_title('<h2 class="entry-title mb-0"><a class="text-dark" href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
        <div class="mb-1 text-muted">DATE</div>
        <p class="">
            <?php the_excerpt() ?>
        </p>
    </div>
</div>