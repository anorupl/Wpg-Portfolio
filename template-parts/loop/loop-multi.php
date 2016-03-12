<?php if ( have_posts() ) : ?>
	<?php if ( is_home() || is_front_page() ) { ?>
		<div class="entry-header-section header-center text-center">
			<span class="header-span">
				<h2>
					<?php

					_e('Last post', 'wpg_theme');

					if ( $paged > 1 ) {
						_e(' - page: ', 'wpg_theme');
						echo $paged;
					}

					?>
				</h2>
				<span class="border"></span>
			</span>
			<p></p>
		</div>
	<?php } else { ?>
		<div class="entry-header-section header-center text-center">
			<span class="header-span">
				<h2><?php the_archive_title() ?></h2>
				<span class="border"></span>
			</span>
			<p><?php the_archive_description(); ?></p>
		</div>
	<?php } ?>

	<?php /* Start the Loop */
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content_multi/content', get_post_format() );

			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'wpg_theme' ),
				'next_text'          => __( 'Next page', 'wpg_theme' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'wpg_theme' ) . ' </span>',
			) );
	else :
			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content_multi/content', 'none' );

	endif; ?>