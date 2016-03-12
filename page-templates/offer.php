<?php
/**
 * Template Name: Show Child Pages
 *
 * Display the child pages.
 *
 * @category WPGarden
 * @package Templates
 * @since 1.0.0
 */

 get_header();

	// Start the loop.
	while ( have_posts() ) : the_post(); ?>

<div class="col-full-no content-area hentry-single">
	<main id="main" class="site-main " role="main">
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
						<?php
							$gallery = get_post_gallery( $post, false );

							if (! $gallery) : ?>

								<li><?php wpg_no_thumbnail('image'); ?></li>

							<?php else :
								$ids = explode( ",", $gallery['ids'] );

								foreach( $ids as $id ) {

								   $image_attributes   = wp_get_attachment_image_src( $id, 'large' );

									printf('<li><img src="%1$s" width="%2$s" height="%3$s" alt=""/></li>',
										$image_attributes[0],
										$image_attributes[1],
										$image_attributes[2]
									);

								}

							endif; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</main>
</div><!-- .content-area -->
<?php endwhile; get_footer('single'); ?>
