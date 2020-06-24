<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package themeplace
 */

global $themeplace_opt;

$related_post_title = !empty($themeplace_opt['related_post_title']) ? $themeplace_opt['related_post_title'] : 'Related posts may you like';
$posts_per_page = !empty($themeplace_opt['posts_per_page']) ? $themeplace_opt['posts_per_page'] : '';
$related_posts_columns = !empty($themeplace_opt['related_posts_columns']) ? $themeplace_opt['related_posts_columns'] : '';
$related_posts = !empty($themeplace_opt['related_posts']) ? $themeplace_opt['related_posts'] : '';
$themeplace_blog_details_post_navigation = !empty($themeplace_opt['themeplace_blog_details_post_navigation']) ? $themeplace_opt['themeplace_blog_details_post_navigation'] : '';

get_header();

?>
<section class="themeplace-page-section">
	<div class="container">
        <div class="row justify-content-center mar-bottom">
            <div class="space-bottom col-md-<?php if ( is_active_sidebar( 'sidebar' )){ echo '8';} else { echo '12'; } ?>">
			<?php 

            while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', get_post_type() );

                if ( $themeplace_blog_details_post_navigation == true ) {

                    if ( get_previous_post() ) {
                        // FOR PREVIOUS POST
                        $prev_post = get_previous_post(); 
                        $id = $prev_post->ID;
                        $permalink = get_permalink( $id );
                    }
                    
                    if ( get_next_post() ) {
                        // FOR NEXT POST
                        $next_post = get_next_post();
                        $nid = $next_post->ID;
                        $permalink = get_permalink( $nid );
                    }

                ?>

                <div class="row">
                    <?php if ( get_previous_post() ): ?>
                    <div class="col-sm-6">
                        <div class="previous-timeline">
                            <a href="<?php echo get_permalink( $id ) ?>">
                                <?php echo get_the_post_thumbnail( $prev_post->ID, 'themeplace-80x80' ); ?>
                                <h5><?php echo esc_html( $prev_post->post_title )  ?></h5>   
                            </a>                  
                        </div>
                    </div>
                    <?php endif ?>
                    <?php if ( get_next_post() ): ?>
                    <div class="col-sm-6">
                        <div class="next-timeline">                            
                            <a href="<?php echo get_permalink( $nid ) ?>">
                                <?php echo get_the_post_thumbnail( $next_post->ID, 'themeplace-80x80' ); ?>
                                <h5><?php echo esc_html( $next_post->post_title ) ?></h5>
                            </a>
                        </div>
                    </div>
                    <?php endif ?>
                </div>

                <?php } ?>
                
                <?php if ( $related_posts == true ): ?>

                <div class="related-posts">
                    <h4><?php echo esc_html( $related_post_title ) ?></h4>
                    <div class="row">
                    <?php

                    $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => $posts_per_page, 'post__not_in' => array($post->ID) ) );
                    if( $related ) foreach( $related as $post ) {
                    setup_postdata($post); ?>

                        <div class="col-md-<?php echo esc_attr( $related_posts_columns ) ?>">
                            <div class="related-post">
                                <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('full', array('class' => 'img-fluid')) ?>
                                    <h6><?php echo wp_trim_words( get_the_title(), 7, '...' );?></h6>
                                </a>
                            </div>
                        </div>
                     
                    <?php }
                    wp_reset_postdata(); ?>
                    </div>
                </div>

                <?php endif ?>

                <?php
                                
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile;
			?>


            </div>           

            <?php if (is_active_sidebar( 'sidebar' )): ?>
                <div class="col-md-4">
                    <?php get_sidebar(); ?>
                </div>
            <?php endif ?>
		</div>
	</div>
</section>
<?php get_footer();