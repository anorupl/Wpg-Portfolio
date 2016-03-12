<?php
/**
 * Template part for displaying multi posts format link.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @category WPGarden
 * @package Templates
 * @since 1.0.0
 */
?>
<?php $herf = esc_url(wpg_get_link_url()); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('col-10-center color-light bg'); ?>>
	<div class="warp-entry-header col-full-no">
		<span class="cat-links">
			<span class="screen-reader-text"><?php _e('categories', 'wpg_theme'); ?></span>
			<?php the_limit_category_list(', '); ?>
		</span><!-- .cat-links -->
		<header class="entry-header">
			<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', $herf ), '</a></h3>' );	?>
		</header>
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
	<div class="entry-content col-full-no padding-center">
		<div class="entry-herf">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 56 56">
					  <path class="svg-white" fill="#ffffff" d="M44 29v10q0 3.72-2.64 6.36t-6.36 2.64h-26q-3.72 0-6.36-2.64t-2.64-6.36v-26q0-3.72 2.64-6.36t6.36-2.64h22q0.44 0 0.72 0.28t0.28 0.72v2q0 0.44-0.28 0.72t-0.72 0.28h-22q-2.06 0-3.53 1.47t-1.47 3.53v26q0 2.06 1.47 3.53t3.53 1.47h26q2.06 0 3.53-1.47t1.47-3.53v-10q0-0.44 0.28-0.72t0.72-0.28h2q0.44 0 0.72 0.28t0.28 0.72zM56 2v16q0 0.81-0.59 1.41t-1.41 0.59-1.41-0.59l-5.5-5.5-20.37 20.38q-0.31 0.31-0.72 0.31t-0.72-0.31l-3.56-3.56q-0.31-0.31-0.31-0.72t0.31-0.72l20.38-20.37-5.5-5.5q-0.59-0.59-0.59-1.41t0.59-1.41 1.41-0.59h16q0.81 0 1.41 0.59t0.59 1.41z"/>
					</svg>
					<h4><a target="_blank" href="<?php echo $herf; ?>"><?php the_title(); ?></a></h4>
		</div><!-- .entry-herf -->
	</div><!-- .entry-content -->
</article>