<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package themeplace
 */

global $themeplace_opt;

$themeplace_copyright_info = !empty($themeplace_opt['themeplace_copyright_info']) ? $themeplace_opt['themeplace_copyright_info'] : '';
$site_preloader = !empty($themeplace_opt['site_preloader']) ? $themeplace_opt['site_preloader'] : '';
$themeplace_header_full_width = !empty($themeplace_opt['themeplace_header_full_width']) ? $themeplace_opt['themeplace_header_full_width'] : '';
$themeplace_sticky_header = !empty($themeplace_opt['themeplace_sticky_header']) ? $themeplace_opt['themeplace_sticky_header'] : '';
$blog_breadcrumb_title = !empty($themeplace_opt['blog_breadcrumb_title']) ? $themeplace_opt['blog_breadcrumb_title'] : 'Latest Post';
$subheading = get_post_meta( get_the_ID(), 'subheading', true );
$themeplace_navbar_cart = !empty($themeplace_opt['themeplace_navbar_cart']) ? $themeplace_opt['themeplace_navbar_cart'] : '';
$custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'themeplace-child' ); ?></a>
	<?php if ( $site_preloader ): ?>
	<!-- preloader -->
	<div id="preloader">
	    <div class="preloader">
	        <span></span>
	        <span></span>
	    </div>
	</div>
	<!-- preloader end  -->
	<?php endif ?>

    <header class="menu-bar <?php if ( $themeplace_sticky_header == true ){ echo"fixed-top"; }?>">
        <div class="container<?php if ( $themeplace_header_full_width == true ){ echo"-fluid"; }?>">
	        <!--Mobile Navigation Toggler-->
	        <div class="mobile-nav-toggler"><span class="fa fa-bars"></span></div>

			<div class="row align-items-center">
				<div class="col-xl-2 col-lg-2">
					<?php if ( ! has_custom_logo() ) { ?>

						<a class="navbar-logo" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>

					<?php } else { ?>

						<a class="navbar-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img src="<?php echo esc_url( $image[0] ) ?>" class="custom-logo" alt="<?php bloginfo( 'name' ); ?>">
						</a>

					<?php } ?>
				</div>
				<div class="col-xl-<?php if ( true == $themeplace_navbar_cart ){ echo"9"; }else{ echo"10"; } ?> col-lg-10" >
					<!-- Main Menu -->
			        <div class="desktop-menu">
		        	<?php
		        		wp_nav_menu( array(
							'menu' 				=> 'primary',
							'theme_location'    => 'primary',
							'depth'             => 3,
							'container'         => 'ul',
							'menu_class'        => 'navigation'
						) );
					?>

					</div>
				</div>
				<?php if ( true == $themeplace_navbar_cart ): ?>
					<div class="col-xl-1 menu-cart-column">
						<?php themeplace_menu_cart(); ?>
					</div>
				<?php endif ?>				
			</div>
		</div>
        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <i class="close-btn fa fa-close"></i>
            <nav class="mobile-nav">
                <?php if ( ! has_custom_logo() ) { ?>

					<a class="navbar-logo" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>

				<?php } else { ?>

					<a class="navbar-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php echo esc_url( $image[0] ) ?>" class="custom-logo" alt="<?php bloginfo( 'name' ); ?>">
					</a>

				<?php } ?>
                
                <ul class="navigation"><!--Keep This Empty / Menu will come through Javascript--></ul>
                <?php themeplace_menu_cart(); ?>
            </nav>
        </div>
    </header>
	
	 <!-- !is_singular('download') && !is_page_template( 'custom-homepage.php'  -->
	<?php  if (!is_page_template( 'custom-homepage.php' ) ) { ?>

	<section class="breadcrumb-content">
        <div class="container">
        	<?php if ( is_tax( "download_category" ) || is_tax( "download_tag" ) || (is_search() && get_query_var( 'post_type' ) == "download" ) ): ?>

        	<div class="themeplace-product-search-form">
                <form method="GET" action="<?php echo home_url( '/' ); ?>">
                  <div class="themeplace-download-cat-filter">
                    <?php wp_dropdown_categories( array(
                      'show_option_all' => esc_html__('All Categories','themeplace-child'),
                      'orderby' => 'name',
                      'order' => 'ASC',
                      'echo' => 1,
                      'hide_empty' => 1,
                      'show_count' => 1,
                      'selected' => get_query_var( 'download_cat' ),
                      'name' => 'download_cat',
                      'hierarchical'  => 1,
                      'value_field' => 'name',
                      'class' => 'themeplace-download-cat-filter',
                      'taxonomy' => 'download_category'
                    ) ); ?>
                  </div>
                  <div class="themeplace-search-fields">
                    <input name="s" value="<?php echo (isset($_GET['s']))?$_GET['s']: null; ?>" type="text" placeholder="<?php echo esc_attr($settings['searchtext']); ?>">
                    <input type="hidden" name="post_type" value="download">
                    <span class="themeplace-search-btn"><input type="submit"></span>
                  </div>
                </form>
            </div>
        		
        	<?php else: ?>

            <div class="row">
                <div class="col-md-12">
                    <h1>
	                <?php
		              if(is_home() && is_front_page()){ echo esc_html( $blog_breadcrumb_title ); } else if(is_home()){ echo wp_title('', false); } else { echo wp_title('', false);
		              } ?>
		          	</h1>
		          	<?php if ( is_singular('download') ): ?>
		          		<?php if ($subheading): ?>
		          			<span class="sub-heading"><?php echo esc_html( $subheading ); ?></span>
		          		<?php endif ?>			          		
					<?php elseif ( isset( $_GET['author_items'] ) && $_GET['author_items'] == 'true' ): ?>
						<span><?php echo esc_html__( 'Authors Items', 'themeplace-child' ); ?></span>
					<?php else: ?>
		          		<?php themeplace_breadcrumb() ?>
		          	<?php endif ?>
                </div>
            </div>
        		
        	<?php endif ?>

        </div>
    </section>

    <?php } ?>