<?php
/**
 * The template for displaying the download tags.
 * @package themeplace
 */
get_header(); 

global $themeplace_opt;

$themeplace_product_per_page = !empty($themeplace_opt['themeplace_product_per_page']) ? $themeplace_opt['themeplace_product_per_page'] : 9;

?>

<section class="themeplace-page-section">
  <div class="container">
    <div class="row">
      <?php if ( is_active_sidebar( 'edd-archive-sidebar' ) ) { ?>
        <div class="col-md-4">
          <div class="edd-archive-sidebar">
            <?php dynamic_sidebar( 'edd-archive-sidebar' ); ?>
          </div>
        </div>
      <?php } ?>
      
      <div class="col-md-<?php if ( is_active_sidebar( 'edd-archive-sidebar' ) ) { echo '8'; } else { echo '12'; } ?>">
        <div class="row">
          <?php 
          $term=get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
          $paged=( get_query_var( 'paged')) ? get_query_var( 'paged') : 1;
          if ( ! isset( $wp_query->query['orderby'] ) ) { 
            $args = array( 
                    'orderby' => 'date', 
                    'order' => 'DESC', 
                    'post_type' => 'download',
                    'posts_per_page'=> $themeplace_product_per_page,
                    'download_tag'=>$term->slug,  
                    'paged' => $paged );
            } else { 
            switch ($wp_query->query['orderby']) { 
                case 'date': 
                $args = array( 
                    'orderby' => 'date', 
                    'order' => 'DESC', 
                    'post_type' => 'download',
                    'posts_per_page'=> $themeplace_product_per_page,
                    'download_tag'=>$term->slug,  
                    'paged' => $paged ); 
                break; 
                case 'sales': 
                $args = array( 
                    'meta_key'=>'_edd_download_sales', 
                    'order' => 'DESC', 
                    'orderby' => 'meta_value_num',
                    'posts_per_page'=> $themeplace_product_per_page,
                    'download_tag'=>$term->slug,  
                    'post_type' => 'download', 
                    'paged' => $paged ); 
                break; 
                case 'price': 
                $args = array( 
                    'meta_key'=>'edd_price', 
                    'order' => 'ASC', 
                    'orderby' => 'meta_value_num',
                    'posts_per_page'=> $themeplace_product_per_page,
                    'download_tag'=>$term->slug,  
                    'post_type' => 'download', 
                    'paged' => $paged ); 
                break; 
            } } 

            $temp = $wp_query; $wp_query = null; 
            $wp_query = new WP_Query(); $wp_query->query($args);
            if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();

              get_template_part( 'template-parts/content', get_post_type() );

              endwhile;

            else :

              get_template_part( 'template-parts/content', 'none' ); 

            endif; ?>
            
        </div>

        <div class="row">
          <div class="col-md-12 <?php if ( !is_active_sidebar( 'edd-archive-sidebar' ) ) { echo 'text-center'; } ?>">
          <?php the_posts_pagination( array(
            'screen_reader_text' => ' ',
                'mid_size'  => 2,
              'prev_text' => '<span>&leftarrow;</span>',
              'next_text' => '<span>&rightarrow;</span>',
          ) ); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>