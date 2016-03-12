<?php
/**
 * Template Name: Child Pages - Thumbnail
 *
 * Display the child pages with thumbnail.
 *
 * @category WPGarden
 * @package Templates
 * @since 1.0.0
 */

 get_header(); ?>

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

		// The Query
		$query_child = new WP_Query(array (
					'post_parent'            => $post->ID,
					'post_type'              => array( 'page' ),
					'post_status'            => array( 'Publish' ),
					'nopaging'               => true,
					'ignore_sticky_posts'    => false,
				)
		 );

		// The Loop
		if ( $query_child->have_posts() ) :
			while($query_child->have_posts()) : $query_child->the_post(); ?>
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