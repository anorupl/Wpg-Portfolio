<?php
/**
 * The footer
 *
 * This is the template that displays all of the <footer> section
 *
 * @category WPGarden
 * @package Templates
 * @since 1.0.0
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

?>
<div class="col-footer color-light bg">

	<div class="entry-header-section header-center text-center">
		<h2 class="entry-title"><?php _e('Contact', 'wpg_theme'); ?></h2>
		<span class="border"></span>
	</div>

	<?php
	/* =================================
	 * Section contact - Google maps   *
	 * ================================*/
	if( true == get_theme_mod('wpg_contact_maps')) { ?>
		<div id="section-directions-map" class="col-full-no">
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
	<?php } ?>


	<?php
	/* ===========================================
	 * Section contact - telephone/addres/email  *
	 * ==========================================*/
	?>
	<div class="section-contact text-center">
		<div class="contact-info clear-both">
		<?php if (get_theme_mod('wpg_telephone', '') !== '') : ?>
			<div class="contact-item phone-contact">
				<i class="item-icon icon-phone_android"></i> <?php _e('Call us ', 'wpg_theme'); printf('<a href="tel:%1s">%1$s</a>', esc_attr(get_theme_mod('wpg_telephone'))); ?>
			</div>
		<?php endif; ?>
		<?php if (get_theme_mod('wpg_address', '') !== '') :?>
			<div class="contact-item other-contact">
				<i class="item-icon icon-map-marker"></i>
				<!--<span><?php _e('Address', 'wpg_theme'); ?></span> -->
				<?php echo esc_html(get_theme_mod('wpg_address')); ?>
			</div>
		<?php endif; ?>
		<?php if (get_theme_mod('wpg_email', '') !== '') : ?>
			<div class="contact-item other-contact">
				<i class="item-icon icon-envelope"></i>
				<!-- <span><?php _e('E-mail', 'wpg_theme'); ?></span> -->
				<?php printf('<a href="mailto:%1s">%1$s</a>', antispambot(get_theme_mod('wpg_email'))); ?>
			</div>
		<?php endif; ?>
		</div>

		<?php
		/* =================================
		 * Section contact - social links  *
		 * ================================*/
		social_net_link('<div class="find-us-on clear-both">%1$s: %2$s </div>');
		?>
	</div>
</div><!-- .footer  -->
<?php wp_footer(); ?>
</body>
</html>