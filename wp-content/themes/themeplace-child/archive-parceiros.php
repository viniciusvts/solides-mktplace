<?php
get_header();
?>
<section class="themeplace-page-section">
	<div class="container">
        <div class="row blog-post-list" >
			<div class="col-md-<?php if ( is_active_sidebar( 'sidebar' )){ echo '8';} else { echo '12'; } ?>">
                <div class="download_items row">
                    <?php 
                    if ( have_posts() ){
                        while ( have_posts() ){
                            the_post(); 
                            $link = get_permalink(get_the_ID());
                            $acfFields = get_fields(get_the_ID());
                            $img = $acfFields['foto'];
                            $nivelParc = $acfFields['nivel_parceiro'];
                    ?>
                    <div class="col-md-6 col-lg-4 <?php echo $nivelParc['value'] ?>">
                        <div class="download-item">
                            <div class="download-item-image">
                                <a href="<?php echo $link ?>">
                                    <img width="100%" height="auto" 
                                    src="<?php echo $img['sizes']['medium'] ?>" 
                                    class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                                    alt="<?php echo $img['alt'] ?>">
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                        } // end while
                    } else {
                        get_template_part( 'template-parts/content', 'none' );
                    }
                    ?>
                </div>
                <div class="text-center">
                    <?php 
                        the_posts_pagination( array(
                            'mid_size'  => 2,
                            'prev_text' => '<span>&leftarrow;</span>',
                            'next_text' => '<span>&rightarrow;</span>',
                        ) );
                    ?>
                </div>

            </div>
            <?php
            if (is_active_sidebar( 'sidebar' )){
            ?>
                <div class="col-md-4">
                    <?php get_sidebar(); ?>
                </div>
            <?php
            }
            ?>
		</div>
	</div>
</section>
<?php get_footer();
