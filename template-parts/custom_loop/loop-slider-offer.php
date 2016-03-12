<div id="header-slider" class="col-full-no" >
	<div id="slider" class="flexslider fullscreen fs-style-1 color-light loading" style="min-height: 300px;">
		<ul class="slides">
		<?php


		if (class_exists('Wpg_Custom_Post_Type')) {

			$query_slajd = new WP_Query(
									array(
										'post_type' 			=> array('offer'),
										'post_status'            => array( 'Publish' ),
										'posts_per_page' 		=> get_theme_mod('wpg_slider_active', 0),
										'ignore_sticky_posts' 	=> true,
										'orderby'				=> 'modified'
									));
		}
		else {

			if (get_theme_mod('wpg_slider_terms', '') !== '' && get_theme_mod('wpg_slider_active', 0) !== 0) {
			// The Query
			$query_slajd = new WP_Query(
									array (
										'post_type'  			=> array( 'post' ),
										'post_status'            => array( 'Publish' ),
										'cat'        			=> get_theme_mod('wpg_slider_terms'),
										'posts_per_page' 		=> get_theme_mod('wpg_slider_active', 0),
										'ignore_sticky_posts' 	=> true,
									));
			}

		}

		if(isset($query_slajd) && $query_slajd->have_posts()) :
			while($query_slajd ->have_posts()) : $query_slajd ->the_post();

			//check post_thumbnail
			if (has_post_thumbnail() == true) {
				$image_thumb = wp_get_attachment_url(get_post_thumbnail_id());
			} else {
				$image_thumb = get_template_directory_uri() . '/img/default/no_image.jpg';
			}

			?>
			<li style="background-image:url('<?php echo $image_thumb; ?>');">
				<div class="slides-continer">
					<div class="slides-content text-center">
						<span class="class-h1"><?php the_title(); ?></span>
						<div class="clear"></div>
						<div class="slides-btn">
							<?php

							$gallery_offer = get_post_meta( get_the_ID(), 'wpg_gallery_offer', true );

							switch (empty($gallery_offer)) {
								case false: ?>
									<a href="<?php the_permalink(); ?>" class="btn-border-2 w-btn"><?php _e('Offer','wpg_theme'); ?></a>
									<a href="<?php echo esc_url(get_term_link(intval($gallery_offer),'gallery' )); ?>" class="btn-border-2 w-btn"><?php _e('Gallery','wpg_theme'); ?></a>

							<?php	break;

								default: ?>
									<a href="<?php the_permalink(); ?>" class="btn-border-2 w-btn"><?php _e('See more','wpg_theme'); ?></a>
							<?php
									break;
							} ?>
						</div>
					</div>
				</div>
			</li>
		<?php endwhile; /* Restore original Post Data */ wp_reset_postdata(); else : ?>
			<li style="background-image:url('<?php echo get_template_directory_uri() . '/img/default/slide.jpg'; ?>');"></li>
		<?php endif; ?>
		</ul>
	</div>
</div>