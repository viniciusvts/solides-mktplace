<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themeplace
 */

get_header();
?>
<section class="themeplace-page-section">
	<div class="container">
        <div class="row blog-post-list" >
			<div class="col-md-<?php if ( is_active_sidebar( 'sidebar' )){ echo '8';} else { echo '12'; } ?>">

			<?php 
			if ( have_posts() ) : while ( have_posts() ) : the_post(); 

					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

			<div class="text-center">
				<?php 
					the_posts_pagination( array(
				        'mid_size'  => 2,
				    	'prev_text' => '<span>&leftarrow;</span>',
				    	'next_text' => '<span>&rightarrow;</span>',
				    ) );
			    ?>
			</div>

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
