<?php
/**
 * The template for displaying download archive.
 *
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
           $termSlug=(isset($term->slug))?$term->slug:null;
           $searchTerm= (strlen(get_search_query() ) >0 )?get_search_query():null;
           $paged=( get_query_var( 'paged')) ? get_query_var( 'paged') : 1; 

           if ( ! isset( $wp_query->query['orderby'] ) ) { 
            $args = array( 
              'order' => 'ASC',
              'posts_per_page'=> $themeplace_product_per_page,
              'post_type' => 'download', 
              'download_category'=>$termSlug, 
              's' =>$searchTerm,              
              'paged' => $paged
            ); 
          } elseif( $wp_query->query['orderby'] == 'date' ) {
            $args = array( 
                'orderby' => 'date',
                'posts_per_page'=> $themeplace_product_per_page,
                'order' => 'DESC', 
                'post_type' => 'download',
                'download_category'=>$termSlug,
                's' =>$searchTerm,   
                'paged' => $paged 
              );
          } elseif( $wp_query->query['orderby'] == 'sales' ) {
            $args = array( 
                'meta_key'=>'_edd_download_sales',
                'posts_per_page'=> $themeplace_product_per_page, 
                'order' => 'DESC', 
                'orderby' => 'meta_value_num',
                'download_category'=>$termSlug,  
                's' =>$searchTerm, 
                'post_type' => 'download', 
                'paged' => $paged
            ); 
          } elseif( $wp_query->query['orderby'] == 'sales' ) {
            $args = array( 
                'meta_key'=>'edd_price', 
                'posts_per_page'=> $themeplace_product_per_page,
                'order' => 'ASC', 
                'orderby' => 'meta_value_num',
                'download_category'=>$termSlug,  
                'post_type' => 'download', 
                's' =>$searchTerm, 
                'paged' => $paged
            );
          } elseif( $wp_query->query['orderby'] == 'price' ) {
            $args = array( 
                'meta_key'=>'edd_price', 
                'posts_per_page'=> $themeplace_product_per_page,
                'order' => 'ASC', 
                'orderby' => 'meta_value_num',
                'download_category'=>$termSlug,  
                'post_type' => 'download', 
                's' =>$searchTerm, 
                'paged' => $paged
            );
          }

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