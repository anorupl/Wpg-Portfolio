<?php
/**
 * Template part for displaying single posts.
 *
 * @category WPGarden
 * @package Templates
 * @since 1.0.0
 *
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('wide-content content-style'); ?>>
	<div class="warp-relative">
		<div class="col-8">
			<div class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</div>
			<div class="entry-meta col-9-no">
				<?php wpg_meta(false,true,false,true); ?>
			</div>
			<div class="entry-social col-3 text-right">
				<?php wpg_share(); ?>
			</div>
		</div>
		<div class="col-4-no-last featured-image">
			<?php if (has_post_thumbnail()) {

						printf('<div class="bg-container-image aaa" style="background-image:url(&quot; %1$s &quot;);" ><img src="%1$s" alt="" class="show-small"/></div>',
						 		esc_url(wp_get_attachment_url(get_post_thumbnail_id()))
						);
					} else {
						echo '<div class="bg-container-svg"></div>';

					}
				?>

		</div>
		<div class="col-8">
			<hr class="style-two">
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
			</div>

				<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
				?>

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
		</div>
	</div>
</div>