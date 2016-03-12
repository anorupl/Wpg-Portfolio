<?php
 /**
  * File with setting and control in 'Slider' section
  *
  * @since 1.0.0
  */



 	// ==============================================
    //  = on/off Slider 							=
    //  =============================================

 	$wp_customize->add_setting('wpg_slider_active', array(
		'default'        => 0,
   		'capability' 		=> 'edit_theme_options',
        'sanitize_callback' => 'wpg_intval'

	));

	$wp_customize->add_control( 'wpg_slider_active', array(
		'settings' => 'wpg_slider_active',
		'label'   => __('Select how many slides:', 'wpg_theme'),
		'section'  => $slider_section_id,
		'type'    => 'select',
		'choices' =>  array(
				    	'0'  => __('Off slider', 'wpg_theme'),
				    	'3'  => __('3 item', 'wpg_theme'),
				    	'6'  => __('6 item', 'wpg_theme'),
				    	'9'  => __('9 item', 'wpg_theme'),
				       '-1' => __('All item', 'wpg_theme'))
	));
	
	
    // ======================================
    //  = Chose Terms - Term icon with last =
    //  =====================================
		$choices_tax_term = get_all_terms();

		$choices_tax_term = $choices_tax_term['category'] + array( __('Choose Category', 'wpg_theme') );

		ksort($choices_tax_term);
		
		
		//$choices_tax_term = get_all_terms(false);
	 	$wp_customize->add_setting( 'wpg_slider_terms', array(

			            'default'           =>  '',
				   		'capability' 		=> 'edit_theme_options'
			            //'sanitize_callback' => 'in'
			        )
		);

	
		$wp_customize->add_control( 'wpg_slider_terms', array(
			'section'	=> $slider_section_id,
			'label'		=> __( 'Choose terms', 'wpg_theme' ),
			'settings'	=> 'wpg_slider_terms', 
			'type'		=> 'select',
			'choices'	=> $choices_tax_term
			)
		);
	 
?>