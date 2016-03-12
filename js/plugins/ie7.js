/* To avoid CSS expressions while still supporting IE 7 and IE 6, use this script */
/* The script tag referencing this file must be placed before the ending body tag. */

/* Use conditional comments in order to target IE 7 and older:
	<!--[if lt IE 8]><!-->
	<script src="ie7/ie7.js"></script>
	<!--<![endif]-->
*/

(function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'icomoon\'">' + entity + '</span>' + html;
	}
	var icons = {
		'icon-info': '&#xe600;',
		'icon-file': '&#xe900;',
		'icon-expand': '&#xe901;',
		'icon-collapse': '&#xe902;',
		'icon-pictures': '&#xe903;',
		'icon-folder': '&#xe92f;',
		'icon-folder-open': '&#xe930;',
		'icon-price-tag': '&#xe935;',
		'icon-price-tags': '&#xe936;',
		'icon-clock': '&#xe94e;',
		'icon-clock-full': '&#xe94f;',
		'icon-box-add': '&#xe95e;',
		'icon-bubbles': '&#xe96c;',
		'icon-bubbles2': '&#xe96d;',
		'icon-bubbles3': '&#xe96f;',
		'icon-bubbles4': '&#xe970;',
		'icon-user2': '&#xe971;',
		'icon-users': '&#xe972;',
		'icon-quotes-left': '&#xe977;',
		'icon-quotes-right': '&#xe978;',
		'icon-lock2': '&#xe98f;',
		'icon-unlocked': '&#xe990;',
		'icon-bookmark2': '&#xe9d2;',
		'icon-bookmarks': '&#xe9d3;',
		'icon-checkbox-checked': '&#xea52;',
		'icon-checkbox-unchecked': '&#xea53;',
		'icon-google-plus2': '&#xea89;',
		'icon-facebook2': '&#xea8d;',
		'icon-twitter2': '&#xea92;',
		'icon-feed2': '&#xea94;',
		'icon-feed3': '&#xea95;',
		'icon-youtube': '&#xea97;',
		'icon-youtube3': '&#xea99;',
		'icon-vimeo2': '&#xea9d;',
		'icon-picassa2': '&#xeaa5;',
		'icon-deviantart2': '&#xeaac;',
		'icon-github5': '&#xeab5;',
		'icon-linkedin': '&#xeac8;',
		'icon-pinterest2': '&#xead1;',
		'icon-pencil': '&#xe904;',
		'icon-quill': '&#xe905;',
		'icon-star-full': '&#xe906;',
		'icon-search': '&#xf002;',
		'icon-user': '&#xf007;',
		'icon-check': '&#xf00c;',
		'icon-close': '&#xf00d;',
		'icon-search-plus': '&#xf00e;',
		'icon-search-minus': '&#xf010;',
		'icon-home': '&#xf015;',
		'icon-align-justify': '&#xf039;',
		'icon-map-marker': '&#xf041;',
		'icon-chevron-left': '&#xf053;',
		'icon-chevron-right': '&#xf054;',
		'icon-question-circle': '&#xf059;',
		'icon-calendar': '&#xf073;',
		'icon-chevron-up': '&#xf077;',
		'icon-chevron-down': '&#xf078;',
		'icon-camera-retro': '&#xf083;',
		'icon-external-link': '&#xf08e;',
		'icon-phone-square': '&#xf098;',
		'icon-chain': '&#xf0c1;',
		'icon-paperclip': '&#xf0c6;',
		'icon-envelope': '&#xf0e0;',
		'icon-angle-left': '&#xf104;',
		'icon-angle-right': '&#xf105;',
		'icon-angle-up': '&#xf106;',
		'icon-angle-down': '&#xf107;',
		'icon-file-o': '&#xf016;',
		'icon-image': '&#xf03e;',
		'icon-photo': '&#xf03e;',
		'icon-picture-o': '&#xf03e;',
		'icon-event_note': '&#xe616;',
		'0': 0
		},
		els = document.getElementsByTagName('*'),
		i, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
}());
