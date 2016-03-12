<?php
 /**
  * File with setting and control in 'Page featured' section
  *
  * @since 1.0.0
  */



// ==============================================
    //  = Page featured 								=
    //  =============================================
	 	// ==============================================
	    //  = Show 							=
	    //  =============================================
		$wp_customize->add_setting('wpg_active_page_featured', array(
			'default'        => false,
			'capability' => 'edit_theme_options',
		));

		$wp_customize->add_control( 'wpg_active_page_featured', array(
			'settings' => 'wpg_active_page_featured',
			'label'   => __('Show featured pages section', 'wpg_theme'),
			'section'  => $page_featured_section_id,
			'type'		=> 'checkbox',

		));

	// ====================================
    //  = Title in header section 		  =
    //  ===================================

 	$wp_customize->add_setting('wpg_page_featured_title', array(
		'default'        => __('Featured Section', 'wpg_theme'),
   		'capability' 		=> 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'

	));

	$wp_customize->add_control( 'wpg_page_featured_title', array(
		'settings' => 'wpg_page_featured_title',
		'label'   => __('Title section', 'wpg_theme'),
		'section'  => $page_featured_section_id,
		'type'    => 'text'
	));

    // ======================================
    //  = Chose Pages - 					=
    //  =====================================

		$pages = get_pages(	array('post_type' => 'page'));

		foreach ($pages as $page) {
			$choices_page[$page->ID] = $page->post_title;
		}


	 	$wp_customize->add_setting( 'wpg_featured_pages', array(

			            'default'           =>  '',
				   		'capability' 		=> 'edit_theme_options',
			            'sanitize_callback' => 'wpg_sanitize_MultiChecbox'
			        )
		);

		$wp_customize->add_control(
		        new WPG_Customize_Control_Checkbox_Multiple_Sort($wp_customize, 'wpg_featured_pages', array(

		                'section' 			=> $page_featured_section_id,
		                'label'   			=> __( 'Choose pages', 'wpg_theme' ),
		                'choices' 			=> $choices_page
		            )
		        )
		);

	/* Unset varible */
	 unset($pages);
	 unset($choices_page);

?>