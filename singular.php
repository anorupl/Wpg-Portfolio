<?php
/**
 * The template for displaying all pages, single posts and attachments
 *
 * This is a new template file that WordPress introduced in
 * version 4.3. Note that it uses conditional logic to display
 * different content based on the post type.
 *
 * @category WPGarden
 * @package Templates
 * @since 1.0.0
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

 get_header(); ?>
<div class="col-full-no content-area hentry-single">
	<section>
		<main id="main" class="site-main ">
			<?php
				get_template_part('template-parts/loop/loop', 'single' );
			?>
		</main><!-- .site-main -->
	</section><!-- .section -->
</div><!-- .content-area -->
<?php get_footer('single'); ?>