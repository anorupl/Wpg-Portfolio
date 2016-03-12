<?php
 /**
 * The template for displaying 404 pages (not found)
 *
 *
 * @category WPGarden
 * @package Templates
 * @since 1.0.0
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

 	get_header();
?>
<div class="col-full-no content-area hentry-single">
	<main id="main" class="site-main " role="main">
		<div class="content-style error-404 not-found text-center">
			<div class="warp-relative">
				<div class="col-8">
					<div class="entry-header">
						<h1><?php _e( 'Oops! That page can&rsquo;t be found.', 'wpg_theme' ); ?></h1>
					</div>
				</div>
				<div class="col-4-no-last featured-image">
					<?php  echo '<div class="bg-container-svg"></div>'; ?>
				</div>
				<div class="col-8">
					<hr class="style-two">
					<div class="entry-content">
						<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'wpg_theme' ); ?></p>
					</div>
				</div>
			</div><!-- .warp-relative -->
		</div><!-- .error-404 -->
	</main>
</div><!-- .content-area -->
<?php get_footer('single'); ?>