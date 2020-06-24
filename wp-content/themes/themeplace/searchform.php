<?php 
	/**
	 * The template for displaying Search form.
	 *
	 *
	 * @link https://codex.wordpress.org/Template_Hierarchy
	 *
	 * @package themeplace
	 */
?>
	<div class="themeplace-search-form">
		<form id="search" action="<?php echo esc_url(home_url( '/' )); ?>" method="GET">
			<input type="text"  name="s"  placeholder="<?php echo esc_attr_x( 'Search Here', 'placeholder', 'themeplace-child' ); ?>" />
			<button type="submit"><span aria-hidden="true" class="icon_search"></span></button>
		</form>
	</div>