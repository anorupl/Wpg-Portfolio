<?php
 /**
  * File with setting and control in Term Featured section.
  * 
  * It requires plugin wpg-post-menager.
  *
  * @since 1.0.0
  */



 	// ==============================================
    //  = on/off Section Featured Terms			    =
    //  =============================================

 	$wp_customize->add_setting('wpg_featured_term', array(
		'default'        => 0,
   		'capability' 		=> 'edit_theme_options',
        'sanitize_callback' => 'wpg_intval'

	));

	$wp_customize->add_control( 'wpg_featured_term', array(
		'settings' => 'wpg_featured_term',
		'label'   => __('Show featured category', 'wpg_theme'),
		'section'  => $featured_term_section_id,
		'type'    => 'select',
		'choices' =>  array(
				    	'0'  => __('Off last post', 'wpg_theme'),
				    	'2'  => __('3 terms', 'wpg_theme'),
				    	'3'  => __('4 terms', 'wpg_theme'),
				    	'5'  => __('6 terms', 'wpg_theme'),
				       '-1'  => __('All selected terms', 'wpg_theme'))
	));

   	// ====================================
    //  = Title in header section 		  =
    //  ===================================

 	$wp_customize->add_setting('wpg_featured_term_title', array(
		'default'        => __('Category Section', 'wpg_theme'),
   		'capability' 		=> 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'

	));

	$wp_customize->add_control( 'wpg_featured_term_title', array(
		'settings' => 'wpg_featured_term_title',
		'label'   => __('Title section', 'wpg_theme'),
		'section'  => $featured_term_section_id,
		'type'    => 'text',
		'active_callback' 	=> 'wpg_featured_term_active'

	));
	
 	// ==============================================
    //  = Chose Taxonomy 							=
    //  =============================================

	 	$wp_customize->add_setting('wpg_featured_term_tax', array(
			'default'       => 'category',
	   		'capability' 	=> 'edit_theme_options',
			
		));
		$wp_customize->add_control( 'wpg_featured_term_tax', array(
			'settings' 			=> 'wpg_featured_term_tax',
			'label'   			=> __('Select type taxonomie', 'wpg_theme'),
			'section' 			=> $featured_term_section_id,
			'type'    			=> 'select',
			'active_callback' 	=> 'wpg_featured_term_active',
			'choices' 			=> get_all_terms(true)
		));

    // ======================================
    //  = Chose Terms - Term icon with last =
    //  =====================================
		

		
	 	$wp_customize->add_setting( 'wpg_featured_term_terms', array(

			            'default'           =>  array(key($choices_tax_term['category'])),
				   		'capability' 		=> 'edit_theme_options',
			            'sanitize_callback' => 'wpg_sanitize_MultiChecbox'
			        )
		);

		$wp_customize->add_control(
		        new WPG_Customize_Control_Checkbox_Term($wp_customize, 'wpg_featured_term_terms', array(

		                'section' 			=> $featured_term_section_id,
		                'label'   			=> __( 'Choose terms', 'wpg_theme' ),
		                'active_callback' 	=> 'wpg_featured_term_active',
		                'choices' 			=> $choices_tax_term


		            )
		        )
		);
	 
	 
?>