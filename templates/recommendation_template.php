<?php
function sch_ninja_add_recommendation_display($postcontent){
	global $post;
	if($post->post_type=='post'){
	if(get_option('sch_ninja_recommendation_list')!="0"){
		$arr=json_decode(get_option('sch_ninja_recommendation_list'),true);
		$html='<h2><div class="recommendation-list"><div class="list-title">'.get_option('sch_ninja_recommendation_title').'</div></div></h2>';
		if(is_array($arr)){
			foreach($arr as $s){
				$atts['id']=$s;
				$html.=sch_ninja_display_recommendation($atts);
			}
		}
		if(get_option('sch_ninja_recommendation_position')=="top"){
			return $html.$postcontent;
		}
		else
			return $postcontent.$html;
		}
		else
			return $postcontent;
		}else{
		return $postcontent;
	}
}
add_filter('the_content', 'sch_ninja_add_recommendation_display');

add_filter( 'get_the_excerpt', 'schema_excerpt_clean_up', 1 );

/**
 * Register handler for auto-generated excerpt.
 *
 * @wp-hook get_the_excerpt
 * @param   string $excerpt
 * @return  string
 */
function schema_excerpt_clean_up( $excerpt )
{
    if ( ! empty ( $excerpt ) )
        return $excerpt;

    add_filter( 'the_content', 'schema_excerpt_content' );

    return $excerpt;
}
/**
 * Strip parts from auto-generated excerpt.
 *
 * @wp-hook the_content
 * @param   string $content
 * @return  string
 */
function schema_excerpt_content( $content )
{
    // Remove immediately; maybe the next post doesn't 
    // use an excerpt, but the full content.
    remove_filter( current_filter(), __FUNCTION__ );

    // Fails with nested tables. Just don't do that. :)    
    return preg_replace( '~<(div).*</\1>~ms', '', $content );
}


function recommendation_post_list_display($atts,$content=null){
	return '<div class="recommendations-list"><div class="recommendation-title">'.get_option('sch_ninja_recommendation_title').'</div>'.do_shortcode($content).'</div>';
}
add_shortcode('recompostlist','recommendation_post_list_display');
//FOR RECOMMENDATION 
add_shortcode( 'recommendation', 'sch_ninja_display_recommendation' );
function sch_ninja_display_recommendation($atts){
				$post=get_post($atts['id']);
				$price = get_post_meta($post->ID, 'recommendation_price', true);
				$rating=	get_post_meta($post->ID, 'recommendation_rating', true);
				$pros=get_post_meta($post->ID, 'recommendation_pros', true);
				$cons=get_post_meta($post->ID, 'recommendation_cons', true);
				$specs=get_post_meta($post->ID, 'recommendation_specs', true);
				$url=get_post_meta($post->ID, 'recommendation_url', true);
				$rec_short_dec=get_post_meta($post->ID, 'rec_short_dec', true);
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
	 for($x=1;$x<=$star_rating;$x++) {
      $stars.='<span class="star on"></span>';
    }
    if (strpos($star_rating,'.')) {
        $stars.='<span class="star half"></span>';
        $x++;
    }
    while ($x<=5) {
        $stars.='<span class="star off"></span>';
        $x++;
    }
		$ratings.='<div class="rcm-border-bottom"><div class="rcm-rating-parameter-text"><i class="fa fa-caret-right"></i>'.$ratings_arr['metrics']['recommendation_'.$i.'_metric'].'</div><div class="rcm-rating-parameter-star">'.$stars.'</div></div>';
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
$p="";
if(is_array($pros))
foreach($pros as $pro)
	$p.='<li>'.$pro.'</li>';
	$c="";
if(is_array($cons))
foreach($cons as $con)
	$c.='<li>'.$con.'</li>';
	if(is_numeric($rating)){
$trybtn=get_post_meta($post->ID,'recommendation_trybtn',true);
	if(empty($trybtn))
		$trybtn=get_option('recommendation_trybtn');
	if(empty($trybtn))
		$trybtn="Try Now!";
	$html='<div class="recommendation-box">
				<div class="recommendation-box-tile">
					<div class="title-rating-div">
						<div class="rcm-spanboxtotal">
							<div class="rcm-span30 rcm-title-div">
								<div class="rcm-title rcm-border-bottom">
										'.$post->post_title.'
								</div>
								<div class="rcm-thumbnail">
									'.get_the_post_thumbnail( $post->ID, 'medium' ).'
								</div>
								<div>
									'.$stars.'
								</div>
								<div style="padding: 0px 10px;">
									<a href="'.$url.'" class="rec_product_button" rel="nofollow" target="_blank"><i class="fa fa-shopping-cart" style="
    margin-right: 10px;
    margin-top: -5px;
"></i>'.$trybtn.'</a>
								</div>
						</div>
						<div class="rcm-span40 sch_rating-div">							
								<div class="rcm-metric-ratings">
									'.$ratings.'
								</div>							
						</div>
						<div class="rcm-span30 pro-con-div" style="font-size:16px;">
						<div class="rcm-bord">
						<p class="sch_review_pros_thumb"><i class="fa fa-thumbs-up"></i>Pros</p> <ul class="sch_review_pc">'.$p.'</ul><br/>
						<div style="margin-top:8px">
						<div>
						<p style="color:red"><i class="fa fa-thumbs-down"></i>Cons</p> <ul class="sch_review_pc">'.$c.'</ul>
					</div>							
				</div>
			</div>	
		</div>
		</div><div class="clear"></div>
		</div>
	</div>			
</div>';
}else
$html="";
return $html;
}
?>