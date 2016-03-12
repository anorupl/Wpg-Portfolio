<?php
/**
 * Template part for displaying multi posts format video.
 *
 * @category WPGarden
 * @package Templates
 * @since 1.0.0
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('col-10-center'); ?>>
	<div class="entry-media col-9-no border color-white bg">
		<div class="fluid-width-video-wrapper">
			<?php wpg_embedded_content(array('iframe','video','embed')); ?>
		</div><!-- .fluid-width-video-wrapper -->
	</div><!-- .entry-media -->
	
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
	</div><!--.warp-absolute -->
</div>