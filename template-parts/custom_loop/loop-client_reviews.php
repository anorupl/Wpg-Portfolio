<?php
if ( class_exists('Wpg_Custom_Post_Type')) {

	 /* Query with post type "Slides" - custom theme plugin */
	$client_reviews = new WP_Query(
		 				array (
		 					'post_type' 	=> array( 'client_reviews'),
		 					'post_status' 	=> array( 'Publish' ),
							'orderby'		=> 'modified',
						));

	if( $client_reviews ->have_posts()) { ?>
	<section class="client-reviews clear-both text-center">
		<header class="header-center entry-header-section">
			<h2><?php _e('Client Reviews','wpg_theme'); ?></h2>
			<span class="border"></span>
		</header>

		<div id="client-reviews" class="flexslider fs-basic fs-style-4 col-full color-light bg text-center">

			<ul class="slides">
				<?php
					while($client_reviews ->have_posts()) : $client_reviews ->the_post(); ?>

				<li>
					<div class="warp-thumbnail">
						<?php $background = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium', false ); ?>
						<div class="thumbnail" style="background-image: url('<?php echo $background[0]; ?>');"></div>
							<h3><?php the_title(); ?></h3>
							<span class="work"><?php echo esc_html(get_post_meta( $post->ID, 'title_workplace', true )); ?></span>
					</div>
					<div class="description">
						<?php the_content(); ?>
					</div>
				</li>
				<?php endwhile; ?>

			</ul>
		</div>
	</section>
	<?php
		// Restore original Post Data
		wp_reset_postdata();
	 }
} ?>