<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themeplace
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

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<?php if (!is_singular('download')): ?>
			<h4 class="comments-title">
				<?php
				$themeplace_comment_count = get_comments_number();
				if ( '1' === $themeplace_comment_count ) {
					printf(
						esc_html__( 'One comment on &ldquo;%1$s&rdquo;', 'themeplace-child' ),
						'<span>' . get_the_title() . '</span>'
					);
				} else {
					printf(
						esc_html( _nx( '%1$s comments', '%1$s comments', $themeplace_comment_count, 'comments title', 'themeplace-child' ) ),
						number_format_i18n( $themeplace_comment_count ),
						'<span>' . get_the_title() . '</span>'
					);
				}
				?>
			</h4><!-- .comments-title -->
		<?php endif ?>


		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
				'avatar_size' => 80,
			) );
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'themeplace-child' ); ?></p>
			<?php
		endif;
	endif; // Check for have_comments().
	comment_form( array(
	  'id_form'           => 'commentform',
	  'class_form'        => 'comment-form',
	  'submit_button' 	  => '<button class="%3$s themeplace-button" type="submit">%4$s</button>',
	  'label_submit'      => esc_html__( 'Submit','themeplace-child' ),
	  'format'            => 'html5',
	  'comment_notes_before' => false,
	  'comment_field' =>  '<textarea id="comment" name="comment" placeholder="'. esc_attr__( 'Comment' ,'themeplace-child' ) .'" aria-required="true">' .
	    '</textarea>',
	  'fields' => apply_filters( 'comment_form_default_fields', array(
		  'author' =>
		    '<div class="row"><div class="col-sm-6"><input id="author" name="author" type="text" placeholder="'. esc_attr__( 'Name' ,'themeplace-child' ) .'" value="' . esc_attr( $commenter['comment_author'] ) .
		    '" aria-required="true" /></div>',
		  'email' =>
		    '<div class="col-sm-6"><input id="email" name="email" type="text" placeholder="'. esc_attr__( 'Email' ,'themeplace-child' ) .'" value="' . esc_attr(  $commenter['comment_author_email'] ) .
		    '" aria-required="true" /></div></div>',
			)
		),
	));
	?>

</div><!-- #comments -->