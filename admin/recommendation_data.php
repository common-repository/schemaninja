<?php
//SAVE RECOMMENDED BOX SETTING
	function sch_ninja_save_plugin_recommendation_box($post_id,$post){
				$key='recommendation_price';
				$value=sanitize_text_field($_POST['recommendation_price']);
				if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
				update_post_meta($post->ID, $key, $value);
				} else { // If the custom field doesn't have a value
				// add_post_meta($post->ID, $key, $value);
				update_post_meta($post->ID, $key, $value);
				}
				// if(!$value) delete_post_meta($post->ID, $key);
				$key='recommendation_title1';
				$value=sanitize_text_field($_POST['recommendation_title1']);
				if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
				update_post_meta($post->ID, $key, $value);
				} else { // If the custom field doesn't have a value
				// add_post_meta($post->ID, $key, $value);
				update_post_meta($post->ID, $key, $value);
				}
				// if(!$value) delete_post_meta($post->ID, $key);
				$key='recommendation_trybtn';
				$value=sanitize_text_field($_POST['recommendation_trybtn']);
				if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
				update_post_meta($post->ID, $key, $value);
				} else { // If the custom field doesn't have a value
				// add_post_meta($post->ID, $key, $value);
				update_post_meta($post->ID, $key, $value);
				}
				// if(!$value) delete_post_meta($post->ID, $key);
				$key='recommendation_currency';
				$value=sanitize_text_field($_POST['recommendation_currency']);
				if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
				update_post_meta($post->ID, $key, $value);
				} else { // If the custom field doesn't have a value
				// add_post_meta($post->ID, $key, $value);
				update_post_meta($post->ID, $key, $value);
				}
				// if(!$value) delete_post_meta($post->ID, $key);
				$key='recommendation_rating';
				$value=sanitize_text_field($_POST['recommendation_rating']);
				if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
				update_post_meta($post->ID, $key, $value);
				} else { // If the custom field doesn't have a value
				// add_post_meta($post->ID, $key, $value);
				update_post_meta($post->ID, $key, $value);
				}
				// if(!$value) delete_post_meta($post->ID, $key);
				$key='recommendation_pros';
				$value=$_POST['recommendation_pros'];
				if(is_array($value)){
				foreach($value as $a=>$b){
				if(empty($b))
					unset($value[$a]);
				}
				}
				if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
				update_post_meta($post->ID, $key, $value);
				} else { // If the custom field doesn't have a value
				// add_post_meta($post->ID, $key, $value);
				update_post_meta($post->ID, $key, $value);
				}
				// if(!$value) delete_post_meta($post->ID, $key);
				$key='recommendation_cons';
				$value=$_POST['recommendation_cons'];
				if(is_array($value)){
				foreach($value as $a=>$b){
				if(empty($b))
				unset($value[$a]);
							}
						}
				if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
				update_post_meta($post->ID, $key, $value);
					} else { // If the custom field doesn't have a value
				// add_post_meta($post->ID, $key, $value);
				update_post_meta($post->ID, $key, $value);
					}
				// if(!$value) delete_post_meta($post->ID, $key);
				$key='recommendation_url';
				$value=esc_url($_POST['recommendation_url']);
				if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
				update_post_meta($post->ID, $key, $value);
				} else { // If the custom field doesn't have a value
				// add_post_meta($post->ID, $key, $value);
				update_post_meta($post->ID, $key, $value);
				}
				// if(!$value) delete_post_meta($post->ID, $key);
				$key='custom_url';
				$value=esc_url($_POST['custom_url']);
				if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
				update_post_meta($post->ID, $key, $value);
				} else { // If the custom field doesn't have a value
				// add_post_meta($post->ID, $key, $value);
				update_post_meta($post->ID, $key, $value);
				}
				// if(!$value) delete_post_meta($post->ID, $key);
				$key='rec_short_dec';
				$value=sanitize_text_field($_POST['rec_short_dec']);
				if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
				update_post_meta($post->ID, $key, $value);
				} else { // If the custom field doesn't have a value
				// add_post_meta($post->ID, $key, $value);
				update_post_meta($post->ID, $key, $value);
				}
				
				// if(!$value) delete_post_meta($post->ID, $key);
				$key='recommendation_ratings';
				$c=sanitize_text_field($_POST['rating_count']);
				for($i=0;$i<$c;$i++){
				if($_POST['recommendation_'.$i.'_metric']!=" "&&strlen(sanitize_text_field($_POST['recommendation_'.$i.'_metric']))>0		)	{
				$metrics['recommendation_'.$i.'_metric']=sanitize_text_field($_POST['recommendation_'.$i.'_metric']);
				$values['recommendation_'.$i.'_value']=sanitize_text_field($_POST['recommendation_'.$i.'_value']);
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
add_action('save_post', 'sch_ninja_save_plugin_recommendation_box', 1, 2); // save the custom fields
?>