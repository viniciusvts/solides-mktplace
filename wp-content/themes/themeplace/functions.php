<?php

/**
 * themeplace functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package themeplace
 */

// Theme setup
if ( ! function_exists( 'themeplace_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function themeplace_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on themeplace, use a find and replace
		 * to change 'themeplace-child' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'themeplace-child', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'themeplace-child' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'themeplace_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

    add_image_size( 'themeplace-1280x720', 1280,720, true );
    add_image_size( 'themeplace-400x400', 400,400, true );
    add_image_size( 'themeplace-370x280', 370,280, true );
    add_image_size( 'themeplace-100x100', 100,100, true );
    add_image_size( 'themeplace-80x80', 80,80, true );
	}
endif;
add_action( 'after_setup_theme', 'themeplace_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function themeplace_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'themeplace_content_width', 640 );
}
add_action( 'after_setup_theme', 'themeplace_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function themeplace_widgets_init() {

  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar', 'themeplace-child' ),
    'id'            => 'sidebar',
    'description'   => esc_html__( 'Add widgets here.', 'themeplace-child' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name'          => esc_html__( 'EDD Archive Sidebar', 'themeplace-child' ),
    'id'            => 'edd-archive-sidebar',
    'description'   => esc_html__( 'Add widgets here.', 'themeplace-child' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name'          => esc_html__( 'Footer', 'themeplace-child' ),
    'id'            => 'footer',
    'description'   => esc_html__( 'Add widgets here.', 'themeplace-child' ),
    'before_widget' => '<div id="%1$s" class="footer-widget col-md-3 %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
}
add_action( 'widgets_init', 'themeplace_widgets_init' );

// Enqueue scripts and styles.
function themeplace_scripts() {
	// CSS
  wp_enqueue_style( 'themeplace-fonts', "//fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900", '', wp_get_theme()->get( 'Version' ), 'screen' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), wp_get_theme()->get( 'Version' ) );
  wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), wp_get_theme()->get( 'Version' ) );
  wp_enqueue_style( 'imagetooltip', get_template_directory_uri() . '/assets/css/imagetooltip.min.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.css', array(), wp_get_theme()->get( 'Version' ) );  
	wp_enqueue_style( 'themeplace-style', get_stylesheet_uri() );


	// JS
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );
	wp_enqueue_script( 'counter', get_template_directory_uri() . '/assets/js/counterup.min.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );
  wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/magnific-popup.min.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );
  wp_enqueue_script( 'imagetooltip', get_template_directory_uri() . '/assets/js/imagetooltip.min.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/js/waypoints.min.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/isotope.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );
  wp_enqueue_script( 'themeplace-ajax-login-signup', get_template_directory_uri() . '/assets/js/ajax-signin-signup.js', array( 'jquery' ), null, true );
  wp_localize_script( 'themeplace-ajax-login-signup', 'themeplaceajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), wp_get_theme()->get( 'Version' ), true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
  wp_enqueue_script( 'themeplace-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );
  $ajax_url =(function_exists('edd_get_ajax_url'))?edd_get_ajax_url():admin_url( 'admin-ajax.php' );
    wp_localize_script('themeplace-main','themeplace_menu_ajax',array('ajaxurl' => $ajax_url));
    
  wp_add_inline_style( 'themeplace-style', themeplace_inline_style());
}

add_action( 'wp_enqueue_scripts', 'themeplace_scripts' );

// Enqueue admin scripts and styles.
function themeplace_admin_scripts() {
  wp_enqueue_script( 'cmb2-conditional-logic', get_template_directory_uri() . '/assets/js/admin/cmb2-conditional-logic.min.js', array( 'jquery' ));
}
add_action( 'admin_enqueue_scripts', 'themeplace_admin_scripts' );

// Enqueue footer scripts and styles.
function themeplace_footer_scripts() {
  if ( wp_style_is( 'wp-mediaelement', 'enqueued' ) ) {
    wp_enqueue_style( 'themeplace-player', get_template_directory_uri() . '/assets/css/themeplace-player.css', array( 'wp-mediaelement', ), '1.0' );
  }
}

add_action( 'wp_footer', 'themeplace_footer_scripts' );

// Excerpt length
function themeplace_excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);

      if (count($excerpt) >= $limit) {
          array_pop($excerpt);
          $excerpt = implode(" ", $excerpt) . ' ...';
      } else {
          $excerpt = implode(" ", $excerpt);
      }

      $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

      return $excerpt;
}

//Comment Field to Bottom
function themeplace_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'themeplace_comment_field_to_bottom' );


// Archive count on rightside
function themeplace_archive_count_on_rightside($links) {
    $links = str_replace('</a>&nbsp;(', '</a> <span class="pull-right">(', $links);
    $links = str_replace(')', ')</span>', $links);
    return $links;
}

add_filter('get_archives_link', 'themeplace_archive_count_on_rightside');

// Category count on rightside
function themeplace_category_count_on_rightside($links) {
  $links = str_replace('</a> (', '</a> <span class="pull-right">(', $links);
  $links = str_replace(')', ')</span>', $links);
  return $links;
}
add_filter('wp_list_categories', 'themeplace_category_count_on_rightside');

// required plugins
function themeplace_register_required_plugins() {
  
  $plugins = array(

    array(
      'name'      => 'Elementor Page Builder',
      'slug'      => 'elementor',
      'required'  => true,
    ),

    array(
      'name'      => 'ThemePlace Core',
      'slug'      => 'themeplace-core',
      'source'    => 'http://themeplace.codecorns.com/plugins/themeplace-core.zip',
      'required'  => true,
    ),

    array(
      'name'      => 'Redux Framework',
      'slug'      => 'redux-framework',
      'required'  => true,
    ),

    array(
      'name'      => 'CMB2',
      'slug'      => 'cmb2',
      'required'  => true,
    ),
    
    array(
      'name'      => 'Easy Digital Downloads',
      'slug'      => 'easy-digital-downloads',
      'required'  => true,
    ),

    array(
      'name'      => 'Mailchimp',
      'slug'      => 'mailchimp-for-wp',
      'required'  => true,
    ),

    array(
      'name'      => 'bbPress',
      'slug'      => 'bbpress',
      'required'  => true,
    ),
    
    array(
      'name'      => 'Contact Form 7',
      'slug'      => 'contact-form-7',
      'required'  => true,
    ),

    array(
      'name'      => 'One Click Demo Import',
      'slug'      => 'one-click-demo-import',
      'required'  => true,
    )
  );

  
  $config = array(
    'id'           => 'tgmpa',                 
    'default_path' => '',                      
    'menu'         => 'tgmpa-install-plugins', 
    'parent_slug'  => 'themes.php',            
    'capability'   => 'edit_theme_options',
    'has_notices'  => true,                    
    'dismissable'  => true,                    
    'dismiss_msg'  => '',     
    'is_automatic' => false, 
    'message'      => '',
  );

  tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'themeplace_register_required_plugins' );

// Custom Meta Box
function themeplace_register_download_metafields() {
  $prefix = 'themeplace-child';

  $download = new_cmb2_box( array(
    'id'            => $prefix . 'metabox',
    'title'         => esc_html__( 'Download Options', 'themeplace-child' ),
    'object_types'  => array( 'download')
  ) );

  $download->add_field( array(
    'name'       => esc_html__( 'Product Type', 'themeplace-child' ),
    'desc'       => esc_html__( 'Select product type', 'themeplace-child' ),
    'id'         => 'type',
    'type'       => 'select',
    'default'    => 'theme',
    'options'    => array(
      'theme'    => __( 'Theme and Template', 'themeplace-child' ),
      'psd'      => __( 'PSD Template', 'themeplace-child' ),
      'plugin'   => __( 'Plugin', 'themeplace-child' ),
      'video'    => __( 'Video', 'themeplace-child' ),
      'audio'    => __( 'Audio', 'themeplace-child' ),
      'graphics' => __( 'Graphics', 'themeplace-child' ),
      'photo'    => __( 'Photo', 'themeplace-child' )
    ),
  ));

  $download->add_field( array(
    'name' => esc_html__( 'Video', 'themeplace-child' ),
    'desc' => esc_html__( 'Upload a video mp4 preview for video product', 'themeplace-child' ),
    'id'   => 'video',
    'type' => 'file',
    'preview_size' => 'large',
    'attributes' => array(
      'required'            => true,
      'data-conditional-id'     => 'type',
      'data-conditional-value'  => 'video',
    ),
  ) );

  $download->add_field( array(
    'name' => esc_html__( 'Audio', 'themeplace-child' ),
    'desc' => esc_html__( 'Upload an audio sample mp3 for audio product', 'themeplace-child' ),
    'id'   => 'audio',
    'type' => 'file',
    'preview_size' => 'large',
    'attributes' => array(
      'required'            => true,
      'data-conditional-id'     => 'type',
      'data-conditional-value'  => 'audio',
    ),
  ) );

  $download->add_field( array(
    'name' => esc_html__( 'Preview Images', 'themeplace-child' ),
    'desc' => esc_html__( 'Upload demo images of PSD template', 'themeplace-child' ),
    'id'   => 'psd',
    'type' => 'file_list',
    'text' => array(
      'add_upload_files_text' => 'Upload Images', // default: "Add or Upload Files"
      'file_text' => 'Image',
    ),
    'attributes' => array(
      'required'            => true,
      'data-conditional-id'     => 'type',
      'data-conditional-value'  => 'psd',
    ),
  ) );

  $download->add_field( array(
    'name'       => esc_html__( 'Product Thumbnail', 'themeplace-child' ),
    'desc'       => esc_html__( 'Product thumbnail to show in different sections ( 80x80 )', 'themeplace-child' ),
    'id'         => 'product_item_thumbnail',
    'type'       => 'file',
    'preview_size' => array( 80, 80 ),
    'options'    =>array(
      'url'     =>false,
      )
  ) );

  $download->add_field( array(
    'name'       => esc_html__( 'Preview Url', 'themeplace-child' ),
    'desc'       => esc_html__( 'Preview Url to show in single download page', 'themeplace-child' ),
    'id'         => 'preview_url',
    'type'       => 'text',
    'attributes' => array(
      'data-conditional-id'     => 'type',
      'data-conditional-value'  => wp_json_encode( array( 'theme', 'plugin' ) ),
    ),
  ));

  $download->add_field( array(
    'name'       => esc_html__( 'Affiliate URL', 'themeplace-child' ),
    'desc'       => esc_html__( 'When you set affiliate link. add to cart or buy button will be disappear', 'themeplace-child' ),
    'id'         => 'affiliate_url',
    'type'       => 'text',
  ));

  $download->add_field( array(
    'name'       => esc_html__( 'Sub Heading', 'themeplace-child' ),
    'desc'       => esc_html__( 'Sub Heading for the item', 'themeplace-child' ),
    'id'         => 'subheading',
    'type'       => 'text',
  ) );

  $download->add_field( array(
    'name'       => esc_html__( 'Download Tag', 'themeplace-child' ),
    'id'         => 'download_tag',
    'type'       => 'radio',
    'options'    => array(
      'Sale' => 'Sale',
      'Featured' => 'Featured',
      'New' => 'New',
      'Pro' => 'Pro',
      'Free' => 'Free'
    )
  ) );

  $download->add_field( array(
    'name'       => esc_html__( 'Version', 'themeplace-child' ),
    'desc'       => esc_html__( 'Version of the item', 'themeplace-child' ),
    'id'         => 'version',
    'type'       => 'text',
  ) );

  $download->add_field( array(
    'name' => esc_html__( 'File Size', 'themeplace-child' ),
    'desc' => esc_html__( 'Size of source. E.g. 150KB, 50.5KB, 12.5MB, 5MB, 1GB, 2.1GB.', 'themeplace-child' ),
    'id'   => 'file_size',
    'type' => 'text',
  ) );

  $download->add_field( array(
    'name'       => esc_html__( 'Documentation', 'themeplace-child' ),
    'id'         => 'documentation',
    'type'       => 'radio',
    'options'    => array(
      'Yes' => 'Yes',
      'No' => 'No'
    )
  ) );

  $features_group = $download->add_field( array(
    'id'          => 'themeplace_features_group',
    'type'        => 'group',
    'description' => esc_html__( 'Generates reusable custom features', 'themeplace-child' ),
    'options'     => array(
      'group_title'       => esc_html__( 'Features {#}', 'themeplace-child' ),
      'add_button'        => esc_html__( 'Add Another Features', 'themeplace-child' ),
      'remove_button'     => esc_html__( 'Remove Features', 'themeplace-child' ),
      'sortable'          => true,
      'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'themeplace-child' )
    ),
  ) );

  $download->add_group_field( $features_group, array(
    'name' => esc_html__( 'Feature Name', 'themeplace-child' ),
    'id'   => 'themeplace_feature_name',
    'type' => 'text'
  ) );

  $download->add_group_field( $features_group, array(
    'name' => esc_html__( 'Feature List', 'themeplace-child' ),
    'id'   => 'themeplace_feature_list',
    'type' => 'text',
    'repeatable' => true
  ) );

  $support = $download->add_field( array(
      'id'          => 'support',
      'type'        => 'group',
      'description' => esc_html__( 'Generates reusable form entries', 'themeplace-child' ),
      'options'     => array(
      'group_title'   => esc_html__( 'Support {#}', 'themeplace-child' ),
      'add_button'    => esc_html__( 'Add Another Support', 'themeplace-child' ),
      'remove_button' => esc_html__( 'Remove Support', 'themeplace-child' ),
      'sortable'      => true,
    ),
  ) );

  $download->add_group_field( $support, array(
    'name' => esc_html__( 'Support Title', 'themeplace-child' ),
    'id'   => 'themeplace_support_title',
    'type' => 'text'
  ) );

  $download->add_group_field( $support, array(
    'name'       => esc_html__( 'Support Include', 'themeplace-child' ),
    'id'         => 'support_include',
    'type'       => 'radio',
    'options'    => array(
      'Yes' => 'Yes',
      'No' => 'No'
    )
  ) );

  $download->add_group_field( $support, array(
    'name' => esc_html__( 'Support List', 'themeplace-child' ),
    'id'   => 'support_list',
    'type' => 'text',
    'repeatable' => true
  ) );

  $item_faq = $download->add_field( array(
      'id'          => 'item_faq',
      'type'        => 'group',
      'description' => esc_html__( 'Generates reusable form entries', 'themeplace-child' ),
      'options'     => array(
      'group_title'   => esc_html__( 'FAQs {#}', 'themeplace-child' ),
      'add_button'    => esc_html__( 'Add Another FAQ', 'themeplace-child' ),
      'remove_button' => esc_html__( 'Remove FAQ', 'themeplace-child' ),
      'sortable'      => true,
    ),
  ) );

  $download->add_group_field( $item_faq, array(
    'name' => esc_html__( 'FAQ Title', 'themeplace-child' ),
    'id'   => 'themeplace_faq_title',
    'type' => 'text',
  ) );

  $download->add_group_field( $item_faq, array(
    'name' => esc_html__( 'FAQ Description', 'themeplace-child' ),
    'id'   => 'themeplace_faq_description',
    'type' => 'textarea'
  ) );

}

add_action( 'cmb2_admin_init', 'themeplace_register_download_metafields' );

// Outputting a cmb2 file_list
function themeplace_cmb2_output_file_list( $file_list_meta_key ) {
  // Get the list of files
  $files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );
  // Loop through them and output an image
  foreach ( (array) $files as $attachment_id => $attachment_url ) {?>
    <a href="<?php echo wp_get_attachment_image_src( $attachment_id, 'full' )[0]; ?>">
    <img src="<?php echo wp_get_attachment_image_src( $attachment_id, 'themeplace-80x80' )[0]; ?>"></a>
<?php }
}

// themeplace Theme Functions - Check EDD exists. Checking if EDD is installed.
function themeplace_check_edd_exists() {
 if( class_exists( 'Easy_Digital_Downloads' ) ) {
  return true;
}
return false;
}

// Add User Social Links
function themeplace_add_user_social_links( $user_contact ) {

    /* Add user contact methods */
    $user_contact['twitter']   = esc_html__('Twitter Link', 'themeplace-child');
    $user_contact['facebook']  = esc_html__('Facebook Link', 'themeplace-child');
    $user_contact['linkedin']  = esc_html__('LinkedIn Link', 'themeplace-child');
    $user_contact['github']    = esc_html__('Github Link', 'themeplace-child');
    $user_contact['instagram'] = esc_html__('Instagram Link', 'themeplace-child');
    $user_contact['dribbble']  = esc_html__('Dribbble Link', 'themeplace-child');
    $user_contact['behance']   = esc_html__('Behance Link', 'themeplace-child');
    $user_contact['skype']     = esc_html__('Skype Link', 'themeplace-child');

    return $user_contact;
}
add_filter('user_contactmethods', 'themeplace_add_user_social_links');

function themeplace_get_user_social_links() {
    $return  = '<ul class="list-inline">';
    if(!empty(get_the_author_meta('twitter'))) {
        $return .= '<li class="list-inline-item"><a href="'.get_the_author_meta('twitter').'" title="Twitter" target="_blank" id="twitter"><i class="fa fa-twitter"></i></a></li>';
    }
    if(!empty(get_the_author_meta('facebook'))) {
        $return .= '<li class="list-inline-item"><a href="'.get_the_author_meta('facebook').'" title="Facebook" target="_blank" id="facebook"><i class="fa fa-facebook"></i></a></li>';
    }
    if(!empty(get_the_author_meta('linkedin'))) {
        $return .= '<li class="list-inline-item"><a href="'.get_the_author_meta('linkedin').'" title="LinkedIn" target="_blank" id="linkedin"><i class="fa fa-linkedin"></i></a></li>';
    }
    if(!empty(get_the_author_meta('github'))) {
        $return .= '<li class="list-inline-item"><a href="'.get_the_author_meta('github').'" title="Github" target="_blank" id="github"><i class="fa fa-github"></i></a></li>';
    }
    if(!empty(get_the_author_meta('instagram'))) {
        $return .= '<li class="list-inline-item"><a href="'.get_the_author_meta('instagram').'" title="Instagram" target="_blank" id="instagram"><i class="fa fa-instagram"></i></a></li>';
    }
    if(!empty(get_the_author_meta('dribbble'))) {
        $return .= '<li class="list-inline-item"><a href="'.get_the_author_meta('dribbble').'" title="Dribbble" target="_blank" id="dribbble"><i class="fa fa-dribbble"></i></a></li>';
    }
    if(!empty(get_the_author_meta('behance'))) {
        $return .= '<li class="list-inline-item"><a href="'.get_the_author_meta('behance').'" title="Behance" target="_blank" id="behance"><i class="fa fa-behance"></i></a></li>';
    }
    if(!empty(get_the_author_meta('skype'))) {
        $return .= '<li class="list-inline-item"><a href="'.get_the_author_meta('skype').'" title="Skype" target="_blank" id="skype"><i class="fa fa-skype"></i></a></li>';
    }
    $return .= '</ul>';

    return $return;
}


// One click demo import
function themeplace_import_files() {
  return array(
    array(
      'import_file_name'  => 'themeplace Demo Import',
      'local_import_file' => trailingslashit( get_template_directory() ) . 'inc/demo/content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/customizer.dat',
      'local_import_redux'           => array(
        array(
          'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/redux.json',
          'option_name' => 'themeplace_opt',
        ),
      ),
    )
  );
}

add_filter( 'pt-ocdi/import_files', 'themeplace_import_files' );

// Default Home and Blog Setup
function themeplace_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Primary', 'primary' );

    set_theme_mod( 'nav_menu_locations', array(
            'main_menu' => $main_menu->term_id,
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'themeplace_after_import_setup' );

// Edd total count
function themeplace_edd_count_total($val) {
    global $edd_logs;
    return $edd_logs->get_log_count( null, $val );
}

// Product star rating
function themeplace_edd_rating() {
    global $wp_query;
    $postID = $wp_query->post->ID;
    $starRating=null;
    if(function_exists("fw_ext_feedback_stars_get_post_rating")){
        $starRating=fw_ext_feedback_stars_get_post_rating($postID);
        $starRating=$starRating['average'];
        $starRating=(round($starRating*2))*10;
    }
    else{
        if( class_exists( 'EDD_Reviews' ) ) {
            $starRating = edd_reviews()->average_rating(false);
            $starRating=(round($starRating*2))*10;
        }
    } ?>
  <div title="<?php echo esc_attr($starRating/20);?> <?php esc_html_e("out of 5","themeplace");?>" class="themeplace-star-rating">
      <div class="rating">
          <i class="fa fa-star" data-vote="1"></i>
          <i class="fa fa-star" data-vote="2"></i>
          <i class="fa fa-star" data-vote="3"></i>
          <i class="fa fa-star" data-vote="4"></i>
          <i class="fa fa-star" data-vote="5"></i>
      </div>
      <div class="rated" style="width:<?php echo esc_html($starRating);?>%">
          <i class="fa fa-star" data-vote="1"></i>
          <i class="fa fa-star" data-vote="2"></i>
          <i class="fa fa-star" data-vote="3"></i>
          <i class="fa fa-star" data-vote="4"></i>
          <i class="fa fa-star" data-vote="5"></i>
      </div>
  </div>
<?php
}

// EDD comments supports
function themeplace_edd_download_supports( $supports ) {
 
  // add support for comments
  $supports[] = 'comments';
 
  // pass it back to EDD
  return $supports; 
 
}
add_filter('edd_download_supports', 'themeplace_edd_download_supports');

function themeplace_comment_badges( $return, $author, $comment_ID ) {

  // make sure we only proceed if we are in the comments listing on a download page
  if ( ! is_singular( 'download' ) || ! in_the_loop() || ! is_main_query() ) {
    return $return;
  }

  // get product/download ID
  $download_id = get_the_ID();

  // get comment author  ID
  $comment = get_comment( $comment_ID );
  $commenter_id = $comment->user_id;

  // if the comment was made by a guest return original
  if ( $commenter_id == 0 ) {
    return $return;
  }

  // should we display a purchased badge
  $display_purchased_badge = false;
  if ( function_exists( 'edd_has_user_purchased' ) && edd_has_user_purchased( $commenter_id, $download_id ) ) {
    $display_purchased_badge = true;
  } 

  // append the badge HTML
  if ( $display_purchased_badge ) {
    $return .= '<span class="badge-purchased">'.esc_html( 'purchased','themeplace-child' ).'</span>';
  }

  // should we display author badge
  $display_author_badge = false;
  if ( $commenter_id == get_the_author_meta( 'ID' ) ) {
    $display_author_badge = true;
  }

  // append the badge HTML
  if ( $display_author_badge ) {
    $return .= '<span class="badge-author">'.esc_html( 'author','themeplace-child' ).'</span>';
  }

  // pass it back to WordPress
  return $return;

} 

add_filter( 'get_comment_author_link', 'themeplace_comment_badges', 10, 3 );

// Disable update notification for edd-reviews
function themeplace_filter_plugin_updates( $value ) {

    if($value) {
      unset( $value->response['edd-reviews/edd-reviews.php'] );
      unset( $value->response['edd-fes/edd-fes.php'] );
      unset( $value->response['edd-message/edd-message.php'] );
      unset( $value->response['edd-commissions/edd-commissions.php'] );
    }
    return $value;
}
add_filter( 'site_transient_update_plugins', 'themeplace_filter_plugin_updates' );



// Automatically add a Login link and cart widget to Primary Menu.
function themeplace_login_link_to_menu ( $items, $args ) {

    global $themeplace_opt;

    $themeplace_navbar_login_signup = !empty($themeplace_opt['themeplace_navbar_login_signup']) ? $themeplace_opt['themeplace_navbar_login_signup'] : '';

    if ( $args->theme_location == 'primary' ) {
      // Login/Signup
      if ( true == $themeplace_navbar_login_signup ) {      
        if( ! is_user_logged_in() ) {
        $items .= '<li class="menu-item menu-login-url"><a href="#themeplace-login">'.__( 'Login', 'themeplace-child' ).'</a></li>';
        } else {
          $items .= '<li class="menu-item menu-logout-url"><a href="'.wp_logout_url(home_url()).'">'.__( 'Logout', 'themeplace-child' ).'</a></li>';
        }
      }
    }
  
    return $items;
}
add_filter( 'wp_nav_menu_items', 'themeplace_login_link_to_menu', 10, 2 );


// Ajax Login
function themeplace_login_member(){

      // Get variables
    $user_login   = $_POST['themeplace_user_login'];  
    $user_pass    = $_POST['themeplace_user_pass'];


    // Check CSRF token
    if( !check_ajax_referer( 'ajax-login-nonce', 'login-security', false) ){
      echo json_encode(array('error' => true, 'message'=> '<div class="alert alert-danger">'.__('Session token has expired, please reload the page and try again', 'themeplace-child').'</div>'));
    }
    
    // Check if input variables are empty
    elseif( empty($user_login) || empty($user_pass) ){
      echo json_encode(array('error' => true, 'message'=> '<div class="alert alert-danger">'.__('Please fill all form fields', 'themeplace-child').'</div>'));
    } else { // Now we can insert this account

      $user = wp_signon( array('user_login' => $user_login, 'user_password' => $user_pass), false );

        if( is_wp_error($user) ){
        echo json_encode(array('error' => true, 'message'=> '<div class="alert alert-danger">'.$user->get_error_message().'</div>'));
      } else{
        echo json_encode(array('error' => false, 'message'=> '<div class="alert alert-success">'.__('Login successful, reloading page...', 'themeplace-child').'</div>'));
      }
    }

    die();
}
add_action('wp_ajax_nopriv_themeplace_login_member', 'themeplace_login_member');

// Ajax Signup
function themeplace_register_member(){

      // Get variables
    $user_login = $_POST['themeplace_user_login'];  
    $user_email = $_POST['themeplace_user_email'];
    
    // Check CSRF token
    if( !check_ajax_referer( 'ajax-login-nonce', 'register-security', false) ){
      echo json_encode(array('error' => true, 'message'=> '<div class="alert alert-danger">'.__('Session token has expired, please reload the page and try again', 'themeplace-child').'</div>'));
      die();
    }
    
    // Check if input variables are empty
    elseif( empty($user_login) || empty($user_email) ){
      echo json_encode(array('error' => true, 'message'=> '<div class="alert alert-danger">'.__('Please fill all form fields', 'themeplace-child').'</div>'));
      die();
    }
    
    $errors = register_new_user($user_login, $user_email);  
    
    if( is_wp_error($errors) ){

      $registration_error_messages = $errors->errors;

      $display_errors = '<div class="alert alert-danger">';
      
        foreach($registration_error_messages as $error){
          $display_errors .= '<p>'.$error[0].'</p>';
        }

      $display_errors .= '</div>';

      echo json_encode(array('error' => true, 'message' => $display_errors));

    } else {
      echo json_encode(array('error' => false, 'message' => '<div class="alert alert-success">'.__( 'Registration complete. Please check your e-mail.', 'themeplace-child').'</p>'));
    }
   

    die();
}

add_action('wp_ajax_nopriv_themeplace_register_member', 'themeplace_register_member');

// Bootstrap 4 modal to footer
function themeplace_login_register_modal() {
    // only show the registration/login form to non-logged-in members
  if( ! is_user_logged_in() ){

    global $themeplace_opt;

    $themeplace_navbar_login_redirect = !empty($themeplace_opt['themeplace_navbar_login_redirect']) ? $themeplace_opt['themeplace_navbar_login_redirect'] : home_url( '/' ); ?>

    <div class="modal fade themeplace-user-modal" id="themeplace-user-modal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" data-active-tab="">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php

              if( get_option('users_can_register') ){ ?>

                <!-- Register form -->
                <div class="themeplace-register">
               
                  <h4><?php printf( __('Join %s', 'themeplace-child'), get_bloginfo('name') ); ?></h4>
                  <hr>

                  <form id="themeplace_registration_form" action="<?php echo home_url( '/' ); ?>" method="POST">

                    <div class="form-field">
                      <label><?php _e('Username', 'themeplace-child'); ?></label>
                      <input class="form-control required" name="themeplace_user_login" type="text"/>
                    </div>
                    <div class="form-field">
                      <label for="themeplace_user_email"><?php _e('Email', 'themeplace-child'); ?></label>
                      <input class="form-control required" name="themeplace_user_email" id="themeplace_user_email" type="email"/>
                    </div>

                    <div class="form-field">
                      <input type="hidden" name="action" value="themeplace_register_member"/>
                      <button class="themeplace-btn" data-loading-text="<?php _e('Loading...', 'themeplace-child') ?>" type="submit"><?php _e('Sign up', 'themeplace-child'); ?></button>
                    </div>
                    <?php wp_nonce_field( 'ajax-login-nonce', 'register-security' ); ?>
                  </form>
                  <div class="themeplace-errors"></div>
                </div>

                <!-- Login form -->
                <div class="themeplace-login" data-redirect="<?php echo esc_url( $themeplace_navbar_login_redirect ) ?>">
               
                  <h4><?php printf( __('Login to %s', 'themeplace-child'), get_bloginfo('name') ); ?></h4>
                  <hr>
               
                  <form id="themeplace_login_form" action="<?php echo home_url( '/' ); ?>" method="post">

                    <div class="form-field">
                      <label><?php _e('Username', 'themeplace-child') ?></label>
                      <input class="form-control required" name="themeplace_user_login" type="text"/>
                    </div>
                    <div class="form-field">
                      <label for="themeplace_user_pass"><?php _e('Password', 'themeplace-child')?></label>
                      <input class="form-control required" name="themeplace_user_pass" id="themeplace_user_pass" type="password"/>
                    </div>
                    <div class="form-field">
                      <input type="hidden" name="action" value="themeplace_login_member"/>
                      <button class="themeplace-btn" data-loading-text="<?php _e('Loading...', 'themeplace-child') ?>" type="submit"><?php _e('Login', 'themeplace-child'); ?></button> <a class="alignright" href="<?php echo wp_lostpassword_url(); ?>"><?php _e('Lost Password?', 'themeplace-child') ?></a>
                    </div>
                    <?php wp_nonce_field( 'ajax-login-nonce', 'login-security' ); ?>
                  </form>
                  <div class="themeplace-errors"></div>
                </div>

                <div class="themeplace-loading">
                  <p><i class="fa fa-refresh fa-spin"></i><br><?php _e('Loading...', 'themeplace-child') ?></p>
                </div><?php

              } else {
                echo '<h4>'.__('Login access is disabled', 'themeplace-child').'</h4>';
              } ?>
          </div>
          <div class="modal-footer">
              <span class="themeplace-register-footer"><?php _e('Don\'t have an account?', 'themeplace-child'); ?> <a href="#themeplace-register"><?php _e('Sign Up', 'themeplace-child'); ?></a></span>
              <span class="themeplace-login-footer"><?php _e('Already have an account?', 'themeplace-child'); ?> <a href="#themeplace-login"><?php _e('Login', 'themeplace-child'); ?></a></span>
          </div>        
        </div>
      </div>
    </div>
<?php }
}
add_action('wp_footer', 'themeplace_login_register_modal');

// Menu cart ajax action.
if( ! function_exists( 'themeplace_menu_ajax' ) ){
  function themeplace_menu_ajax(){
    if(isset($_GET['cart_count']) && ($_GET['cart_count']==1) ){
      echo edd_get_cart_quantity();
    }
    else{
      themeplace_menu_cart();
    }
    die();
  }
}

add_action( 'wp_ajax_themeplace_menu_ajax',  'themeplace_menu_ajax' );
add_action( 'wp_ajax_nopriv_themeplace_menu_ajax','themeplace_menu_ajax');

// Displays the cart in menu
function themeplace_menu_cart(){ 
	if( !themeplace_check_edd_exists() ){ return; } ?>
    <div class="menu-cart">
      <a href="#"><i class="fa fa-cart-plus"></i><?php echo edd_get_cart_quantity(); ?></a>

      <div class="menu-cart-widget">
        <ul class="menu-cart-product-list">
          <?php $cartContents=edd_get_cart_contents();                    
          if( $cartContents ){
            foreach ($cartContents as $cartContentsKey => $cartContentsValue) { ?>
              <li class="menu-cart-product-item">
                <a href="<?php echo esc_url( get_permalink( $cartContentsValue['id'] ) ) ?>">
                  <?php if ( get_post_meta( $cartContentsValue['id'], 'product_item_thumbnail', 1 ) ){ ?>
                    <img src="<?php echo esc_url( get_post_meta( $cartContentsValue['id'], 'product_item_thumbnail', 1 ) ) ?>" alt="<?php echo esc_attr( get_post( $cartContentsValue['id'] )->post_title ) ?>">
                  <?php } else {
                    the_post_thumbnail( 'themeplace-80x80' );
                  } ?>
                  <p><?php echo esc_html( get_post( $cartContentsValue['id'] )->post_title ); ?></p>
                  <span class="quantity">
                    <?php echo esc_html($cartContentsValue['quantity']).__( ' x ' , 'themeplace-child' ) ?>
                    <span class="amount">
                        <?php echo edd_currency_filter( edd_format_amount( edd_get_download_price( $cartContentsValue['id'] ) ) ); ?>
                    </span>
                  </span>
                </a>
                <a href="<?php echo esc_url( wp_nonce_url( edd_remove_item_url( $cartContentsKey ), 'edd-remove-from-cart-'.$cartContentsKey, 'edd_remove_from_cart_nonce' ) )?>">
                  <i class="fa fa-times-circle-o" aria-hidden="true"></i>
                </a>
              </li>
          <?php } ?>
              <li class="menu-cart-total">
                <h5><strong><?php echo esc_html__( 'Total: ','themeplace-child' )?> </strong> <?php echo edd_currency_filter( edd_format_amount( edd_get_cart_total() ) ) ?></h5>
                    <a href="<?php echo edd_get_checkout_uri() ?>"><?php echo esc_html__( 'Checkout','themeplace-child' )?></a>
              </li>
        </ul>          
      <?php } else { ?>
        <li class="menu-empty-cart">
            <i class="fa fa-shopping-cart"></i>
            <h5><?php echo esc_html__('Your cart is empty!','themeplace-child') ?></h5>
        </li>
      <?php } ?>

    </div>
  </div>
    <?php
}

// Files included
require_once get_template_directory() . '/inc/theme-option.php';
require_once get_template_directory() . '/inc/template-functions.php';
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/inc/inline-script.php';
require_once get_template_directory() . '/inc/breadcrumbs.php';
require_once get_template_directory() . '/inc/customizer.php';
