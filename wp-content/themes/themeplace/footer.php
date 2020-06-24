<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package themeplace
 */


global $themeplace_opt;

$themeplace_copyright_info = !empty($themeplace_opt['themeplace_copyright_info']) ? $themeplace_opt['themeplace_copyright_info'] : '';

$footer_copyright_bar = isset($themeplace_opt['footer_copyright_bar']) ? $themeplace_opt['footer_copyright_bar'] : true;

$footer_widget_display = !empty($themeplace_opt['footer_widget_display']) ? $themeplace_opt['footer_widget_display'] : '';
?>

	<footer>
		<?php if ( is_active_sidebar( 'footer' ) ) {
			if ( true == $footer_widget_display ) { ?>
				<div class="site-footer">	
					<div class="container">
						<div class="row">
							<?php dynamic_sidebar('footer'); ?>
						</div>
					</div>
				</div>
		<?php }
		} ?>

		<?php
		if ( true == $footer_copyright_bar ): ?>
	    <div class="footer-copyright">
	    	<p>
	        	<?php
	        	if( $themeplace_copyright_info ) {
					echo wp_kses( $themeplace_copyright_info , array(
						'a'       => array(
							'href'    => array(),
							'title'   => array()
						),
						'br'      => array(),
						'em'      => array(),
						'strong'  => array(),
						'img'     => array(
							'src' => array(),
							'alt' => array()
						),
					));
					} else {
						esc_html_e('Copyright', 'themeplace-child'); ?> &copy; <?php echo date("Y").' '.get_bloginfo('name');  esc_html_e(' All Rights Reserved.', 'themeplace-child' );
					}
				?>
			</p>
	    </div>			
		<?php endif ?>

	</footer>

	<i id="backtotop" class="fa fa-fw fa-3x fa-arrow-circle-up"></i>
	
	<?php wp_footer(); ?>
	
	</body>
</html>