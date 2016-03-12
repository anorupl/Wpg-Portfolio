<?php
/**
 * Theme Customizer
 *
 * @category WPGarden
 * @package Theme Customizer
 * @since 1.0.0
 *
 * @global object $wp_customize WP_Customize instance.
 *
 */

global $wp_customize;

/* Load necessary files with additional elements
 ************************************************/
require get_template_directory() . '/inc/customizer/helpers/inc_front_css.php';
require get_template_directory() . '/inc/customizer/helpers/inc_helpers.php';
require get_template_directory() . '/inc/customizer/helpers/inc_scripts_and_style.php';


if(isset($wp_customize)) {
	
	
	/* Load necessary files with additional elements only if custumizer on
	 ************************************************/
	require get_template_directory() . '/inc/customizer/helpers/inc_context.php';
	require get_template_directory() . '/inc/customizer/helpers/inc_sanitization.php';


	/* Load extends class WP_Customize_Control
	 ************************************************/

	// Class "Fonts_Dropdown_Google" - Custom control fonts field.
	require get_template_directory() . '/inc/customizer/custom_control_field/inc_field_fonts.php';

	// Class "Fonts_Dropdown_Google" - Custom control with mutli checbox.
	require get_template_directory() . '/inc/customizer/custom_control_field/inc_multi_checbox.php';

	// Class "Fonts_Dropdown_Google" - Custom control with mutli checbox.
	require get_template_directory() . '/inc/customizer/custom_control_field/inc_multisort_checbox.php';

	// Class "Fonts_Dropdown_Google" - Custom control with mutli checbox.
	require get_template_directory() . '/inc/customizer/custom_control_field/inc_google_map.php';
	
	if ( class_exists('Wpg_Custom_Post_Type')) {

		/* Class "Fonts_Dropdown_Google" - Custom control with mutli checbox.
		 * It requires plugin wpg-post-menager.
		 */
		//require get_template_directory() . '/inc/customizer/custom_control_field/inc_term_checbox.php';
		
	}

}

/**
 * Add customizations for this theme
 *
 * @since 1.0.0
 *
 * @param object $wp_customize WP_Customize instance
 * @return void
 */
function wpg_customizer_general($wp_customize) {

	// Modify existing controls and settings
	$wp_customize->get_setting('blogname')->transport = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport = 'postMessage';

	// Add panel - Theme Settings
	$theme_panel_id = 'wpg_general';

	$wp_customize->add_panel( $theme_panel_id, array(
	   	'priority' 			=> '10',
	    'capability' 		=> 'edit_theme_options',
	    'theme_supports' 	=> '',
	    'title' 			=> __( 'Theme Settings', 'wpg_theme' )
	) );




    // Add 'Typography' section in panel 'Theme Settings'
    $font_section_id = 'wpg_typography';

    $wp_customize->add_section( $font_section_id, array(
		'priority'   		=> '1',
		'capability' 		=> 'edit_theme_options',
		'theme_supports'	=> '',
		'title'      		=> __( 'Typography', 'wpg_theme' ),
	    'panel' 			=> $theme_panel_id,
	));
	
    // Add 'Slider' section in panel 'Theme Settings'
    $slider_section_id = 'wpg_slider';

    $wp_customize->add_section(  $slider_section_id, array(
		'priority'   		=> '2',
		'capability' 		=> 'edit_theme_options',
		'theme_supports'	=> '',
		'title'      		=> __( 'Slider', 'wpg_theme' ),
	    'panel' 			=> $theme_panel_id,
	));		
	
    // Add 'Page featured' section in panel 'Theme Settings'
    $page_featured_section_id = 'wpg_section_featured';

    $wp_customize->add_section(  $page_featured_section_id, array(
		'priority'   		=> '3',
		'capability' 		=> 'edit_theme_options',
		'theme_supports'	=> '',
		'title'      		=> __( 'Page featured', 'wpg_theme' ),
	    'panel' 			=> $theme_panel_id,
	));		


    // Add 'Contact theme Section' section in panel 'Theme Settings'

    $contact_section_id = 'wpg_contact_theme_section';

    $wp_customize->add_section( $contact_section_id, array(
		'priority'   		=> '4',
		'capability' 		=> 'edit_theme_options',
		'theme_supports'	=> '',
		'title'      		=> __( 'Contact', 'wpg_theme' ),
	    'panel' 			=> $theme_panel_id,
	));


    // Add 'Social networks link' section in panel 'Theme Settings'

    $social_network_id = 'wpg_social_network';

    $wp_customize->add_section(  $social_network_id, array(
		'priority'   		=> '5',
		'capability' 		=> 'edit_theme_options',
		'theme_supports'	=> '',
		'title'      		=> __( 'Social networks link', 'wpg_theme' ),
	    'panel' 			=> $theme_panel_id,
	));
	





	/* Add setting and control - Typography Section
	 ************************************************/


	// Typography
	require get_template_directory() . '/inc/customizer/setting_control/inc_setting_fonts.php';
	// Slider 
	require get_template_directory() . '/inc/customizer/setting_control/inc_setting_slider.php';
	// Featured page
	require get_template_directory() . '/inc/customizer/setting_control/inc_setting_page_featured.php';
	// Contact section
	require get_template_directory() . '/inc/customizer/setting_control/inc_setting_contact.php';
	// Social networks link
	require get_template_directory() . '/inc/customizer/setting_control/inc_setting_social_net.php';


	if ( class_exists('Wpg_Custom_Post_Type')) {
	    // Add 'offer featured' section in panel 'Theme Settings'
	    $offer_featured_section_id = 'wpg_section_offer';
	
	    $wp_customize->add_section(  $offer_featured_section_id, array(
			'priority'   		=> '7',
			'capability' 		=> 'edit_theme_options',
			'theme_supports'	=> '',
			'title'      		=> __( 'Offer featured', 'wpg_theme' ),
		    'panel' 			=> $theme_panel_id,
		));	
		
		// Setting Featured offer
		require get_template_directory() . '/inc/customizer/setting_control/inc_setting_offer_featured.php';
		
	    /* Add 'Featured Term' section in panel 'Theme Settings'
		 * It requires plugin wpg-post-menager.
		 */
		 
		/*
	    $featured_term_section_id = 'wpg_section_featured_term';
	
	    $wp_customize->add_section( $featured_term_section_id, array(
			'priority'   		=> '6',
			'capability' 		=> 'edit_theme_options',
			'theme_supports'	=> '',
			'title'      		=> __( 'Featured Term', 'wpg_theme' ),
		    'panel' 			=> $theme_panel_id,
		));	
		*/		
		
		// Featured term - It requires plugin wpg-post-menager.
		// require get_template_directory() . '/inc/customizer/setting_control/inc_setting_featured_term.php';
	}		
}
add_action( 'customize_register', 'wpg_customizer_general' );





/* simple function to delete transient 
 * if custumizer save query in transient.  
 */
function customizer_delete_transient() {
     delete_transient( 'name_transient' );
}
//add_action('publish_post', 'customizer_delete_transient');
//add_action( 'transition_post_status', 'customizer_delete_transient', 10, 3 );
//add_action( 'customize_save_after','customizer_delete_transient');
?>