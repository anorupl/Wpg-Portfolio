<?php

add_filter( 'rwmb_meta_boxes', 'wpg_register_meta_boxes' );

function wpg_register_meta_boxes( $meta_boxes ) {
	
	$prefix = 'wpg_';
	
	/* Options to field select page
	$pages = get_pages();
	$page_select = array();
	
	foreach ( $pages as $page  ) {
		$page_select[$page->ID] = $page->post_title;
	}
	*/

    // 1st meta box
    $meta_boxes[] = array(
        'id'         => 'wpg_offer_metabox',
        'title'      => __('Offer page section','wpg_theme'),
        'post_types' => array( 'offer'),
        'context'    => 'normal',
        'priority'   => 'high',

        'fields' => array(
						array(
							'name'    => __( 'Link to gallery offer', 'wpg_theme' ),
							'id'      => $prefix. 'gallery_offer',
							'type'    => 'taxonomy_advanced',
							// Taxonomy name
							'options'=> array(
								'taxonomy' => 'gallery',
								'type'=> 'select'
							),
							'multiple'    => false,
							
						// Additional arguments for get_terms() function. Optional
						),
						array(
							'id'               => $prefix. 'image_offer',
							'name'             => __( 'Slides image', 'wpg_theme' ),
							'type'             => 'image_advanced',
							'force_delete'     => false,
							// Maximum image uploads
							'max_file_uploads' => 5,
						),						
						
        )
    );
	
    return $meta_boxes;
}
?>