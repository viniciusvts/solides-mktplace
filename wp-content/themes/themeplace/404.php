<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package themeplace
 */

get_header();
?>
<section class="themeplace-page-section">
	<div class="container">
		<div class="row text-center">
			<div class="col-md-12 error-404">
				<h2><?php echo esc_html__( '404', 'themeplace-child' );; ?></h2>
				<h1 class="page-title"><?php echo esc_html__( 'Oops! That page can&rsquo;t be found.', 'themeplace-child' ); ?></h1>
				<p><?php echo esc_html__( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'themeplace-child' ); ?></p>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();
