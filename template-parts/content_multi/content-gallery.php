<?php
/**
 * Template part for displaying multi posts format gallery.
 *
 * @category WPGarden
 * @package Templates
 * @since 1.0.0
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class('col-10-center'); ?>>
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
	<div class="entry-content col-9-no padding-left border color-white bg">
	<?php

		echo get_post_gallery( get_the_ID());

		wp_link_pages( array(
			'before'      => '<nav class="page-links pagination-inside" role="navigation"><span class="page-links-title">' . __( 'Pages:', 'wpg_theme' ) . '</span>',
			'after'       => '</nav>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'wpg_theme' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
	?>
	</div><!--.entry-content -->
</div>