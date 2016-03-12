<?php
/**
 * The header
 *
 * This is the template that displays all of the <head> section
 *
 * @category WPGarden
 * @package Templates
 * @since 1.0.0
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!--[if IE]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class('hfeed site'); ?>>
	<div id="site-header" class="col-full-no">
		<?php if ( is_front_page() ) : ?>
			<div class="title-area">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			</div>
		<? else : ?>
			<div class="title-area">
				<span class="site-title class-h1"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
			</div>
		<? endif;

			if ( has_nav_menu( 'header' ) ) { ?>
				<button class="icon-button-small-menu right-button" aria-expanded="false" aria-controls="header-menu"><?php _e('Menu', 'wpg_theme'); ?></button>
			<?
				wp_nav_menu(array(
						'container'       	=> false,
						'theme_location' 	=> 'header',
						'menu_id' 			=> 'header-menu',
						'items_wrap'      => '<nav id="%1$s" class="horizontal arrow rtl hidde wp-nav" data-class="horizontal arrow rtl hidde wp-nav" role="navigation"><ul class="%2$s">%3$s</ul></nav>'
						));
			} else {
				// only if administrator
				if (current_user_can( 'administrator' )){ 	?>
					<!-- Menu poziome -->
					<button class="icon-button-small-menu right-button" aria-expanded="false" aria-controls="header-menu"><?php _e('Menu', 'wpg_theme'); ?></button>
					<div id="header-menu" class="horizontal arrow rtl hidde wp-nav" data-class="horizontal arrow rtl hidde wp-nav" role="navigation">
						<ul class="menu">
							<li class="menu-item"><a href="<?php echo admin_url('nav-menus.php'); ?>"><?php _e('Add menu', 'wpg_theme'); ?></a></li>
						</ul>
					</div>
				<?php }
			} ?>
	</div>