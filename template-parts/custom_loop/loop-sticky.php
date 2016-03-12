<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpg
 */

 	$args = array(
 		'post_status'            => array( 'Publish' ),
		'posts_per_page' => 1,
		'post__in'  => get_option( 'sticky_posts' ),
		'ignore_sticky_posts' => true
	);
	$query_sticky = new WP_Query( $args );

	if ( $query_sticky->have_posts() ) :

?>
	<section class="hentry-porto ">
		<header class="entry-header-section header-center text-center">
			<h2><a href="#">Tytuł sekcji</a></h2>
		</header>
	<?php

		while ( $query_sticky->have_posts() ) : $query_sticky->the_post();

			get_template_part( 'template-parts/content', get_post_format() );

		endwhile;

		wp_reset_postdata();
	?>
	</section>
<?php endif; ?>