<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// blog
class themeplace_Widget_Blog extends Widget_Base {
 
   public function get_name() {
      return 'blog';
   }
 
   public function get_title() {
      return esc_html__( 'Latest Blog', 'themeplace' );
   }
 
   public function get_icon() { 
        return 'eicon-posts-carousel';
   }
 
   public function get_categories() {
      return [ 'themeplace-elements' ];
   }
   protected function _register_controls() {
      $this->start_controls_section(
         'blog_section',
         [
            'label' => esc_html__( 'Blog', 'themeplace' ),
            'type' => Controls_Manager::SECTION,
         ]
      );
      $this->add_control(
         'order',
         [
            'label' => __( 'Order', 'themeplace' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'ASC',
            'options' => [
               'ASC'  => __( 'Ascending', 'themeplace' ),
               'DESC' => __( 'Descending', 'themeplace' )
            ],
         ]
      );
      $this->end_controls_section();
   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <div class="container">
         <div class="row justify-content-center">
               <?php
               $blog = new \WP_Query( array( 
                  'post_type' => 'post',
                  'posts_per_page' => 3,
                  'ignore_sticky_posts' => true,
                  'order' => $settings['order'],
               ));
               /* Start the Loop */
               while ( $blog->have_posts() ) : $blog->the_post(); ?>
               <!-- blog -->
               <div class="col-lg-4 col-sm-6">
                  <div class="blog-item">
                     <div class="blog-item-img">
                        <?php if ( has_post_thumbnail() ): ?>
                           <a href="<?php the_permalink(); ?>">
                              <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(),'themeplace-360-200'); ?>" alt="<?php the_title() ?>">
                           </a>
                           <span><?php the_category( ',' ) ?></span>
                        <?php endif ?>
                     </div>
                     
                     <div class="blog-item-content">
                        <a href="<?php the_permalink() ?>"><h4><?php echo wp_trim_words( get_the_title(), 8, '...' );?></h4></a>
                        <ul class="list-inline blog-item-meta-2">
                           <li class="list-inline-item">
                              <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?><?php the_author(); ?></a>
                           </li>
                           <li class="list-inline-item">
                              <?php echo get_the_date(); ?>
                           </li>
                        </ul>       
                     </div>
                  </div>
               </div>
               <?php 
               endwhile; 
            wp_reset_postdata();
            ?>
         </div>
      </div>

      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new themeplace_Widget_Blog );