<?php
 /**
 * Custom functions that act independently of the theme.
 *
 * Some of the functionality here could be replaced by core features:
 * Function for body style
 *	 - wpg_body_class()
 *	 - wpg_search_form()
 *	 - wrap_embed_with_div()
 *	 - add_video_wmode_transparent()
 *	 - wpg_widget_nav_menu()
 *	 - wpg_modify_read_more_link()
 *	 - wpg_excerpt_more()
 *	 - wpg_remove_in_sticky()
 *==========================================
 * Function for content
 *	 - wpg_excerpt_length()
 *	 - wpg_no_title()
 *
 * @package WPG
 * @since WPG Theme 1.0.0
 */



/**
 * Adds custom classes to the array of body classes.
 *
 * @since 	1.0.0
 * @see 	Function Reference/body class
 * @link 	https://codex.wordpress.org/Function_Reference/body_class
 *
 * @param 	array $classes Classes for the body element.
 */
function wpg_body_class($class) {
	if(is_front_page() && !is_paged()) {
		$class[] = 'over-slider';
	}
	else {
		$class[] = 'fixed-header';
	}

	if (is_singular()){
		$class[] = 'singular';
	}
	// return the $class array
	return $class;
}
add_filter( 'body_class', 'wpg_body_class' );



/**
 * Filtr replace default search.
 *
 * @since 	1.0.0
 * @see 	Function Reference/get search form
 * @link 	https://codex.wordpress.org/Function_Reference/get_search_form
 *
 * @param 	string $form html. Code with search form.
 * @return  string
 */
function wpg_search_form( $form ) {
	$form = '<form role="search" method="get" class="searchform" action="' . home_url( '/' ) . '">
	<label for="s" class="screen-reader-text">' . __( 'Search for:','wpg_theme' ) . '</label>
	<input class="field" name="s"  id="s" type="text" value="' . get_search_query() . '" placeholder="'. __( 'Search','wpg_theme' ) .'">
	<button type="submit" class="submit" name="searchsubmit" id="searchsubmit" value="'. esc_attr__( __( 'Search','wpg_theme' ) ) .'"><i class="icon-search"></i></button>
	</form>';

	return $form;
}
add_filter( 'get_search_form', 'wpg_search_form' );

/**
 * Filtr add responsive container to video embeds.
 *
 * @since 	1.0.0
 * @param 	string $html Code of player
 * @param 	string $url Link to embeds providers.
 * @return 	string
 */
function wrap_embed_with_div($html, $url='') {

	$wrapped = '<div class="fluid-width-video-wrapper">' . $html . '</div>';

	if ( empty( $url ) && 'video_embed_html' == current_filter() ) { // Jetpack
		$html = $wrapped;
	} elseif ( !empty( $url ) ) {
		$players = array( 'youtube', 'youtu.be', 'vimeo', 'dailymotion', 'hulu', 'blip.tv', 'wordpress.tv', 'viddler', 'revision3' );
		foreach ( $players as $player ) {
			if ( false !== strpos( $url, $player ) ) {
					$html = $wrapped;
				break;
			}
		}
	}
		return $html;
}
add_filter( 'embed_oembed_html', 'wrap_embed_with_div', 10, 3 );
add_filter( 'video_embed_html', 'wrap_embed_with_div' ); // Jetpack


/**
 * Filtr add wmode transparent to video embeds.
 *
 * @since 	1.0.0
 * @param 	string $html Code of player.
 * @param 	string $url Link to embeds providers.
 * @param	array $attr.
 *
 * @return 	string
 */
function add_video_wmode_transparent($html, $url, $attr) {

if ( strpos( $html, "<embed src=" ) !== false )
   { return str_replace('</param><embed', '</param><param name="wmode" value="opaque"></param><embed wmode="opaque" ', $html); }
elseif ( strpos ( $html, 'feature=oembed' ) !== false )
   { return str_replace( 'feature=oembed', 'feature=oembed&wmode=opaque', $html ); }
else
   { return $html; }
}
add_filter( 'embed_oembed_html', 'add_video_wmode_transparent', 10, 3);


/**
 * Filtr set default container for widget menu
 *
 * @since 	1.0.0
 * @see 	Filter the arguments for the Custom Menu widget
 * @link	https://developer.wordpress.org/reference/hooks/widget_nav_menu_args/
 */
function wpg_widget_nav_menu($nav_menu_args, $nav_menu, $args) {
		$args = array(
			'container' => 'nav',
		);
		return $args;
}
add_filter( 'widget_nav_menu_args', 'wpg_widget_nav_menu', 10, 3 );


/**
 * Change default Read More link in the content.
 *
 * @since 	WPG Theme 1.0.0
 *
 * @return string $link.
 */
function wpg_modify_read_more_link() {

		$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
					esc_url( get_permalink() ),
					/* translators: %s: Name of current post */
					sprintf( __( 'Continue reading %s', 'wpg_theme' ), '<span class="screen-reader-text">, ' . get_the_title() . '</span>' )
		);
		return $link;
}
add_filter( 'the_content_more_link', 'wpg_modify_read_more_link' );



if ( !is_admin() ) :
/**
 * Change default Read More link "[...]" in generated excerpts.
 *
 * @since 	1.0.0
 *
 * @return 	string $link
 */
function wpg_excerpt_more( $more ) {

		$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
					esc_url( get_permalink( get_the_ID() ) ),
					/* translators: %s: Name of current post */
					sprintf( __( 'Continue reading %s', 'wpg_theme' ), '<span class="screen-reader-text">, ' . get_the_title( get_the_ID() ) . '</span>' )
				);
		return $link;
}
//add_filter( 'excerpt_more', 'wpg_excerpt_more' );
endif; //wpg_excerpt_more


/**
 * Remove in main_query first sticy post.
 *
 * @since 1.0.0
 * @param Object $query is passed to function by reference
 */
function wpg_remove_in_sticky( $query ) {

   if ( $query->is_main_query() ) {

	   $sticky = get_option('sticky_posts') ;
	   $post_to_exclude[] = end($sticky);

	   $query->set('ignore_sticky_posts', 1);
	   $query->set('post__not_in', $post_to_exclude);

	}
}
add_action( 'pre_get_posts', 'wpg_remove_in_sticky' );



/*
 * Function for content
 *==========================================*/

/**
 * Filtr change length excerpt.
 *
 * Change length in main_query to 19 in other is 55.
 *
 * @since 1.0.0
 *
 * @param int $length
 */
function wpg_excerpt_length( $length ) {
		if (is_main_query())
		return 19;
		else
		return 55;
}
add_filter( 'excerpt_length', 'wpg_excerpt_length', 999 );


/**
 * Filtr mark Posts/Pages as Untiled when no title is used
 *
 * @since 	1.0.0
 * @param 	string $title
 * @return 	string
 */
function wpg_no_title( $title ) {


  return $title == '' ? __('Untitled', 'wpg_theme') : $title;
}
add_filter( 'the_title', 'wpg_no_title' );




// Wyświetlanie załaczników typu pdf,rar,zip,exel,word,powerpoint, openoffice, txt
add_filter( 'the_content', 'my_the_content_filter' );
function my_the_content_filter( $content ) {

	global $post;

	if ( is_single() && $post->post_type == 'post' || is_page_template('page-templates/page-attachments.php')  ) {

	$attachments = get_posts( array(
		'post_type' => 'attachment',
		'post_mime_type' => 'application/zip, application/rar, application/pdf, text/plain, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.ms-powerpoint, application/vnd.openxmlformats-officedocument.presentationml.presentation, application/vnd.openxmlformats-officedocument.presentationml.template, application/vnd.oasis.opendocument.text, application/vnd.oasis.opendocument.presentation, application/vnd.oasis.opendocument.spreadsheet',
		'posts_per_page' => '-1',
		'post_parent' => $post->ID
	));


	if ( $attachments ) {
		$content .= '<div tabindex="0" id="section-attachments"><span class="class-h3">'. __('Attachments','wpg_theme').'</span><ul class="post-attachments">';

			foreach ( $attachments as $attachment ) {
			$class = "post-attachment mime-" . sanitize_title( $attachment->post_mime_type );

			$type = $attachment->post_mime_type;

			switch ($type) {
				case 'application/zip':
					$type = 'Archiwum ZIP';
					break;
				case 'application/rar':
					$type = 'Archiwum RAR';
					break;
				case ('application/msword'):
					$type = 'Dokument <span lang="en">Microsoft Word</span>';
					break;
				case ('application/vnd.openxmlformats-officedocument.wordprocessingml.document'):
					$type = 'Dokument <span lang="en">Microsoft Word</span>';
					break;
				case ('application/vnd.ms-powerpoint'):
					$type = 'Dokument <span lang="en">Microsoft Powerpoint</span>';
					break;
				case ('application/vnd.openxmlformats-officedocument.presentationml.presentation'):
					$type = 'Dokument <span lang="en">Microsoft Powerpoint</span>';
					break;
				case ('application/vnd.ms-excel'):
					$type = 'Dokument <span lang="en">Microsoft Excel 2007</span>';
					break;
				case ('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'):
					$type = 'Dokument <span lang="en">Microsoft Excel 2003</span>';
					break;
				case 'application/vnd.oasis.opendocument.text':
					$type = 'Dokument Tekstowy <span lang="en">Open office</span>';
					break;
				case 'application/vnd.oasis.opendocument.spreadsheet':
					$type = 'Arkusz kalkulacyjny <span lang="en">Open office</span>';
					break;
				case 'application/vnd.oasis.opendocument.presentation':
					$type = 'Prezentacja <span lang="en">Open office</span>';
					break;
				case 'text/plain':
					$type = 'Dokument tekstowy';
					break;
				case 'application/pdf':
					$type = 'Dokument PDF';
					break;
				default:
					$type = null;
					break;
			}


			$url 	= $attachment->guid;
			$title 	= $attachment->post_title;

			$size 	= size_format(	filesize( 	get_attached_file( $attachment->ID ) 	), 1);
			$size 	= str_replace(' B',__('bytes', 'wpg_theme'),$size);

			$content .= '<li class="' . $class . '"><a title="'. __('Download attachment', 'wpg_theme').'" href="'. $url .'">' . $title . '<br><span class="attachment-info">('.$type .', Rozmiar '. $size .')</span></a></li>';

			}
	$content .= '</ul></div>';
	}}
return $content;
}

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );