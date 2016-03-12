<?php
/**
 * Template part for displaying multi posts format status.
 *
 *
 * @category WPGarden
 * @package Templates
 * @since 1.0.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('col-10-center color-white bg'); ?>>
	<header class="entry-header col-8-no-last">
		<?php  the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
		<div class="entry-meta">
			<span class="posted-on">
				<span class="screen-reader-text"><?php _e('Posted on', 'wpg_theme'); ?></span>
				<?php wpg_time() ?>
			</span><!-- .posted-on -->
			<span class="author vcard screen-reader-text">
				<?php _e('by', 'wpg_theme'); ?>
				<span class="fn"><?php the_author(); ?></span>
			</span><!-- .author -->			
			<span class="slesz"> / </span>
			<span class="cat-links">
				<span class="screen-reader-text"><?php _e('Categories', 'wpg_theme'); ?></span>
				<?php the_limit_category_list(', '); ?>
			</span><!-- .cat-links -->			
		</div><!-- .entry-meta -->	
	</header>
	<div class="avatar-status col-3">
		<?php echo get_avatar( get_the_author_meta( 'ID' ), 250 ); ?>
	</div><!-- .avatar-status -->	
	<div class="entry-content col-8-no-last">
	<p>
		<?php
	
		echo wp_strip_all_tags(get_the_content());
	
		wp_link_pages( array(
			'before'      => '<nav class="page-links pagination-inside" role="navigation"><span class="page-links-title">' . __( 'Pages:', 'wpg_theme' ) . '</span>',
			'after'       => '</nav>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'wpg_theme' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
		</p>
	</div><!-- .entry-content -->	
	<div class="clear"></div>
</article>