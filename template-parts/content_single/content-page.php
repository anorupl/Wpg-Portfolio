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
		<div class="col-6 entry-header"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></div>
		<div class="col-2 entry-social text-right"><?php wpg_share(); ?></div>
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
		</div>
	</div>
</div>