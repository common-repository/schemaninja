<?php
//REVIEW BOX DISPLAY
	function sch_ninja_display_review($postcontent){
		global $post;
	$review=$post;
	if(get_post_meta($review->ID,'review_show',true)=="on"){
		$reviewprice = get_post_meta($review->ID,'review_price',true);
	if(!empty($reviewprice)){
		$price='Price:'.get_post_meta($review->ID,'review_currency',true).get_post_meta($review->ID,'review_price',true);
		}
	$pros_arr=get_post_meta($review->ID,'review_pros',true);
	$pros="";
	if(is_array($pros_arr)){
		foreach($pros_arr as $val)
			$pros.='<li>'.$val.'</li>';
	}
	$cons_arr=get_post_meta($review->ID,'review_cons',true);
	$cons="";
	if(is_array($cons_arr)){
		foreach($cons_arr as $val)
			$cons.='<li>'.$val.'</li>';
	}
	$specs=get_post_meta($review->ID,'review_specs',true);
	if(strlen($specs)>5)
		$specs_arr=json_decode($specs,true);
	$specs="0";
	if(is_array($specs_arr)){
		$specs="";
		$c=count($specs_arr['metrics']);
		for($i=0;$i<$c;$i++){
			$specs.='<div class="spec-span30"><div class="spec-title">'.$specs_arr['metrics']['spec_'.$i.'_metric'].'</div><div class="spec-sub">'.$specs_arr['values']['spec_'.$i.'_value'].'</div></div>';
		}
		if(empty($specs_arr['metrics']))
			$specs="0";
	}
	$ratings=get_post_meta($review->ID,'review_ratings',true);
	if(strlen($ratings)>5)
		$ratings_arr=json_decode($ratings,true);
	$ratings="";
	if(is_array($ratings_arr)){
		$c=count($ratings_arr['metrics']);
		for($i=0;$i<$c;$i++){
			$m_r_val=$ratings_arr['values']['review_'.$i.'_value'];
			$m_s_val=str_replace(".","",$m_r_val);
			if($m_s_val<=10){
			$mval=$m_s_val.'0';
			}else{
				$mval=$m_s_val;
			}
			$ratings.='<div class="rating-divs"><div class="c100 p'.$mval.' '.(($m_r_val>7&&$m_r_val<=10)?"green":(($m_r_val<=4)?"orange":"")).'"><p>'.$m_r_val.'</p><div class="slice"><div class="bar"></div><div class="fill"></div></div></div><div>'.$ratings_arr['metrics']['review_'.$i.'_metric'].'</div></div>';
		}
	}
	$overall_rating=get_post_meta($review->ID,'review_rating',true);
	$star_rating=($overall_rating/2);
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
	
	if(empty($rvbtn))
		$rvbtn=get_option('review_btn_text');
	if(empty($rvbtn))
		$rvbtn="Review";
	$title1=get_post_meta($review->ID,'review_title1',true);
	if(empty($title1))
		$title1=get_option('review_title1');
	if(empty($title1))
		$title1="product title";
	$specbtn=get_post_meta($review->ID,'specs_btn_text',true);
	if(empty($specbtn))
		$specbtn=get_option('specs_btn_text');
	if(empty($specbtn))
		$specbtn="Specs";
	$sumbtn=get_post_meta($review->ID,'summary_btn_text',true);
	if(empty($sumbtn))
		$sumbtn=get_option('summary_btn_text');
	if(empty($sumbtn))
		$sumbtn="Summary";
	$position=get_post_meta($review->ID,'review_position',true);
	$trybtn=get_post_meta($review->ID,'try_btn_text',true);
	if(empty($trybtn))
		$trybtn=get_option('try_btn_text');
	if(empty($trybtn))
		$trybtn="Try Now!";
	$author=get_the_author_meta( 'display_name');
	$url=get_post_meta($review->ID,'review_url',true);
	if(!empty($url))
		$tryoutbtn='<a href="'.$url.'" class="rec_product_button" target="_blank" rel="nofollow"><i class="fa fa-shopping-cart" style="
    margin-right: 10px;
    margin-top: -5px;
"></i>'.$trybtn.'</a>';
	if(is_numeric($overall_rating)){
	$html='<div class="plugin_review_container">
		<div class="image">
		</div>
		<div class="title-section">
		<div class="title">
		'.get_post_meta($review->ID,'review_title',true).'
		</div>
		<div class="clear"></div>
		<div class="review-navigation-mobile">
					<div class="review-mbnav-container">
						<div class="review-tab-btn left-round actv-tab-btn" tab-id="review">
							'.$rvbtn.'
						</div>'.(($specs!="0")?'<div class="review-tab-btn " tab-id="specifications">
							'.$specbtn.'
						</div>':"")						
						.'<div class="review-tab-btn right-round" tab-id="summary">
							'.$sumbtn.'
						</div>
					</div>
				</div>
				<div class="review-content">
					<div class="review-navigation">
						<ul class="review-tabs-btns">
							<li class="review-tab-btn actv-tab-btn" tab-id="review">
								'.$rvbtn.'
							</li>'.
							(($specs!="0")?'<li class="review-tab-btn" tab-id="specifications">
								'.$specbtn.'
							</li>':"")
							.'<li class="review-tab-btn" tab-id="summary">
								'.$sumbtn.'
							</li>
						</ul>
					</div>
					<div class="review-cntnt-area" id="review" style="display:block">
					<div class="ratings-area">'.$ratings.'</div><div class="clear"></div>
					<div class="pros-cons-area">
							<div class="pros">
							<p class="title"><i class="fa fa-thumbs-up"></i>Pros</p>
								<ul>
								'.$pros.'
								</ul>
							</div>
							<div class="cons">
								<p class="title"><i class="fa fa-thumbs-down"></i>Cons</p>
								<ul>
									'.$cons.'
								</ul>
							</div>
						</div>
					</div>
					<div class="review-cntnt-area" id="specifications" style="display:none">
						'.$specs.'
					</div>
					<div class="review-cntnt-area" id="summary" style="display:none">
						<div class="title">
							'.get_post_meta($review->ID,'review_title',true).'
						</div>
						<div class="summary-text">
							'.get_post_meta($review->ID,'review_summary',true).'
						</div>												
					</div>
					<div class="footer-rating-area">
					<div class="sch-rating-score"><div>'.$price.'</div><div><span class="sch-review-score-text">Our Score</span><span class="sch-rating-star">'.$stars.'</span> '.$overall_rating.'/10</div><div class="sch-review-date"><span class="dateModified">Last modified: '.get_the_modified_date('F j, Y',false,$review->ID).'</span></div>
					</div><div class="sch-rating-button"><div>'.$tryoutbtn.'</div></div></div></div>
				</div>
			<div class="clear"></div>
							
			</div>			
			<script>
			jQuery(".review-tab-btn").click(function(){
				jQuery(".review-tab-btn").removeClass("actv-tab-btn");
				jQuery(this).addClass("actv-tab-btn");
				jQuery(".review-cntnt-area").hide();
				jQuery("#"+jQuery(this).attr("tab-id")).show();
			});
			</script>';
	}
		else{
		$html="";
		}
	if($position=="top"){
		return $html.$postcontent;
	}
	else	
	return $postcontent.$html;
	}
	else
	return $postcontent;
}
add_filter('the_content', 'sch_ninja_display_review');
function sch_ninja_footer_content(){
		global $post;
		$review=$post;
		$final_numvotes = htmlspecialchars(get_post_meta($review->ID,'review_numvotes',true),ENT_COMPAT);

		if($final_numvotes == "" || $final_numvotes == null || $final_numvotes == " ") {
			$final_numvotes = 2;
		}
		else {
			$final_numvotes = htmlspecialchars(get_post_meta($review->ID,'review_numvotes',true),ENT_COMPAT);
		}


	if(get_post_meta($review->ID,'review_show',true)=="on"){
		$author=get_the_author_meta( 'display_name');
		echo '<script type="application/ld+json">
			{
			  "@context": "http://schema.org/",
			  "@type": "Product",
              "name": "'.htmlspecialchars(get_post_meta($review->ID,'review_title',true),ENT_COMPAT).'",
              "description":"'.htmlspecialchars(get_post_meta($review->ID,'review_summary',true),ENT_COMPAT).'",
              "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue" : "'.htmlspecialchars(get_post_meta($review->ID,'review_rating',true),ENT_COMPAT).'",
                "bestRating": "10",
				"worstRating": "1",
                "ratingCount": "'.$final_numvotes.'",
                "reviewCount": "'.$final_numvotes.'"
			  }
			}
			</script>';
	}
}
add_filter('wp_footer','sch_ninja_footer_content');

/* "itemReviewed": {
	"@type": "Thing",
	"name": "'.htmlspecialchars(get_post_meta($review->ID,'review_title',true),ENT_COMPAT).'"
	},
	"reviewRating": {
	"@type": "Rating",
	"ratingValue": "'.htmlspecialchars(get_post_meta($review->ID,'review_rating',true),ENT_COMPAT).'",
	"bestRating": "10",
	"worstRating": "1"
	},
	"author":{
	"name":"'.get_the_author($author).'"
	},
	"dateModified":"'.get_the_modified_date('F j, Y',false,$review->ID).'",
	"description":"'.htmlspecialchars(get_post_meta($review->ID,'review_summary',true),ENT_COMPAT).'"
} */
?>