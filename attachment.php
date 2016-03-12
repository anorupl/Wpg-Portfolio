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
				<span class="class-h3"><?php _e('Click to download','wpg_theme')?></span><br>
				<span class="btn-download">
					<?php
					//icon button
					echo wp_get_attachment_link($post->ID, 'thumbnail', false, true,false); ?>
				<span>
				<br>
				<?php
						$attachment_data = wp_prepare_attachment_for_js();

						_e('File size: ','wpg_theme');
						echo $attachment_data['filesizeHumanReadable'];

				?>
		</div>
	</div>
	<?php endwhile; ?>
	</main>
</div><!-- .content-area -->
<?php get_footer('single'); ?>