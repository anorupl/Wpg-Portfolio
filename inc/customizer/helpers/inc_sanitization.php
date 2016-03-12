<?php 
/**
 * Sanitize functions
 *
 * @category WPGarden
 * @package Sanitizer
 *
 * @since 1.0.0
 *
 */ 
 
 
/**
 * Sanitize function for intval
 *
 * @since 1.0.0
 *
 * @param intval $value 
 * @return intval
 */ 
function wpg_intval($value) {
	return intval($value);
} 

/**
 * Sanitize function for Font Family
 *
 * @since 1.0.0
 *
 * @param string $value 
 * @param object $setting 
 * 
 * @return string
 */ 
function wpg_sanitize_font_family( $value, $setting ) {
		
	// Setting id 		
	$field = $setting->id;

	if ($field == 'wpg_body_font' || $field == 'wpg_heading_font') {
		if ( ! is_string( $value ) || $value === '' ) {
			return '';
		} else if ( in_array( $value, array_keys( set_font_list() ) )) {
			return $value; 
		}			
	}
		
	if ($field == 'wpg_body_google_font' || $field == 'wpg_heading_google_font') {
		if ( ! is_string( $value ) || $value === '' ) {
			return '';
		} else if ( in_array( $value, array_keys( set_font_list(false,true) ) )) {
			return $value; 
		}			
	}	
}

/**
 * Sanitize function to Font Family Variant
 *
 * @since 1.0.0
 *
 * @param string $value 
 * @return string
 */ 
function wpg_sanitize_font_variant( $value ) {

	$options = array(
		"100",
		"100italic",
		"200",
		"200italic",
		"300",
		"300italic",
		"500",
		"500italic",
		"600",
		"600italic",
		"700",
		"700italic",
		"800",
		"800italic",
		"900",
		"900italic",
		"italic",
		"regular",
		"thin",
		"thin-italic",
		"bold",
		"bold-italic",
		"medium",
		"medium-italic",
		"extra-light",
		"extra-light-italic",
		"light",
		"light-italic",
		"serif",
		"serif-italic"
	);

	if ( ! is_string( $value ) || $value === '' ) {
		return 'regular';
	} else if ( in_array( $value, $options ) ) {
		return $value;
	}

	return 'regular';
}



 
/**
 * Sanitize function to Multi Checbox
 *
 * @since 1.0.0
 *
 * @param array $values, List select checbox
 * @return array
 */ 
function wpg_sanitize_MultiChecbox( $values ) {

    $multi_values = !is_array( $values ) ? explode( ',', $values ) : $values;

    return !empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : '';
}


/**
 * Sanitize latitude and longitude
 *
 * @since 1.0.0
 *
 * @param string $values, latitude and longitude
 * @return string
 */
function validateGeolocation($value) {
    
    $val = explode(",", $value);  // Split the string by commas
    
    if(is_numeric($val[0]) && is_numeric($val[1])){
       if($val[0] < -90 || $val[0] > 90) {
        	if ($val[1] < -180 || $val[1] > 180) {
        		return trim($value);
        	}
        }
	}
}       
?>