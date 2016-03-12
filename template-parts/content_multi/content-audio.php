<?php
/**
 * Template part for displaying multi posts format audio.
 *
 * @category WPGarden
 * @package Templates
 * @since 1.0.0
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('col-10-center color-light bg'); ?>>
	<div class="warp-entry-header col-full-no">
		<span class="cat-links">
			<span class="screen-reader-text"><?php _e('categories', 'wpg_theme'); ?></span>
			<?php the_limit_category_list(', '); ?>
		</span><!-- .cat-links -->
		<div class="entry-header">
			<h3  class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php wpg_title_shorten(250); ?></a></h3>
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
	</div><!-- .warp-entry-header -->
	<div class="entry-content padding-center col-full-no">
		<!--[if lt IE 9]><script>document.createElement('audio');</script><![endif]-->
	<?php
		wpg_embedded_content(array('audio'));
	?>
	</div><!-- .entry-content -->
</div>