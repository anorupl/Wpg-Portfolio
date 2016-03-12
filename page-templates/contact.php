<?php
/**
 * Template Name: Contact Template
 *
 * Displays the contact Template.
 *
 * @category WPGarden
 * @package Templates
 * @since 1.0.0
 */

 get_header();

	// Start the loop.
	while ( have_posts() ) : the_post(); ?>

<div class="col-full-no content-area hentry-single">
	<main id="main" class="site-main " role="main">

<div id="post-<?php the_ID(); ?>" <?php post_class('wide-content content-style'); ?>>
	<div class="warp-relative">
		<div class="col-6 entry-header"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></div>
		<div class="col-2 entry-social text-center"><?php wpg_share(); ?></div>
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
			<?php the_content(); ?>
			</div>
			<hr class="style-two">
			<div class="section-contact color-text">
				<div class="col-8 contact-info">
				<?php if (get_theme_mod('wpg_telephone', '') !== '') : ?>
					<h2><?php _e('Information', 'wpg_theme'); ?></h2>
					<div class="<?php echo $column; ?> phone-contact">
						<i class="item-icon icon-phone_android"></i> <?php _e('Call us ', 'wpg_theme'); printf('<a href="tel:%1s">%1$s</a>', esc_attr(get_theme_mod('wpg_telephone'))); ?>
					</div>
				<? endif; ?>
				<?php if (get_theme_mod('wpg_address', '') !== '') :?>
					<div class="<?php echo $column; ?> other-contact">
						<i class="item-icon icon-map-marker"></i>
						<!--<span><?php _e('Address', 'wpg_theme'); ?></span> -->
						<?php echo esc_html(get_theme_mod('wpg_address')); ?>
					</div>
				<? endif; ?>
				<?php if (get_theme_mod('wpg_email', '') !== '') : ?>
					<div class="<?php echo $column; ?> other-contact">
						<i class="item-icon icon-envelope"></i>
						<!-- <span><?php _e('E-mail', 'wpg_theme'); ?></span> -->
						<?php printf('<a href="mailto:%1s">%1$s</a>', antispambot(get_theme_mod('wpg_email'))); ?>
					</div>
				<? endif; ?>
				</div>
			<?php
				/* =================================
				 * Section contact - social links  *
				 * ================================*/
				social_net_link('<div class="col-4 find-us-on"><h2>%1$s :</h2> %2$s </div>');
			?>
			</div>
			<hr class="style-two">
			<?php
			/* =================================
			 * Section contact - Google maps   *
			 * ================================*/
			if( true == get_theme_mod('wpg_contact_maps')) { ?>
				<div id="section-directions-map" class="col-full">
					<h2><?php _e('Location', 'wpg_theme'); ?></h2>
						<div id="map-canvas"></div>
						<input id="contact-latlng" type="hidden" value="<?php echo get_theme_mod('wpg_contact_map_latlong','54.248997, 20.804780'); ?>"  />
						<button id="drag" class="btn-white show-small" type="button" ><?php _e('Enable drag', 'wpg_theme'); ?></button>
						<div id="panel" class="text-center">
							<input type="text" id="start" name="start" value="" placeholder="<?php _e('Enter the starting point', 'wpg_theme'); ?>" aria-required="true" aria-invalid="false" title="<?php _e('Enter the starting point', 'wpg_theme'); ?>">
							<button id="show_road" type="button" onclick="showRoute();" ><?php _e('Show route', 'wpg_theme'); ?></button>
							<button id="hide_road" type="button" onclick="hideRoute();" ><?php _e('Hide route', 'wpg_theme'); ?></button>
						</div>
				</div>
				<div id="directions-panel" class="col-full-no color-white bg"></div>
				<br>
			<?php } ?>
		</div>
	</div>
</div>
	</main>
</div><!-- .content-area -->
<?php endwhile; get_footer('empty'); ?>