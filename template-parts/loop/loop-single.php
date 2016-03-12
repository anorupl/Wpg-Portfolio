<?php
	// Start the loop.
	while ( have_posts() ) : the_post();
		// Include the page content template.
 
		 switch (get_post_type(get_the_ID())) {
			 case 'page':
				 		get_template_part( 'template-parts/content_single/content', 'page' );
				 
				 break;
			 case 'post_gallery':
				 		get_template_part( 'template-parts/content_single/content', 'gallery' );
				 
				 break;
			 case 'offer':
						get_template_part( 'template-parts/content_single/content', 'offer' );
				 
				 break;					 			 
			 default:
						get_template_part( 'template-parts/content_single/content', get_post_format()  );
				 
				 break;
		 }
		// End of the loop.
	endwhile;
?>