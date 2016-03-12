<?php
/**
 * Template Name: Show featured pages or offers
 *
 * Displays pages or custom post type (offer) selected in customizer.
 *
 * @category WPGarden
 * @package Templates
 * @since 1.0.0
 */

 get_header();
?>

<div class="col-full-no content-area feturad-box text-center">
	<div id="main">
		<div class="site-main">
		<div class="entry-header-section header-center">
			<span class="header-span">
				<h2><?php the_title() ?></h2>
				<span class="border"></span>
			</span>
			<p></p>
		</div><!-- .entry-header-section -->
		<?php

		// Get selected pages or custom post type (offer) form customizer
		if (get_theme_mod('wpg_active_page_featured', false) === true) {
			$select_pages = get_theme_mod('wpg_featured_offers','');
		} else {
			$select_pages = get_theme_mod('wpg_featured_pages','');
		}

		 // The Query
		$page_query = new WP_Query( array (
				'post_type'              => array( 'page', 'offer' ),
				'post_status'            => array( 'Publish' ),
				'post__in'               => $select_pages,
				'nopaging'               => true,
				'orderby'                => 'post__in',
				'update_post_term_cache' => false,
		));

		// The Loop
		if ( $page_query->have_posts() ) :
			while($page_query->have_posts()) : $page_query->the_post(); ?>
			<div class="col-4-sp">
				<div class="feturad-image">
					<a href="<?php the_permalink(); ?>">
						<?php
							if ( has_post_thumbnail() ) :
								the_post_thumbnail( 'medium_large', array( 'alt' => get_the_title() ) );
							else :
								wpg_no_thumbnail();
							endif;
						?>
						<div class="text-title-overlay wpg-shadow wpg-gradient-bw"><p><?php the_title(); ?></p></div>
					</a>
				</div>
			</div>
		<?php endwhile; endif; wp_reset_postdata(); ?>
		</div><!-- .site-main -->
	</div><!-- #main -->
</div><!-- .content-area -->
<?php get_footer(); ?>