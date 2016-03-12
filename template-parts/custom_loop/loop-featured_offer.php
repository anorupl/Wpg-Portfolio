<section class="feturad-box clear-both text-center">
	<header class="entry-header-section header-center">
		<h2><?php echo get_theme_mod('wpg_offer_title','Featured Section') ?></h2>
		<span class="border"></span>
	</header>

	<?php

	$select_offer = get_theme_mod('wpg_featured_offers','');

	//chceck pages
	if($select_offer !== '') {

		// The Query
		$offer_query = new WP_Query( array (
			'post_type'              => array( 'offer' ),
			'post_status'            => array( 'Publish' ),
			'post__in'               => $select_offer,
			'nopaging'               => true,
			'orderby'                => 'post__in',
			'update_post_term_cache' => false,
		));


		// The Loop
		if ( $offer_query->have_posts() ) :

			while($offer_query ->have_posts()) : $offer_query ->the_post(); ?>

			<div class="col-4-sp">
				<div class="feturad-image">
					<a href="<?php the_permalink(); ?>">
						<?php

							if ( has_post_thumbnail() ) :

							the_post_thumbnail( 'medium_large', array( 'alt' => get_the_title() ) );

							else : wpg_no_thumbnail('image');

							endif;
						?>
						<div class="text-title-overlay wpg-shadow wpg-gradient-bw"><p><?php the_title(); ?></p></div>
					</a>
				</div>
			</div>
		<?php endwhile; endif;
			// Restore original Post Data
			wp_reset_postdata();
	}
?>
	<div class="clear"></div>
</section>