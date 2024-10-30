<?php
/*
Plugin Name: [livebooklet]
Plugin URI: https://livebooklet.com/wordpress/livebooklet
Description: [livebooklet src="{booklet embed url}" width="{booklet width}" height="{booklet height}"] shortcode
Version: 1.0
Author: Livebooklet
Author Email: support(at)livebooklet.com
Author URI: http://livebooklet.com/
*/

if ( !function_exists( 'livebooklet_embed_shortcode' ) ) :

	function livebooklet_enqueue_script() {
		wp_enqueue_script( 'jquery' );
	}
	add_action('wp_enqueue_scripts', 'livebooklet_enqueue_script');
	
	function livebooklet_embed_shortcode($atts, $content = null) {
		$html = '';
        $html .= "\n".'<!-- livebooklet plugin v.1.0 (wordpress.org/extend/plugins/livebooklet/) -->'."\n";
		$html .= '<iframe class="livebooklet_iframe" scrolling="no" frameborder="0" style="border: 0px; overflow: hidden;" ';
        foreach ($atts as $attr => $value) {
			switch ($attr) {
        		case "src" : $html .= " src=\"$value\""; break;
        		case "width" : $html .= " width=\"$value\""; break;
        		case "height" : $html .= " height=\"$value\""; break;
			}
		}
		$html .= '></iframe>';

		return $html;
	}
	add_shortcode('livebooklet', 'livebooklet_embed_shortcode');
	
endif;
