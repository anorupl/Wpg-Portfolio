<?php
/**
  * The taxonomy template file
  *
  *
  * @category WPGarden
  * @package Templates
  * @since 1.0.0
  *
  * @link https://codex.wordpress.org/Template_Hierarchy
  */
?>

<?php get_header(); ?>

<div class="col-full-no content-area hentry-porto">
	<main id="main" class="site-main" role="main">
		<header class="entry-header-section header-center">
			<h2><?php the_archive_title() ?></h2>
			<span class="border"></span>
			<?php //the_archive_description(); ?>
		
		</header>
		<?php if ( have_posts() ) : 
		
			/* Start the Loop */

			while ( have_posts() ) : the_post(); ?>
				
				<div id="post-<?php the_ID(); ?>" <?php post_class('col-4'); ?> >
					<a href="<?php the_permalink(); ?>" aria-hidden="true">
						<?php the_post_thumbnail( 'medium', array( 'alt' => get_the_title() ) ); ?>
						<div class="text-title-overlay wpg-gradient-bw"><h3><?php the_title(); ?></h3></div>
					</a>		
				</div>

			<?php endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'wpg_theme' ),
				'next_text'          => __( 'Next page', 'wpg_theme' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'wpg_theme' ) . ' </span>',
			) );
			?>

		<?php else :

			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/multi_post/content', 'none' );

	endif; ?>
	</main>
</div>
<?php get_footer(); ?>