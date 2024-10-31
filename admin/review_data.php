<?php 
ob_start();
// SAVE REVIEW BOX SETTING 
	function sch_ninja_save_plugin_review_box($post_id,$post){
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
 	  return $post_id;
    }
    $key='review_title1';
	$value=sanitize_text_field($_POST['review_title1']);
	if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			// add_post_meta($post->ID, $key, $value);
			update_post_meta($post->ID, $key, $value);
		}
		
		$key='review_name';
	$value=sanitize_text_field($_POST['review_name']);
	if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			// add_post_meta($post->ID, $key, $value);
			update_post_meta($post->ID, $key, $value);
		}
		
        // if(!$value) delete_post_meta($post->ID, $key);
		$key='review_price';
		$value=sanitize_text_field($_POST['review_price']);
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
		// add_post_meta($post->ID, $key, $value);
			update_post_meta($post->ID, $key, $value);
		}
		// if(!$value) delete_post_meta($post->ID, $key);
		$key='review_title';
		$value=sanitize_text_field($_POST['review_title']);
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			// add_post_meta($post->ID, $key, $value);
			update_post_meta($post->ID, $key, $value);
	}
		// if(!$value) delete_post_meta($post->ID, $key);
		$key='review_position';
		$value=sanitize_text_field($_POST['review_position']);
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			// add_post_meta($post->ID, $key, $value);
			update_post_meta($post->ID, $key, $value);
		}
		// if(!$value) delete_post_meta($post->ID, $key);
		$key='review_currency';
		$value=sanitize_text_field($_POST['review_currency']);
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			// add_post_meta($post->ID, $key, $value);
			update_post_meta($post->ID, $key, $value);
		}
		// if(!$value) delete_post_meta($post->ID, $key);
		$key='review_show';
		$value=sanitize_text_field($_POST['review_show']);
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			// add_post_meta($post->ID, $key, $value);
			update_post_meta($post->ID, $key, $value);
		}
		// if(!$value) delete_post_meta($post->ID, $key);
		$key='review_rating';
		$value=sanitize_text_field($_POST['review_rating']);
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
	} else { // If the custom field doesn't have a value
		// add_post_meta($post->ID, $key, $value);
			update_post_meta($post->ID, $key, $value);
		}
		// if(!$value) delete_post_meta($post->ID, $key);
		$key='review_btn_text';
		$value=sanitize_text_field($_POST['review_btn_text']);
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			// add_post_meta($post->ID, $key, $value);
			update_post_meta($post->ID, $key, $value);
		}
		// if(!$value) delete_post_meta($post->ID, $key);
		$key='specs_btn_text';
		$value=sanitize_text_field($_POST['specs_btn_text']);
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
		update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
		// add_post_meta($post->ID, $key, $value);
			update_post_meta($post->ID, $key, $value);
		}
		// if(!$value) delete_post_meta($post->ID, $key);
		$key='summary_btn_text';
		$value=sanitize_text_field($_POST['summary_btn_text']);
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
		update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			// add_post_meta($post->ID, $key, $value);
			update_post_meta($post->ID, $key, $value);
		}
		// if(!$value) delete_post_meta($post->ID, $key);
		$key='try_btn_text';
		$value=sanitize_text_field($_POST['try_btn_text']);
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			// add_post_meta($post->ID, $key, $value);
			update_post_meta($post->ID, $key, $value);
		}
		// if(!$value) delete_post_meta($post->ID, $key);
		$key='review_url';
		$value=esc_url($_POST['review_url']);
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			// add_post_meta($post->ID, $key, $value);
			update_post_meta($post->ID, $key, $value);
		}
		// if(!$value) delete_post_meta($post->ID, $key);
		$key='review_summary';
		$value=sanitize_text_field($_POST['review_summary']);
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			// add_post_meta($post->ID, $key, $value);
			update_post_meta($post->ID, $key, $value);
		}
		// if(!$value) delete_post_meta($post->ID, $key);
		$key='review_numvotes';
		$value=sanitize_text_field($_POST['review_numvotes']);
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			// add_post_meta($post->ID, $key, $value);
			update_post_meta($post->ID, $key, $value);
		}
		// if(!$value) delete_post_meta($post->ID, $key);
		$key='review_pros';
		$value=$_POST['review_pros'];
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			for($i=0;$i<=count($value);$i++)
				if(empty($value[$i]))
					unset($value[$i]);
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
		for($i=0;$i<=count($value);$i++)
				if(empty($value[$i]))
				unset($value[$i]);
			// add_post_meta($post->ID, $key, $value);
			update_post_meta($post->ID, $key, $value);
	}
		// if(!$value) delete_post_meta($post->ID, $key);
		$key='review_cons';
		$value=$_POST['review_cons'];
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			for($i=0;$i<=count($value);$i++)
				if(empty($value[$i]))
					unset($value[$i]);
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			for($i=0;$i<=count($value);$i++)
			if(empty($value[$i]))
				unset($value[$i]);
		// add_post_meta($post->ID, $key, $value);
			update_post_meta($post->ID, $key, $value);
		}
		// if(!$value) delete_post_meta($post->ID, $key);
		$key='review_ratings';
		$c=sanitize_text_field($_POST['rating_count']);
		$metrics=array();
		$values=array();
		$j=0;
		for($i=0;$i<=$c;$i++){
			if($_POST['review_'.$i.'_metric']!=""){
				$metrics['review_'.$j.'_metric']=sanitize_text_field($_POST['review_'.$i.'_metric']);
				$values['review_'.$j.'_value']=sanitize_text_field($_POST['review_'.$i.'_value']);
				$j++;
			}
		}
		$arr=array();
		$arr['metrics']=$metrics;
		$arr['values']=$values;
		$value=json_encode($arr);
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			// add_post_meta($post->ID, $key, $value);
			update_post_meta($post->ID, $key, $value);
		}
		// if(!$value) delete_post_meta($post->ID, $key);
		$key='review_specs';
		$c=sanitize_text_field($_POST['spec_count']);
		$metrics=array();
		$values=array();
		$j=0;
		for($i=0;$i<=$c;$i++){
			if($_POST['spec_'.$i.'_metric']!=""){
			$metrics['spec_'.$j.'_metric']=sanitize_text_field($_POST['spec_'.$i.'_metric']);
			$values['spec_'.$j.'_value']=sanitize_text_field($_POST['spec_'.$i.'_value']);
				$j++;
			}
		}
		$arr=array();
		$arr['metrics']=$metrics;
		$arr['values']=$values;
		$value=json_encode($arr);
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			// add_post_meta($post->ID, $key, $value);
			update_post_meta($post->ID, $key, $value);
		}
		// if(!$value) delete_post_meta($post->ID, $key);
	}
add_action('pre_post_update', 'sch_ninja_save_plugin_review_box' ,1,2); // save the custom fields
add_action('save_post', 'sch_ninja_save_plugin_review_box' ,1,2); // save the custom fields
?>