<?php
//Disable Automatic formatting in WordPress posts like <br><p> put after function remove_filter('the_content', 'my_formatter', 99); extract(shortcode_atts(array(), $atts)); source : http://theandystratton.com/2011/shortcode-autoformatting-html-with-paragraphs-and-line-breaks
function sch_my_formatter($content) {
	$new_content = '';
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);
	
	foreach ($pieces as $piece) {
		if (preg_match($pattern_contents, $piece, $matches)) {
			$new_content .= $matches[1];
		} else {
			$new_content .= wptexturize(wpautop($piece));
		}
	}
	return $new_content;
}

remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');

add_filter('the_content', 'sch_my_formatter', 99);
?>