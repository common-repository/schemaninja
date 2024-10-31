<?php 
	   function sch_ninja_reg_review_post_type() {       	
	    $labels = array(
	        'name' => 'Recommendations',
	        'singular_name' => 'Recommendation',
	        'add_new' => 'Add New',
	        'add_new_item' => 'Add New Recommendation',
	        'edit_item' => 'Edit Recommendation',
	        'new_item' => 'New Recommendation',
	        'all_items' => 'All Recommendations',
	        'view_item' => 'View Recommendation',
	        'search_items' => 'Search Recommendations',
	        'not_found' =>  'No Recommendations Found',
	        'not_found_in_trash' => 'No Recommendations found in Trash',
	        'parent_item_colon' => '',
	        'menu_name' => 'Recommendations',
	    );
	    register_post_type(
	        'recommendations',
							array(
								'labels' => $labels,
								'has_archive' => true,
								'public' => true,
								'supports' => array( 'title','thumbnail' ),
								'exclude_from_search' => false,
								'capability_type' => 'post',
	            'register_meta_box_cb' => 'sch_ninja_add_recommendation_metabox',
	            'publicly_queryable'  => true,	          
	        )
	    );
	}
	add_action( 'init', 'sch_ninja_reg_review_post_type' );
	
include( SCH_PLUGIN_PATH . 'includes/recommendation-meta.php');
		
		function sch_ninja_add_plugin_recommendation_box(){
		global $post;
        $price = get_post_meta($post->ID, 'recommendation_title1', true);
		$price = get_post_meta($post->ID, 'recommendation_price', true);
		$rating=	get_post_meta($post->ID, 'recommendation_rating', true);
		$pros=get_post_meta($post->ID, 'recommendation_pros', true);
		$cons=get_post_meta($post->ID, 'recommendation_cons', true);
		$specs=get_post_meta($post->ID, 'recommendation_specs', true);
		$url=get_post_meta($post->ID, 'recommendation_url', true);
		$custom_url=get_post_meta($post->ID, 'custom_url', true);
		$rec_short_dec=get_post_meta($post->ID, 'rec_short_dec', true);
		$ratings=get_post_meta($post->ID, 'recommendation_ratings', true);
		$trybtn=get_post_meta($post->ID, 'recommendation_trybtn', true);
		$curr=get_post_meta($post->ID, 'recommendation_currency', true);	
		if(strlen($ratings)>5){
			$ratings=json_decode($ratings,true);
		}
		$i=0;$j=0;
		$pros_count=$cons_count=0;
		include( SCH_PLUGIN_PATH . 'templates/recommendation_admin_metabox.php');
	}
	include( SCH_PLUGIN_PATH . 'admin/recommendation_data.php');
	include( SCH_PLUGIN_PATH . 'templates/recommendation_template.php');
	include( SCH_PLUGIN_PATH . 'templates/sidebar_template.php');
	?>