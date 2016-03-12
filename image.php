<?php
/**
 * Template Name: Customers Gallery
 *
 * Displays the contact Template.
 *
 * @category WPGarden
 * @package Templates
 * @since 1.0.0
 */

 get_header(); ?>

<div class="col-full-no content-area hentry-single">
	<main id="main" class="site-main " role="main">
 <?php

 	// Start the loop.
	while ( have_posts() ) : the_post(); ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class('content-style attachment-image'); ?>>
		<div class="col-3-margin attachment-info">
			<div class="entry-header">
				<div><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></div>
			</div>
			<div class="entry-social"><?php wpg_share(); ?></div>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<nav id="attachment-navigation" class="attachment-navigation text-center">
				<div class="nav-links">
					<h2 class="screen-reader-text"><?php _e('Navigation images','wpg_theme')?></h2>
					<?php previous_image_link( false, __( 'Previous Image', 'wpg_theme' ) ); ?>
					<?php next_image_link( false, __( 'Next Image', 'wpg_theme' ) ); ?>
				</div><!-- .nav-links -->
			</nav><!-- .attachment-navigation -->
		</div>
		<div class="col-9 attachment-file">
			<?php
				echo wp_get_attachment_image( get_the_ID(), 'large' );
			?>
		</div>
	</div>
	<?php endwhile; ?>
	</main>
</div><!-- .content-area -->
<?php get_footer('single'); ?>