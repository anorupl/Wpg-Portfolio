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
<div class="col-footer color-text">
	<div class="entry-header-section header-center text-center">
		<h2 class="entry-title"><?php _e('Contact', 'wpg_theme'); ?></h2>
		<span class="border"></span>
	</div>
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
		<? endif; ?>
		<?php if (get_theme_mod('wpg_address', '') !== '') :?>
			<div class="contact-item other-contact">
				<i class="item-icon icon-map-marker"></i>
				<!--<span><?php _e('Address', 'wpg_theme'); ?></span> -->
				<?php echo esc_html(get_theme_mod('wpg_address')); ?>
			</div>
		<? endif; ?>
		<?php if (get_theme_mod('wpg_email', '') !== '') : ?>
			<div class="contact-item other-contact">
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
		social_net_link('<div class="find-us-on clear-both">%1$s: %2$s </div>');
		?>
	</div>
</div><!-- .footer  -->
<?php wp_footer(); ?>
</body>
</html>