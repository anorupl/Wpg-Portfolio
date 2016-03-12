<section class="feturad-box clear-both text-center">
	<header class="entry-header-section header-center">
		<h2><?php echo get_theme_mod('wpg_featured_term_title','Category Section') ?></h2>
		<span class="border"></span>
	</header>
<?php

	$type_terms = get_theme_mod('wpg_featured_term_terms','');
	$terms_tax	= get_theme_mod('wpg_featured_term_tax', 'category');



	//chceck taxonomy
	if(taxonomy_exists($terms_tax)) {

		$count_terms = $count_terms == -1 ? ' ': $count_terms + 1;

		$categories = get_terms( $terms_tax, array(
						'orderby' => 'include',
						'order' => 'ASC',
						'include' => $type_terms ,
						'number' => $count_terms,
						));




		foreach ( $categories as $category ) { 	?>

			<div class="col-<?php echo $column; ?>-sp">
				<div class="feturad-image">
				<a href="<?php echo esc_url(get_term_link($category)); ?>">
					<?php

						//echo the_term_thumbnail($category->term_id);

					?>
					<div class="text-overlay"></div>
					<div class="text-title-overlay wpg-shadow wpg-gradient-bw"><p><?php echo $category->name; ?></p></div>
				</a>
				</div>
			</div>
	<?php }

	}

?>
	<div class="clear"></div>
</section>