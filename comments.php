<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LesPtitnours
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="card">

	<?php
	if ( have_comments() ) :
		?>
		<h2>
			<?php
			$lesptitnours_comment_count = get_comments_number();
			if ( '1' === $lesptitnours_comment_count ) {
				printf(
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'lesptitnours' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf( 
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $lesptitnours_comment_count, 'comments title', 'lesptitnours' ) ),
					number_format_i18n( $lesptitnours_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2>

        <div class="card-body">

		    <?php the_comments_navigation(); ?>

            <ol>
                <?php
                wp_list_comments(
                    array(
                        'style'      => 'ol',
                        'short_ping' => true,
                    )
                );
                ?>
            </ol>


            <?php
            the_comments_navigation();

            // If comments are closed and there are comments, let's leave a little note, shall we?
            if ( ! comments_open() ) :
                ?>
                <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'lesptitnours' ); ?></p>
                <?php
            endif;
    endif; // Check for have_comments().
        ?>
        </div>

        <div class="card-body border-top">
            <?php comment_form();
        ?>
        </div>
</div>
