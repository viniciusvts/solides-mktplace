<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package themeplace
 */

$preview_url = get_post_meta( get_the_ID(), 'preview_url', true );
$type = get_post_meta( get_the_ID(), 'type', true );
$video = get_post_meta( get_the_ID(), 'video', true );
$audio = get_post_meta( get_the_ID(), 'audio', true );
$psd = get_post_meta( get_the_ID(), 'psd', true );
$file_size = get_post_meta( get_the_ID(), 'file_size', true );
$affiliate_url = get_post_meta( get_the_ID(), 'affiliate_url', true );
$subheading = get_post_meta( get_the_ID(), 'subheading', true );
$version = get_post_meta( get_the_ID(), 'version', true );
$item_faq = get_post_meta( get_the_ID(), 'item_faq', true );
$documentation = get_post_meta( get_the_ID(), 'documentation', true );
$support = get_post_meta( get_the_ID(), 'support', true );
$themeplace_features_group = get_post_meta( get_the_ID(), 'themeplace_features_group', true );

get_header(); ?>

<section class="themeplace-page-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7">
                <?php while ( have_posts() ) : the_post(); ?>

                    <div class="single-download-thumbnail">
                        <?php if ( $type == 'video' ): ?>

                            <?php echo wp_video_shortcode( array( 
                                'src' => $video,
                                'autoplay' => 'on',
                                'preload'  => 'auto'
                                )
                            ) ?>
                            <a class="themeplace-button" href="<?php echo esc_url( $video ); ?>" download ><?php echo esc_html__( 'Download', 'themeplace-child' ); ?></a>

                        <?php elseif( $type == 'audio' ):

                        echo wp_audio_shortcode( array(
                                'src'      => $audio,
                                'autoplay' => 'on',
                                'preload'  => 'auto' 
                            ) 
                        );

                        elseif( $type == 'psd' ): ?>

                            <?php the_post_thumbnail('full',array('class' => 'img-fluid')); ?>

                            <?php if ( $psd ): ?>
                                <div  class="popup-gallery">
                                    <?php themeplace_cmb2_output_file_list( 'psd' ) ?>                   
                                </div>
                            <?php endif ?>                            

                        <?php else: ?>

                            <?php the_post_thumbnail('full',array('class' => 'img-fluid')); ?>

                        <?php endif ?>
                    </div>

                    <div class="mobile widget-themeplace-price">
                        <?php
                        if ( edd_has_variable_prices( get_the_ID() ) ){ ?>
                            <h2 class="price"><?php echo edd_price_range( get_the_ID() ); ?></h2>
                        <?php } else { ?>
                            <h2 class="price"><?php edd_price(get_the_ID()); ?></h2>
                        <?php }

                        if ( $affiliate_url ) { ?>
                            <a class="affiliate_btn edd-submit" target="_blank" href="<?php echo esc_url( $affiliate_url ) ?>"><?php echo esc_html__( 'Purchase','themeplace-child' ); ?></a>
                        <?php } else {
                            echo apply_filters( 'edd_product_details_widget_purchase_button', edd_get_purchase_link( array( 'download_id' => get_the_ID() ) ) );
                        }
                        
                        if ( $preview_url ){ ?>
                            <a class="themeplace-button live-button" href="<?php echo esc_url( $preview_url ); ?>" target="_blank"><i class="fa fa-eye"></i><?php echo esc_html__( 'Live preview', 'themeplace-child' ); ?></a>
                        <?php }
                        
                        ?>
                        
                        <div class="download-rating">
                            <span><?php echo esc_html__( 'Item Rating','themeplace-child' ); ?></span>
                            <?php themeplace_edd_rating() ?>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 sales-and-comment">        
                                <i class="fa fa-fw fa-2x fa-shopping-cart" aria-hidden="true"></i>
                                <span><?php echo edd_get_download_sales_stats( get_the_ID() ); ?></span>
                                <i class="fa fa-fw fa-2x fa-comments" aria-hidden="true"></i>
                                <span><?php comments_number( 0, 1, '%' ); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="single-download-nav-mobile">
                        <ul class="single-download-nav nav" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#item-details"><?php echo esc_html__( 'Item Details', 'themeplace-child' ); ?></a>
                            </li>
                            <?php if ( comments_open() || get_comments_number() ): ?>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#item-comments"><?php echo esc_html__( 'Comments', 'themeplace-child' ); ?></a>
                            </li>
                            <?php endif ?>
                            <?php if ( class_exists( 'EDD_Reviews' ) ): ?>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#item-reviews"><?php echo esc_html__( 'Reviews', 'themeplace-child' ); ?></a>
                            </li>                            
                            <?php endif ?>
                            <?php if ( $support || class_exists( 'EDD_Front_End_Submissions' ) ) : ?>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#item-support"><?php echo esc_html__( 'Support', 'themeplace-child' ); ?></a>
                            </li>                 
                            <?php endif ?>
                            <?php if ( $item_faq ): ?>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#item-faq"><?php echo esc_html__( 'item FAQ', 'themeplace-child' ); ?></a>
                            </li>
                            <?php endif ?>
                        </ul>
                    </div>

                    <div class="single-download-content">
                        <div class="tab-content">
                            <div id="item-details" class="container tab-pane active">
                                <?php the_content(); ?>
                            </div>
                            <?php if ( comments_open() || get_comments_number() ) { ?>
                            <div id="item-comments" class="container tab-pane fade">
                                <?php comments_template(); ?>
                            </div>
                            <?php } ?>
                            <?php if ( class_exists( 'EDD_Reviews' ) ): ?>
                            <div id="item-reviews" class="container tab-pane fade">
                               <?php echo do_shortcode( '[review download="'.get_the_ID().'" multiple="true" number="10"]' ) ?>
                            </div>                                
                            <?php endif ?>
                            <?php if ( $support || class_exists( 'EDD_Front_End_Submissions' ) ): ?>
                            <div id="item-support" class="container tab-pane fade">
                            <?php if ( class_exists( 'EDD_Front_End_Submissions' ) ) {
                                echo do_shortcode( '[fes_vendor_contact_form id="'.get_the_author_meta( 'ID' ).'"]' );
                            } ?>
                            <?php if ( $support ): ?>
                                <?php foreach ( $support as $key => $support_item ): ?>
                                    <h5><?php echo esc_html( $support_item['themeplace_support_title'] ); ?></h5>
                                    <ul class="<?php if ( 'Yes' == $support_item['support_include'] ){ echo'item-support-includes'; } elseif ( 'No' == $support_item['support_include'] ){ echo'item-support-not-includes'; }  ?>">
                                        <?php $support_list = $support_item['support_list'];
                                        if ( $support_list ) {
                                           foreach ( $support_list as $key => $support_list_item ) { ?>
                                            <li><?php echo esc_html( $support_list_item ); ?></li>
                                        <?php }
                                        } ?>
                                    </ul>
                                <?php endforeach ?>
                            <?php endif ?>
                            </div>                                                   
                            <?php endif ?>
                            <?php if ( $item_faq ): ?>
                            <div id="item-faq" class="container tab-pane fade">
                                <div id="accordion-product" class="themeplace-accordion style-1">
                                    <?php foreach ( $item_faq as $key => $faq ): ?>
                                    <div class="themeplace-accordion-item">
                                        <h5 data-toggle="collapse" data-target="#collapse-<?php echo esc_attr( $key.$randID ) ?>" aria-expanded="false" aria-controls="collapse-<?php echo esc_attr( $key.$randID ) ?>">
                                            <?php echo esc_html( $faq['themeplace_faq_title'] ); ?>
                                            <span class="fa fa-plus"></span>
                                            <span class="fa fa-minus"></span>
                                        </h5>

                                        <div id="collapse-<?php echo esc_attr( $key.$randID ) ?>" class="collapse" data-parent="#accordion-product">
                                          <?php echo esc_html( $faq['themeplace_faq_description'] ); ?>
                                        </div>
                                    </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                            <?php endif ?>
                        </div>
                    </div>
                <?php endwhile; ?>

                <div class="related-items">
                    <h4><?php echo esc_html__( 'Related items may you also like','themeplace-child' ) ?></h4>
                    <div class="row">
                    <?php

                    $related = get_posts( array( 'category__in' => wp_get_post_categories( $post->ID ), 'post_type' => 'download', 'numberposts' => 3, 'post__not_in' => array( $post->ID ) ) );
                    if( $related ) foreach( $related as $post ) {
                    setup_postdata( $post ); ?>

                        <div class="col-md-4">
                            <div class="related-item">
                                <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
                                    <?php the_post_thumbnail('full', array('class' => 'img-fluid')) ?>
                                    <span class="related-item-content">
                                        <h6><?php echo wp_trim_words( get_the_title(), 7, '...' );?></h6>
                                        <?php if ( get_post_meta( get_the_ID(), 'subheading', true ) ): ?>
                                            <p><?php echo esc_html( get_post_meta( get_the_ID(), 'subheading', true ) ); ?></p>
                                        <?php endif ?>
                                    </span>
                                </a>
                            </div>
                        </div>
                     
                    <?php }
                    wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-5">
                <div class="single-download-sidebar">
                    <div class="widget widget-themeplace-price">
                        <?php
                        if ( edd_has_variable_prices( get_the_ID() ) ){ ?>
                            <h2 class="price"><?php echo edd_price_range( get_the_ID() ); ?></h2>
                        <?php } elseif( edd_get_download_price( get_the_ID() ) == 0 ) { ?>
                            <h2 class="price"><?php echo esc_html__( 'Free', 'themeplace-child' ) ?></h2>
                        <?php } else { ?>
                            <h2 class="price"><?php edd_price(get_the_ID()); ?></h2>
                        <?php }

                        if ( $affiliate_url ) { ?>
                            <a class="affiliate_btn edd-submit" target="_blank" href="<?php echo esc_url( $affiliate_url ) ?>"><?php echo esc_html__( 'Purchase','themeplace-child' ); ?></a>
                        <?php } else {
                            echo apply_filters( 'edd_product_details_widget_purchase_button', edd_get_purchase_link( array( 'download_id' => get_the_ID() ) ) );
                        }

                        if ( $preview_url ){ ?>
                            <a class="themeplace-button live-button" href="<?php echo esc_url( $preview_url ); ?>" target="_blank"><i class="fa fa-eye"></i><?php echo esc_html__( 'Live preview', 'themeplace-child' ); ?></a>
                        <?php }
                        
                        ?>
                        <?php if ( class_exists( 'EDD_Reviews' ) ): ?>
                        <div class="download-rating">
                            <span><?php echo esc_html__( 'Item Rating','themeplace-child' ); ?></span>
                            <?php themeplace_edd_rating() ?>
                        </div>
                        <?php endif ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="download-sale">
                                    <i class="fa fa-fw fa-2x fa-shopping-cart" aria-hidden="true"></i>
                                    <span><?php echo edd_get_download_sales_stats( get_the_ID() ); ?></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="download-comments">
                                    <i class="fa fa-fw fa-2x fa-comments" aria-hidden="true"></i>
                                    <span><?php comments_number( 0, 1, '%' ); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="widget widget-themeplace-author">
                        <h2 class="widget-title"><?php echo esc_html__( 'Author', 'themeplace-child' ); ?></h2>

                        <div class="author-info">
                            <div class="author-pic">
                                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>?author-profile=true">
                                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>
                                </a>
                            </div>
                            <span><a href="<?php echo esc_url(add_query_arg( 'author-profile', 'true', get_author_posts_url($post->post_author) )); ?>"><?php the_author(); ?></a></span>
                            <ul class="list-inline author-product">
                                <?php
                                $authorProducts = get_posts( array(
                                    "post_type"=>"download",
                                    "status"=>"publish",
                                    "author"=> get_the_author_meta( 'ID' ),
                                    'showposts'=>3
                                ) );

                                foreach ( $authorProducts as $authorProduct ) {
                                    
                                $thumbnail = get_post_meta( $authorProduct->ID, 'product_item_thumbnail', 1 ); ?>

                                <li class="list-inline-item">
                                    <a href="<?php echo get_permalink($authorProduct); ?>">
                                        <img src="<?php if ( $thumbnail ) { echo esc_url( $thumbnail ); } else { echo get_the_post_thumbnail_url( $authorProduct->ID , 'themeplace-80x80' ); } ?>" alt="<?php the_title_attribute(); ?>">
                                    </a>
                                </li>

                                <?php } ?>
                            </ul>
                            <?php if ( class_exists( 'EDD_Front_End_Submissions' ) ): ?>
                            <div class="author-contact-form">
                            <?php echo do_shortcode( '[fes_vendor_contact_form id="'.get_the_author_meta( 'ID' ).'"]' ) ?>
                            </div>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="widget widget-themeplace-product-information">
                        <h2 class="widget-title"><?php echo esc_html__( 'Item Information','themeplace-child' ); ?></h2>
                        <table>
                          <tbody>
                            <tr>
                              <td><?php echo esc_html__( 'Last Update:','themeplace-child' ); ?></td>
                              <td><span><?php the_modified_date(); ?></span></td>
                            </tr>
                            <tr>
                              <td><?php echo esc_html__( 'Released:','themeplace-child' ); ?></td>
                              <td><span><?php echo get_the_date(); ?></span></td>
                            </tr>
                            <?php if ( $version ): ?>
                            <tr>
                              <td><?php echo esc_html__( 'Version:','themeplace-child' ); ?></td>
                              <td><span><?php echo  esc_html( $version ); ?></span></td>
                            </tr>
                            <?php endif ?>
                            <?php if ( $file_size ): ?>
                            <tr>
                              <td><?php echo esc_html__( 'File Size:','themeplace-child' ); ?></td>
                              <td><span><?php echo  esc_html( $file_size ); ?></span></td>
                            </tr>
                            <?php endif ?>
                            <?php if ( $documentation ): ?>
                            <tr>
                              <td><?php echo esc_html__( 'Documentation:','themeplace-child' ); ?></td>
                              <td><span><?php echo  esc_html( $documentation ); ?></span></td>
                            </tr>
                            <?php endif ?>
                            <?php if ( $themeplace_features_group ): ?>
                                <?php foreach ( $themeplace_features_group as $key => $themeplace_feature_group ): ?>
                                    <tr>
                                        <td><?php echo esc_html( $themeplace_feature_group['themeplace_feature_name'] ); ?></td>
                                        <td>
                                            <?php $features_list = $themeplace_feature_group['themeplace_feature_list'];
                                            if ( $features_list ) {
                                               foreach ( $features_list as $key => $feature ) { ?>
                                                <span><?php echo esc_html( $feature ); ?></span>
                                            <?php }
                                            } ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            <?php endif ?>
                          </tbody>
                        </table>
                    </div>
                    <div class="widget widget-themeplace-tags">
                        <h2 class="widget-title"><?php echo esc_html__( 'Tags','themeplace-child' ); ?></h2>
                        <?php echo get_the_term_list( get_the_ID(), 'download_tag', '<ul class="list-inline"><li class="list-inline-item">', '</li><li class="list-inline-item">', '</li></ul>' ); ?>
                    </div>
                    
                    <?php dynamic_sidebar( 'product-sidebar' ); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer();