<?php
/**
 * Template part for displaying single custom post type - offer.
 * 
 * @category WPGarden
 * @package Templates
 * @since 1.0.0
 *
 */  
?>
		<div id="post-<?php the_ID(); ?>" <?php post_class('content-style '); ?>>
			<div class="warp-relative">
			<div class="col-5" >
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header>
				<hr class="style-two">
				<div class="entry-social text-center"><?php wpg_share(); ?></div>
				<hr class="style-two">
				<div class="entry-content">
					<?php

						the_content();


						wp_link_pages( array(
							'before'      => '<nav class="page-links pagination-inside" role="navigation"><span class="page-links-title">' . __( 'Pages:', 'wpg_portfolio' ) . '</span>',
							'after'       => '</nav>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'wpg_portfolio' ) . ' </span>%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						) );
					?>
				</div>
			</div>
				<div class="col-7-no-last featured-image color-light bg">
					<div id="gallery-offer" class="flexslider fs-basic fs-style-1">
						<ul class="slides">

						<?php $gallery = rwmb_meta( 'wpg_image_offer', $args = array('type'=>'image','size'=>'large')); 
							
							if (! $gallery) : ?>
							
							<li><?php wpg_no_thumbnail('image'); ?></li>
							
							<?php else:
							
								foreach ( $gallery as $value) {
									printf('<li><img src="%1$s" /></li>',$value['full_url']);
								}
							endif; ?>
						</ul>
					</div>
					<?php 
						
					$gallery_offer = get_post_meta( get_the_ID(), 'wpg_gallery_offer', true );
						
					if( !$gallery_offer !== false  ) : ?>
							
						<a href="<?php echo esc_url(get_term_link(intval($gallery_offer),'gallery' )); ?>" class="see-gallery-button btn-border-2 w-btn"><?php _e('Gallery','wpg_theme'); ?></a>							
							
					<? endif; ?>					
				</div>
			</div>
		</div>