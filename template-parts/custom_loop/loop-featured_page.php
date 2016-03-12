<section class="feturad-box clear-both text-center">
	<header class="entry-header-section header-center">
		<h2><?php echo get_theme_mod('wpg_page_featured_title','Featured Section') ?></h2>
		<span class="border"></span>
	</header>
	<?php

	$select_pages = get_theme_mod('wpg_featured_pages','');

	//chceck pages
	if($select_pages !== '') {

		// The Query
		$page_query = new WP_Query( array (
			'post_type'              => array( 'page' ),
			'post_status'            => array( 'Publish' ),
			'post__in'               => $select_pages,
			'nopaging'               => true,
			'orderby'                => 'post__in',
			'update_post_term_cache' => false,
		));


		// The Loop
		if ( $page_query->have_posts() ) :

			while($page_query ->have_posts()) : $page_query ->the_post(); ?>

			<div class="col-4-sp">
				<div class="feturad-image">
				<a href="<?php the_permalink(); ?>">
					<?php
						if ( has_post_thumbnail() ) :
							the_post_thumbnail( 'medium_large', array( 'alt' => get_the_title() ) );
						else :
							wpg_no_thumbnail('image');
						endif;
					?>
					<div class="text-title-overlay wpg-shadow wpg-gradient-bw"><p><?php the_title(); ?></p></div>
				</a>
				</div>
			</div>
		<?php
			endwhile; endif;
			// Restore original Post Data
			wp_reset_postdata();
	}
?>
	<div class="clear"></div>
</section>