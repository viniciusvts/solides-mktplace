<?php 
/**
 * Template Name: Custom Page Full Width
 */

get_header(); ?>
<section class="themeplace-page-section">
	<div class="container">
		<?php while ( have_posts() ) : the_post();
			the_content();
		endwhile; ?>
	</div>
</section>
<?php
get_footer();