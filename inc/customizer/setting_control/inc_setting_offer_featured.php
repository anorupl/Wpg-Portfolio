<?php
 /**
  * File with setting and control in 'offer featured' section
  *
  * @since 1.0.0
  */



// ==============================================
    //  = offer featured 								=
    //  =============================================  
	 	// ==============================================
	    //  = Show 							=
	    //  =============================================  
		$wp_customize->add_setting('wpg_active_offer', array(
			'default'        => false,
			'capability' => 'edit_theme_options',
		));
	
		$wp_customize->add_control( 'wpg_active_offer', array(
			'settings' => 'wpg_active_offer',
			'label'   => __('Show featured offers section', 'wpg_theme'),
			'section'  => $offer_featured_section_id,
			'type'		=> 'checkbox',
			
		));	

	// ====================================
    //  = Title in header section 		  =
    //  ===================================

 	$wp_customize->add_setting('wpg_offer_title', array(
		'default'        => __('Featured Section', 'wpg_theme'),
   		'capability' 		=> 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'

	));

	$wp_customize->add_control( 'wpg_offer_title', array(
		'settings' => 'wpg_offer_title',
		'label'   => __('Title section', 'wpg_theme'),
		'section'  => $offer_featured_section_id,
		'type'    => 'text'
	));
    // ======================================
    //  = Chose offers - 					=
    //  =====================================
	
		$offers = get_pages(array('post_type' => 'offer'));	
		
		foreach ($offers as $offer) {
			$choices_offer[$offer->ID] = $offer->post_title;
		}

		
	 	$wp_customize->add_setting( 'wpg_featured_offers', array(

			            'default'           =>  '',
				   		'capability' 		=> 'edit_theme_options',
			            'sanitize_callback' => 'wpg_sanitize_MultiChecbox'
			        )
		);

		$wp_customize->add_control(
		        new WPG_Customize_Control_Checkbox_Multiple_Sort($wp_customize, 'wpg_featured_offers', array(

		                'section' 			=> $offer_featured_section_id,
		                'label'   			=> __( 'Choose offers', 'wpg_theme' ),
		                'choices' 			=> $choices_offer
		            )
		        )
		);
		
	/* Unset varible */
	 unset($offers);
	 unset($choices_offer);
	 
?>