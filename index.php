<?php
/**
  * The main template file
  *
  * This is the most generic template file in a WordPress theme
  * and one of the two required files for a theme (the other being style.css).
  * It is used to display a page when nothing more specific matches a query.
  * E.g., it puts together the home page when no home.php file exists.
  *
  * @category WPGarden
  * @package Templates
  * @since 1.0.0
  *
  * @link https://codex.wordpress.org/Template_Hierarchy
  */


get_header();

/* ===============================
 * Display Only in front page    *
 * ==============================*/
if (is_front_page() && !is_paged()) {


	/* ====================
	 * Section - Slider   *
	 * ===================*/
	get_template_part('template-parts/custom_loop/loop', 'slider-offer' );

	/* =====================
	 * Section - Featured  *
	 * ====================*/
	if ( class_exists('Wpg_Custom_Post_Type') && get_theme_mod('wpg_active_offer', false) === true) {

		//Section - Featured offer
		get_template_part('template-parts/custom_loop/loop', 'featured_offer' );

	} else {

		 //Section - featured page
		if(get_theme_mod('wpg_active_page_featured', false) === true)
			get_template_part('template-parts/custom_loop/loop', 'featured_page' );
	}

	/* ============================
	 * Section - Featured Terms   *
	 * ============================
	 *
	 * 	0 - off section, no item
	 * 	3 - on section, first select 3 terms, 4 colum (class: col-4)
	 *  4 - on section, first select 4 terms, 3 colum (class: col-3)
	 *  6 - on section, first select 6 terms, 4 colum (class: col-4)
	 *  99 - on section, all select terms (empty varible for get_terms('number' => ''), 4 colum (class: col-4)
	 *
	 */
	$count_terms = get_theme_mod('wpg_featured_term', 0);

	if ($count_terms !== 0 ) {

		// Set width by count item (np: class='col-3')
		$column = $count_terms == 3 ? '3' : '4';

		require get_template_directory() . '/template-parts/custom_loop/loop_terms.php';
	}


	/* ============================
	 * Section - Client Reviews   *
	 * ===========================*/
	if ( class_exists('Wpg_Custom_Post_Type'))
		get_template_part('template-parts/custom_loop/loop', 'client_reviews' );
}


/* =================================
 * Section - Sticky post   		   *
 * ================================*/
if (get_theme_mod('wpg_sticky', false) === true)
	get_template_part( 'template-parts/custom_loop/loop', 'sticky' );


/* =================================
 * Section - Main loop  		   *
 * ================================*/
?>
<div class="col-full-no content-area hentry-multi">
	<div id="main">
		<div class="site-main">
			<?php get_template_part('template-parts/loop/loop', 'multi' ); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>