<?php
/**
 * Template part for displaying single posts - format image.
 *
 * @category WPGarden
 * @package Templates
 * @since 1.0.0
 *
 */
?>
<div  id="post-<?php the_ID(); ?>" <?php post_class('gallery-style'); ?>>
		<div class="warp-relative">
			<div class="col-4" >
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header>
				<div class="entry-meta">
					<?php wpg_meta(false,true,false,true); ?>
				</div>
			</div><!-- .col-4 -->
			<div class="col-8-no-last featured-image">
				<?php if (has_post_thumbnail()) {

						printf('<div class="bg-container-image" style="background-image:url(&quot; %1$s &quot;);" ><img src="%1$s" alt="" class="show-small"/><a href="%1$s" class="slider-button image-popup"><div>%2$s</div></a></div>',
						 		esc_url(wp_get_attachment_url(get_post_thumbnail_id())),
						 		__('Zoom Image','wpg_theme')
						);
					} else {
						echo '<div class="bg-container-svg"></div>';

					}
				?>
			</div><!-- .featured-image -->
			<div class="col-4">
				<hr class="style-two">
				<div class="entry-social text-center">
					<?php wpg_share(); ?>
				</div>
				<hr class="style-two">
			</div><!-- .col-4 -->
			<div class="entry-content">
					<?php
						the_content();

						wp_link_pages( array(
							'before'      => '<nav class="page-links pagination-inside" role="navigation"><span class="page-links-title">' . __( 'Pages:', 'wpg_theme' ) . '</span>',
							'after'       => '</nav>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'wpg_theme' ) . ' </span>',
							'separator'   => '<span class="screen-reader-text">, </span>',
						) );
					?>
			</div><!-- .entry-content -->
		</div><!-- .warp-relative -->
		<span class="clear"><br></span>
		<div class="comment-full-width">
		<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
				?>
		</div><!-- .comment-full-width -->
			<?php
				// Previous/next post navigation.
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'wpg_theme' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'wpg_theme' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'wpg_theme' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'wpg_theme' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );
			?>
</div><!-- post -->