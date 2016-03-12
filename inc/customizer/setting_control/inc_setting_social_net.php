<?php
 /**
  * File with setting and control link in section Social networks.
  *
  * @since 1.0.0
  */


 	// ==============================================
    //  = Social networks link 						=
    //  =============================================

 	
	$social = array('facebook','google','twitter','youtube','vimeo','picassa','deviantart','github','linkedin','pinterest');
	
		foreach ($social as $value) {
			
		$key = 'wpg_sn_'.$value;
				
			$wp_customize->add_setting($key, array(
		    				'default' => '',
		    				'capability' => 'edit_theme_options', 
		    				'sanitize_callback' => 'esc_url_raw'
		    				)
			);
			$wp_customize->add_control( $key, array(
					'label'		=> sprintf(__( 'Link to  %1$s', 'wpg_' ), $value ),
					'section'	=> $social_network_id,
					'settings'	=> $key,
					'type'		=> 'url'
					)
			);		
		}
?>