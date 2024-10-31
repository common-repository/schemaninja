<?php
//sidebar recommendation box
function recommendation_list_display($atts,$content=null){
	return '<div class="recommendations-list"><div class="sch_sidebar_headding"><div class="sch_w-30">'.get_option('recommendation_sidebar1').'</div><div class="sch_w-40">'.get_option('recommendation_sidebar2').'</div><div class="sch_w-30">'.get_option('recommendation_sidebar3').'</div><div class="clear" style="margin:0"></div></div>'.do_shortcode($content).'</div>';
}
function display_sidebar($atts){
	$post=get_post($atts['id']);
	$price = get_post_meta($post->ID, 'recommendation_price', true);
	$rating= get_post_meta($post->ID, 'recommendation_rating', true);
	$specs=get_post_meta($post->ID, 'recommendation_specs', true);
	$url=get_post_meta($post->ID, 'recommendation_url', true);
	$ratings_arr=json_decode(get_post_meta($post->ID, 'recommendation_ratings', true),true);
	$ratings="";
	$trybtn=get_post_meta($post->ID,'recommendation_trybtn',true);
	if(empty($trybtn))
		$trybtn=get_option('recommendation_trybtn');
	if(empty($trybtn))
		$trybtn="Try Now!";
	if(is_array($ratings_arr)){
		$c=count($ratings_arr['metrics']);
		for($i=0;$i<$c;$i++){
			$mval=$ratings_arr['values']['recommendation_'.$i.'_value'];
			$star_rating=($mval);
			$stars="";
			for($k=0;$k<round($star_rating,0,PHP_ROUND_HALF_DOWN);$k++)
				$stars.='<span class="star on"></span>';
			if (strpos($star_rating,".") !== false) 
				$stars.='<span class="star half"></span>';
			$ratings.='<div>'.$ratings_arr['metrics']['recommendation_'.$i.'_metric'].' '.$stars.'</div>';
		}
}
	$stars="";
	 for($x=1;$x<=$rating;$x++) {
      $stars.='<span class="star on"></span>';
    }
    if (strpos($rating,'.')) {
        $stars.='<span class="star half"></span>';
        $x++;
    }
    while ($x<=5) {
        $stars.='<span class="star off"></span>';
        $x++;
    }
	if(is_numeric($rating)){
	$html='<div class="recommendation-box-side">
	<div class="sch_sidebar_out">
    <div class="sch_sidebar">
    <div class="sch_sidebar_box1"><img src="'.get_the_post_thumbnail_url( $post->ID, full).'"></div>
	<div class="sch_sidebar_box sch_w-40">
		<div>'.$post->post_title.'</div>
		<div>'.$stars.'</div>
		<div>'.$price.'</div>
	</div>
    <div class="sch_sidebar_box1" style="margin-top: 7%;">
	<a href="'.$url.'" class="rec_product_button" rel="nofollow" target="_blank">'.$trybtn.'</a>
	</div>
	</div>
	<div class="clear" style="margin:0"></div>
	</div>						
	</div>';
		}else
			$html="";
		return $html;
}
add_shortcode( 'recommendation_sidebar', 'display_sidebar' );
add_shortcode('recomlist','recommendation_list_display');
?>