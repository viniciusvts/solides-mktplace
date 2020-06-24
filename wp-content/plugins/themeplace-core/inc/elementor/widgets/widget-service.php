<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// service item
class themeplace_Widget_Service extends Widget_Base {
 
   public function get_name() {
      return 'service_item';
   }
 
   public function get_title() {
      return esc_html__( 'Service Item', 'themeplace' );
   }
 
   public function get_icon() { 
        return 'eicon-facebook-comments';
   }
 
   public function get_categories() {
      return [ 'themeplace-elements' ];
   }
   protected function _register_controls() {
      $this->start_controls_section(
         'service_section',
         [
            'label' => esc_html__( 'Service Item', 'themeplace' ),
            'type' => Controls_Manager::SECTION,
         ]
      );
      $this->add_control(
         'icon',
         [
            'label' => __( 'Icon', 'themeplace' ),
            'type' => \Elementor\Controls_Manager::ICON,
            'default' => 'fa-rocket',
         ]     
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'themeplace' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Design','themeplace'),
         ]
      );
      $this->add_control(
         'text',
         [
            'label' => __( 'Text', 'themeplace' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Lorem ipsum dummy text in print and website industry are usually use in these section','themeplace'),
         ]
      );
      
      $this->end_controls_section();
   }
   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); 
      //Inline Editing
      $this->add_inline_editing_attributes( 'title', 'basic' );
      $this->add_inline_editing_attributes( 'text', 'basic' );
      ?>
 
      <div class="service-item text-center">
         <i class="fa fa-fw fa-2x <?php echo esc_html( $settings['icon'] ); ?>"></i>
         <h4 <?php echo $this->get_render_attribute_string( 'title' ); ?>><?php echo esc_html( $settings['title'] ); ?></h4>
         <p <?php echo $this->get_render_attribute_string( 'text' ); ?>><?php echo esc_html( $settings['text'] ); ?></p>
      </div>

      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new themeplace_Widget_Service );