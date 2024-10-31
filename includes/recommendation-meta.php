<?php 

	function sch_ninja_add_recommendation_metabox() {
    	if(get_option('schema_ninja_active')==1){
	    	add_meta_box('plugin-recommendation-box', 'Recommendation', 'sch_ninja_add_plugin_recommendation_box', 'recommendations', 'normal', 'default');
	    	add_meta_box('shortcode-area', 'Post Shortcode', 'sch_ninja_add_recommendation_shortcode_box', 'recommendations', 'side', 'high');
			add_meta_box('shortcode-area-side', 'Sidebar Shortcode', 'add_recommendation_shortcode_sidebar_box', 'recommendations', 'side', 'high');
		}
	}
	add_action( 'add_meta_boxes', 'sch_ninja_add_recommendation_metabox' );


	function sch_ninja_add_recommendation_shortcode_box(){
		global $post;
		echo '<input type="text" name="" value="[recommendation id='.esc_attr($post->ID).']"><span style="font-size:11px;color: #A7A7A7;display:block">Note:- Add shortcode between the tag (For eg. [recompostlist]
[recommendation id=56]
[recommendation id=57] [/recompostlist].<br><a target="_blank" href="http://www.bloggersideas.com/schemaninja-video-tutorials/"> Know more</a></span>';

	}
	// Sidebar Recommendation shortcode generator	
	function add_recommendation_shortcode_sidebar_box(){
	global $post;
		echo '<input type="text" name="" value="[recommendation_sidebar id='.$post->ID.']"><span style="font-size:11px;color: #A7A7A7;display:block">Note:- Add shortcode between the tag (For eg. [recomlist]
[recommendation_sidebar id='.$post->ID.']
[recommendation_sidebar id='.$post->ID.'2] [/recomlist]<a href="http://app.schemaninja.com"> Know more</a></span>';
	}
	
	add_filter( 'manage_recommendations_posts_columns', 'my_edit_recommendations_columns' ) ;

function my_edit_recommendations_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Recommendations post' ),
		'Clicks' => __( 'Affiliate link Click' ),
		'shortcode' => __( 'Recommendations Shortcode' ),
		'date' => __( 'Date' )
	);

	return $columns;
}
add_action( 'manage_recommendations_posts_custom_column', 'my_manage_recommendations_columns', 10, 2 );

function my_manage_recommendations_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {

		/* If displaying the 'duration' column. */
		case 'Clicks' :

			/* Get the post meta. */
			$Clicks =  get_option('sch_track_id'.$post->ID);

			/* If no duration is found, output a default message. */
			if ( empty( $Clicks ) )
				echo __( '0 Clicks' );

			/* If there is a duration, append 'minutes' to the text string. */
			else
				printf( __( '%s Clicks' ), $Clicks );

			break;

		/* If displaying the 'genre' column. */
		case 'shortcode' :

			/* Get the post meta. */
			$shortcode = '<input type="text" value="[recommendation id='.$post->ID.']">';

			/* If no duration is found, output a default message. */
			if ( empty( $shortcode ) )
				echo __( 'N/A' );

			/* If there is a duration, append 'minutes' to the text string. */
			else
				echo $shortcode ;

			break;

		/* Just break out of the switch statement for everything else. */
		default :
			break;
	}
}	
?>