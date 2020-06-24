<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themeplace
 */

get_header();
?>
<section class="themeplace-page-section">
	<div class="container">
        <div class="row">
			<div class="space-bottom col-md-<?php if ( is_active_sidebar( 'sidebar' )){ echo '8';} else { echo '12'; } ?>">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

	        </div>
	        <?php if (is_active_sidebar( 'sidebar' )): ?>
	            <div class="col-md-4">
	                <?php get_sidebar(); ?>
	            </div>
	        <?php endif ?>
	    </div>
	</div>
</section>
<?php get_footer();
