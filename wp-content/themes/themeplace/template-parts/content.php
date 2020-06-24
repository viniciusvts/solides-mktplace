<?php

global $themeplace_opt;

$social_share = !empty($themeplace_opt['social_share']) ? $themeplace_opt['social_share'] : '';
$themeplace_excerpt_length = !empty($themeplace_opt['themeplace_excerpt_length']) ? $themeplace_opt['themeplace_excerpt_length'] : 20;

if (is_singular()): ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('content-item'); ?>>

	<?php if (has_post_thumbnail()): ?>
		<div class="content-img">
            <?php the_post_thumbnail('themeplace-730-350', array('class' => 'img-fluid')) ?>
        </div>
	<?php endif ?>
	<div class="single-post-content"> 
		<ul class="list-inline single-post-meta">
			<li class="list-inline-item">
			    <i class="fa fa-calendar-check-o"></i><?php echo get_the_date(); ?>
			</li>
			<li class="list-inline-item">
			   <i class="fa fa-tags"></i><?php the_category( ', ' ) ?>
			</li>
			<li class="list-inline-item">
			   <i class="fa fa-user"></i><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
			</li>
			<li class="list-inline-item">
			   <i class="fa fa-commenting-o"></i><?php comments_number( 0, 1, '%' ); ?>
			</li>
		</ul>
		<?php
		the_content( sprintf(
			wp_kses(
				esc_html__( 'Continue reading <span class="screen-reader-text"> "%s"</span>', 'themeplace-child' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );?>

		<div class="content-tags">
			<?php the_tags('Tags: ', ' ', ''); ?>
		</div>
		
		<?php 
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'themeplace-child' ),
			'after'  => '</div>',
		) );
		?>

	</div>

	<?php if ($social_share == true): ?>

	<?php themeplace_social_share(); ?>
		
	<?php endif ?>


</article>

<?php else: ?>

	 <div <?php post_class('excerpt-item'); ?>>
	 	<?php if (has_post_thumbnail()): ?>
	 		<div class="excerpt-img">
	            <a href="<?php the_permalink() ?>">
	                <?php the_post_thumbnail('themeplace-1280x720', array('class' => 'img-fluid')) ?>
	            </a>
	        </div>
	 	<?php endif ?>

        <div class="excerpt-content">
			<a href="<?php the_permalink() ?>"><?php the_title( '<h4>', '</h4>'); ?></a>
			<?php echo themeplace_excerpt( $themeplace_excerpt_length ); ?>
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
    
<?php endif ?>