<?php
/**
 * Template part for displaying multi posts format image.
 *
 * @category WPGarden
 * @package Templates
 * @since 1.0.0
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('col-10-center'); ?>>
	<div class="entry-image col-9-no border color-white bg">
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>" aria-hidden="true">
				<?php the_post_thumbnail( 'full', array( 'alt' => get_the_title() ) ); ?>
			</a>
		</div>
	<?php } else {
		wpg_no_thumbnail();
	} ?>
	</div><!-- .entry-image -->

	<div class="warp-absolute color-white bg">
		<span class="cat-links">
			<span class="screen-reader-text"><?php _e('categories', 'wpg_theme'); ?></span>
			<?php the_limit_category_list(', '); ?>
		</span><!-- .cat-links -->
		<div class="entry-header">
			<h3  class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php wpg_title_shorten(); ?></a></h3>
		</div>
		<div class="entry-meta">
			<span class="posted-on">
				<span class="screen-reader-text"><?php _e('Posted on', 'wpg_theme'); ?></span>
				<?php wpg_time() ?>
			</span><!-- .posted-on -->
			<span class="author vcard screen-reader-text">
				<?php _e('by', 'wpg_theme'); ?>
				<span class="fn"><?php the_author(); ?></span>
			</span><!-- .author -->
		</div><!-- .entry-meta -->
		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div><!-- .entry-excerpt -->
	</div><!--.warp-absolute -->
</div>