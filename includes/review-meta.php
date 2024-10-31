<?php 

function sch_ninja_add_review_metabox() {
		if(get_option('schema_ninja_active')==1){
			$post_types = array ( 'post', 'page', 'event' );
	    	add_meta_box('plugin-review-box', 'Review', 'sch_ninja_add_plugin_review_box', $post_types, 'normal', 'default');
			add_meta_box('shortcode-area', 'Shortcode', 'sch_ninja_add_plugin_shortcode_box', 'reviews', 'side', 'high');
		}
	}
add_action( 'add_meta_boxes', 'sch_ninja_add_review_metabox' ); 

	function sch_ninja_add_plugin_shortcode_box(){
	global $post;
		echo '<input type="text" name="" value="[review id='.esc_attr($post->ID).']">';
			}

?>