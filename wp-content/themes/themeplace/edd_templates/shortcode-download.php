<?php
/**
 * A single download inside of the [downloads] shortcode.
 *
 * @since 2.8.0
 *
 * @package EDD
 * @category Template
 * @author Easy Digital Downloads
 * @version 1.0.0
 */


global $edd_download_shortcode_item_atts, $edd_download_shortcode_item_i;
global $themeplace_opt;
$themeplace_product_hover_button = !empty($themeplace_opt['themeplace_product_hover_button']) ? $themeplace_opt['themeplace_product_hover_button'] : ''; ?>

<div class="<?php echo esc_attr( apply_filters( 'edd_download_class', 'edd_download', get_the_ID(), $edd_download_shortcode_item_atts, $edd_download_shortcode_item_i ) ); ?>" id="edd_download_<?php the_ID(); ?>">
	<div class="download-item">
	   <div class="download-item-image">
	      <a href="<?php the_permalink(); ?>">
	        <?php the_post_thumbnail('themeplace-1280x720', array('class' => 'img-fluid')); ?>
	      </a>
	      <span class="download-item-tag" style="background: <?php 
	      if ( $download_tag == 'Sale' ) { 
	         echo "#4caf50"; 
	      } elseif ( $download_tag == 'Featured' ) {
	          echo "#ffc000"; 
	      }  elseif ( $download_tag == 'New' ) {
	          echo "#c00"; 
	      } elseif ( $download_tag == 'Pro' ) { 
	         echo "#f44336"; 
	      } elseif ( $download_tag == 'Free' ) { 
	         echo "#3f51b5"; 
	      } ?>
	      ;"><?php echo esc_html( $download_tag ) ?></span>
	   </div>
	   <div class="download-item-content">
	      <a href="<?php the_permalink(); ?>">
	         <h5><?php the_title() ?></h5>
	      </a>
	      <p><?php echo get_post_meta( get_the_ID(), 'subheading', true ) ?></p>

	      <?php $download_terms = get_the_terms( get_the_ID() , 'download_category' );
	      foreach ( $download_terms as $download_term ) { ?>
	         <a href="<?php echo get_term_link( $download_term->slug, 'download_category' ); ?>" class="download-category"><?php echo esc_html( $download_term->name ); ?></a>
	      <?php } ?>

			<ul class="list-inline">
				<li class="list-inline-item">
					<b>
					<?php if ( edd_get_download_price( get_the_ID() ) == 0 ){ ?>
					    <span><?php echo esc_html__( 'Free', 'themeplace-child' ) ?></span>
					<?php } else { ?>
					    <span><?php echo edd_currency_filter().edd_get_download_price(get_the_ID() ); ?></span>
					<?php } ?>
					</b>
				</li>
				<?php if ( class_exists( 'EDD_Reviews' ) ): ?>
                	<li class="list-inline-item float-right"><?php themeplace_edd_rating() ?></li>
                <?php endif ?>
			</ul>
			<?php if ( true == $themeplace_product_hover_button ): ?>
			<ul class="list-inline text-center download-item-button">
			   <li class="list-inline-item">
			      <a href="<?php the_permalink(); ?>"><i class="fa fa-info-circle"></i><?php echo esc_html__( 'Details' , 'themeplace-child' ) ?></a>
			   </li>
			   <?php if ( get_post_meta( get_the_ID(), 'type', true ) == 'theme' ): ?>
			   <li class="list-inline-item">
			      <a href="<?php echo get_post_meta( get_the_ID(), 'preview_url', true ); ?>"><i class="fa fa-eye"></i><?php echo esc_html__( 'Demo' , 'themeplace-child' ) ?></a>
			   </li>
			   <?php endif ?>                           
			   <li class="list-inline-item">
			      <a href="<?php echo esc_url( home_url( '/' ) ); ?>checkout?edd_action=add_to_cart&download_id=<?php echo get_the_ID(); ?>"><i class="fa fa-shopping-cart"></i><?php echo esc_html__( 'Download' , 'themeplace-child' ) ?></a>
			   </li>
			</ul>
			<?php endif ?>
	   </div>
	</div>
</div>