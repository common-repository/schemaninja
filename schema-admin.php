<?php
 /*
	Copyright: (c) 2020 Jitendra Vaswani(schemaninja.com)
	License: GNU General Public License v3.0
	License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/
 if ( ! defined( 'ABSPATH' ) ) {
    header( 'Status: 403 Forbidden' );
    header( 'HTTP/1.1 403 Forbidden' );
    exit;
} // Exit if accessed directly
if(isset($_POST['schema_key'])){
$check_nonce   = wp_verify_nonce( $_REQUEST['sn_nonce'],'schema-ninja'.$post->ID );
if ($check_nonce == true) {
  $ch = curl_init();
  $schema_key = sanitize_text_field($_POST['schema_key']);
  $schema_key = "schemaninja";
  // $fullURL = "https://schemaninja.com/api/index.php?check_verification_status";
  // curl_setopt($ch, CURLOPT_URL, "$fullURL=".$schema_key.
  //   '&site_url='.site_url());
  // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  // $data = curl_exec($ch);
  // $data = json_decode($data, true);
  update_option('schema_ninja_active', "1");
}
else {
  $flg = 1;
  $schema_key = "schemaninja";
  update_option('schema_ninja_active', "1");
}
  update_option('schema_ninja_key', $schema_key);
}
   

if(isset($_POST['submit'])){
	$title = sanitize_title( $_POST['title'] );
update_post_meta( $post->ID, 'title', $title );

				$sch_ninja_rv = sanitize_text_field( $_POST['review_btn_text'] );
				update_option('review_btn_text',$sch_ninja_rv);
				$sch_ninja_sum = sanitize_text_field( $_POST['summary_btn_text'] );
				update_option('summary_btn_text',$sch_ninja_sum);
				$sch_ninja_spec = sanitize_text_field( $_POST['specs_btn_text'] );
				update_option('specs_btn_text',$sch_ninja_spec);
				$sch_ninja_try = sanitize_text_field( $_POST['try_btn_text'] );
				update_option('try_btn_text',$sch_ninja_try);
				$sch_ninja_reviewcustomcss = sanitize_html_class( $_POST['schema_ninja_review_custom_css'] );
				update_option('schema_ninja_review_custom_css',$sch_ninja_reviewcustomcss);
				$sch_ninja_sch_ninja_recomcustomcss = sanitize_html_class( $_POST['schema_ninja_sch_ninja_recom_custom_css'] );
				update_option('schema_ninja_sch_ninja_recom_custom_css',$sch_ninja_sch_ninja_recomcustomcss);
   }
					$sch_ninja_rv=get_option('review_btn_text');
					$sch_ninja_spec=get_option('specs_btn_text');
					$sch_ninja_try=get_option('try_btn_text');
					$sch_ninja_sum=get_option('summary_btn_text');
					$sch_ninja_reviewcustomcss=get_option('schema_ninja_review_custom_css');
					$sch_ninja_sch_ninja_recomcustomcss=get_option('schema_ninja_sch_ninja_recom_custom_css');
if(isset($_POST['sch_ninja_recom'])){
update_option('sch_ninja_recommendation_trybtn',sanitize_text_field($_POST['sch_ninja_recommendation_trybtn']));
update_option('sch_ninja_recommendation_position',sanitize_text_field($_POST['sch_ninja_recommendation_position']));
update_option('sch_ninja_recommendation_title',sanitize_text_field($_POST['sch_ninja_recommendation_title']));
if(!empty($_POST['sch_ninja_recoms'])){
  		if(is_array($_POST['sch_ninja_recoms'])){
   			$sch_ninja_recoms=json_encode($_POST['sch_ninja_recoms']);
   			update_option('sch_ninja_recommendation_list',$sch_ninja_recoms);
   		}
   		else
   			update_option('sch_ninja_recommendation_list',"0");
   	}
   	else{
   		update_option('sch_ninja_recommendation_list',"0");
   	}
   }
	$sch_ninja_pos=get_option('sch_ninja_recommendation_position');
	$sch_ninja_recom_trybtn=get_option('sch_ninja_recommendation_trybtn');
	$sch_ninja_recommendation_title=get_option('sch_ninja_recommendation_title');
//FOR Sidebar  REC BOX 
	if(isset($_POST['sidebar'])){
						update_option('recommendation_sidebar1',$_POST['recommendation_sidebar1']);
				update_option('recommendation_sidebar2',$_POST['recommendation_sidebar2']);
				update_option('recommendation_sidebar3',$_POST['recommendation_sidebar3']);
	}	
	$recom_sidebar1=get_option('recommendation_sidebar1');
	$recom_sidebar2=get_option('recommendation_sidebar2');
	$recom_sidebar3=get_option('recommendation_sidebar3');
		?>
        <div style="
    text-align: center;
    ">
  <a href="https://www.schemaninja.com/pricing" target="_blank"><img src="https://www.schemaninja.com/wp-content/uploads/2017/04/schemaninja-banner-1-1.png" style="height: 70px;padding: 10px;border: 2px solid #2196f3;border-radius: 5px;" data-pin-nopin="true"></a>
</div>
<div class="settings-container">
  <div class="settings-header">
    <div class="settings-header-logo"> <img src="<?php echo plugin_dir_url( __FILE__ ); ?>assets/img/logo.png">
      <div class="settings-header-button"> 
      <a href="https://www.schemaninja.com/pricing" class="button" target="_blank" style="background-color: #27bb02;border: 1px solid #2cab03;color: #fff;text-decoration: none;text-decoration: none; ">Upgrade to Pro</a> 
      <a href="http://doc.schemaninja.com/" class="button" target="_blank" style=" text-decoration: none; ">Help Guide</a>
       <a href="https://www.schemaninja.com/contact-us" class="button" target="_blank" style=" text-decoration: none; ">Contact Us</a></div>
    </div>
  </div>
  <div class="settings-body">
    <div class="settings-navigation">
      <ul>
        <li data-id="settings" class="actv">Settings</li>
        <li data-id="review">Review Settings</li>
        <li data-id="sch_ninja_recommendation">Recommendation Settings</li>
		<li data-id="sch_ninja_sidebar">Sidebar Settings</li>
        <li data-id="sch_ninja_hellobar">Hellobar Recommendation</li>
        <li data-id="sch_ninja_popup">popup Recommendation</li>
        <li data-id="sch_ninja_footer">Footer Recommendation</li>
        <li data-id="sch_ninja_coupon">Coupon Recommendation</li>
        <li data-id="sch_ninja_compare">Compare Recommendation</li>
        <li data-id="sch_ninja_top_n">Top-N Recommendation</li>
        <li data-id="sch_ninja_offer">Offer Recommendation</li>
        <li data-id="sch_ninja_expert">Expert Recommendation</li>
      </ul>
    </div>
    <div class="settings-main-content container">
      <div class="tabc actv" id="settings">
        <div class="row">
          <h2>Settings</h2>
          <hr>
          <form method="POST" action="">
            <div class="col-md-6">
              <lable>Your License Key</lable>
              <input type="text" class="form-control" value="<?php echo get_option('schema_ninja_key'); ?>" name="schema_key">
              <br/>
              <?php if(get_option('schema_ninja_active')=="1"){ echo 'Status : <span style="color:green">Active <i class="fa fa-check"></i></span>';}else{echo 'Status : <span style="color:red">Inactive <i class="fa fa-cross"></i></span><a target="_blank" href="https://schemaninja.com/free-key">Get your Free Activation Key</a>';} ?>
              <br/>
              <br/>               
               <?php 
               $nonce = wp_create_nonce( 'schema-ninja'.$post->ID );
               ?>
               <input type="hidden" name="sn_nonce" id="sn_nonce" value="<?php echo $nonce;?>"/>
               
              <input type="submit" class="btn btn-primary" name="save" value="Authenticate">
            </div>
          </form>
          <div class="clear"></div>
        </div>
      </div>
      <div class="tabc" id="review">
        <div class="row">
          <h2>Review Settings</h2>
          <hr>
          <form method="POST" action="">
            <div class="col-md-6" style="margin: 0px 10px;">            
			 <div class="schtooltip">
			  <input type="text" value="<?php echo $sch_ninja_rv; ?>" class="form-control" name="review_btn_text" placeholder="Review Button Text">
 				<span class="schtooltiptext">Write here Custom text for Review Box Tab 1 E.g: Review, Our Rating,Rating</span>
			 </div>
              <div class="schtooltip">
              <input type="text" value="<?php echo $sch_ninja_spec; ?>"  class="form-control" name="specs_btn_text" placeholder="Specs Button Text">
              <span class="schtooltiptext">Write here Custom text for Review Box Tab 2 E.g: Specs,Parameter</span>
			 </div>
              <div class="schtooltip">
              <input type="text" value="<?php echo $sch_ninja_sum; ?>" class="form-control" name="summary_btn_text" placeholder="Summary Button Text">
              <span class="schtooltiptext">Write here Custom text for Review Box Tab 3 E.g:Descripition,Detail </span>
			 </div>
              <div class="schtooltip">
              <input type="text" value="<?php echo $sch_ninja_try; ?>" class="form-control" name="try_btn_text" placeholder="'Try Now' Button Text">
             <span class="schtooltiptext">Button Text E.g: Buy Now, Visit Now</span>
			 </div>
              <textarea name="schema_ninja_review_custom_css" class="form-control" placeholder="Custom CSS"><?php echo $sch_ninja_reviewcustomcss; ?></textarea>
              <br/>
              <input type="submit" class="btn btn-primary" id="sch_save_btn" value="Save" name="submit">
            </div>
          </form>
        </div>
      </div>
      <div class="tabc" id="sch_ninja_recommendation">
        <div class="row">
          <h2>Recommendation Settings</h2>
          <hr>
          <form method="POST" action="">
          <div class="col-md-6">
            <label>Try Button Text</label>
              <div class="schtooltip">
            <input type="text" value="<?php echo $sch_ninja_recom_trybtn; ?>" class="form-control" name="sch_ninja_recommendation_trybtn" placeholder="Try Button Text">
           <span class="schtooltiptext">Button Text E.g: Buy Now, Visit Now</span>
			 </div>
          </div>
          <div class="clear"></div>
          <div class="col-md-6">
            <label>Review recommendation Box Title</label>
			 <div class="schtooltip">
            <input type="text" value="<?php echo $sch_ninja_recommendation_title; ?>" class="form-control" name="sch_ninja_recommendation_title" placeholder="Review recommendation Box Title">
			<span class="schtooltiptext">Write title above all Recommendation Boxes</span>
			 </div>
          </div>         
            <div class="clear"></div>
            <hr>
            <h2>Display Recommendation Box in all Post</h2>
            <div class="col-md-6">
              <div class="select-area">
                <?php if(get_option('sch_ninja_recommendation_list')!="0"){

		  								$arr=json_decode(get_option('sch_ninja_recommendation_list'),true);

		  								foreach($arr as $s){

		  									echo '<div id="rcm_'.$s.'" class="selected">'.get_the_title($s).'<i class="deleterc fa fa-close"></i><input type="hidden" name="sch_ninja_recoms[]" value="'.$s.'"></div>';
		  								}
		  							}
		  						?>
             </div>
            </div>
            <div class="col-md-6">
              <select class="form-control rclist">
                <?php	$args = array(
						'posts_per_page'   => 100,
						'offset'           => 0,
						'category'         => '',
						'category_name'    => '',
						'orderby'          => 'date',
						'order'            => 'DESC',
						'include'          => '',
						'exclude'          => '',
						'meta_key'         => '',
						'meta_value'       => '',
						'post_type'        => 'recommendations',
						'post_mime_type'   => '',
						'post_parent'      => '',
						'author'	   => '',
						'post_status'      => 'publish',
						'suppress_filters' => true 
								);
								$sch_ninja_posts = get_posts( $args );
								//print_r($sch_ninja_posts);
								foreach($sch_ninja_posts as $sch_ninja_post){
									//setup_postdata($sch_ninja_post);
						echo '<option value="'.$sch_ninja_post->ID.'">'.$sch_ninja_post->post_title.'</option>';
								}
		  					?>
             </select>
              <input type="button" class="btn btn-info addrc" value="Add">
            </div>
            <div class='clear'></div>
            <br/>
            <div class="col-md-6">
              <div class="form-group">
                <label>Select Display Position</label>
                <select class="form-control" name="sch_ninja_recommendation_position">
                  <option value="top" <?php if($sch_ninja_pos=="top") echo 'selected'; ?>>Top</option>
                  <option value="bottom" <?php if($sch_ninja_pos=="bottom") echo 'selected'; ?>>Bottom</option>
                </select>
              </div>
              
              <!--<div class="form-group">

			  					<label>Show on</label>

			  					<input type="checkbox" class="form-control" name="showon" value="post">Posts

			  					<input type="checkbox" class="form-control" name="showon" value="pages">Pages

			  				</div>--> 
              
            </div>
            <div class="clear"></div>
            <br/>
            <input type="submit" class="btn btn-primary" value="Save" id="sch_save_btn" name="sch_ninja_recom">
          </form>
        
		<div class="clear"></div>
          <h4>Review recommendation Custom CSS</h4>
          <hr>
          <div class="clear"></div>
          <form method="POST" action="">
            <div class="col-md-6">
              <textarea name="schema_ninja_sch_ninja_recom_custom_css" class="form-control" placeholder="Custom CSS"><?php echo $sch_ninja_sch_ninja_recomcustomcss; ?></textarea>
              <br/>
              <input type="submit" class="btn" value="Submit" name="submit">
            </div></form></div>
      </div>
	  <div class="tabc " id="sch_ninja_sidebar">
        <div class="row">
          <h2>Sidebar Settings</h2>
          <hr>
          <form method="POST" action="">
          <div class="col-md-6">
            <label>Column Title 1</label>
			<div class="schtooltip">
            <input type="text" value="<?php echo $recom_sidebar1; ?>" class="form-control" name="recommendation_sidebar1" placeholder="Column Title 1">  
			<span class="schtooltiptext">Write Text for 1st column E.g: Products</span>
			 </div>          
          </div>
          <div class="clear"></div>
          <div class="col-md-6">
            <label>Column Title 2</label>
			<div class="schtooltip">
            <input type="text" value="<?php echo $recom_sidebar2; ?>" class="form-control" name="recommendation_sidebar2" placeholder="Column Title 2">
            <span class="schtooltiptext">Write Text for 2nd column E.g: Price,Rating</span>
			 </div>     
          </div>
		  <div class="clear"></div>
          <div class="col-md-6">
            <label>Column Title 3</label>
			<div class="schtooltip">
            <input type="text" value="<?php echo $recom_sidebar3; ?>" class="form-control" name="recommendation_sidebar3" placeholder="Column Title 3">
         <span class="schtooltiptext">Write Text for 3rd column E.g: Action, Buy Now</span>
			 </div>     
		  </div>
          <div class="clear"></div>
		   <input type="submit" class="btn btn-primary" id="sch_save_btn" value="Save" name="sidebar">
		  </form>
		  </div>
</div>
		<div class="tabc " id="sch_ninja_hellobar">
        <div class="row" style="
    text-align: center;
">
         <img src="https://www.schemaninja.com/wp-content/uploads/2017/03/hellobar-rec-features.png">
    <a href="https://www.schemaninja.com/pricing" class="button" target="_blank" style="background-color: #27bb02;border: 1px solid #2cab03;color: #fff;text-decoration: none;text-decoration: none; ">Get start Now</a> 
      <a href="http://doc.schemaninja.com/review" class="button" target="_blank" style=" text-decoration: none; ">View demo</a>
  
		  </div>
        </div>
        <div class="tabc " id="sch_ninja_popup">
        <div class="row" style="
    text-align: center;
">
         <img src="https://www.schemaninja.com/wp-content/uploads/2017/03/popup-rec-features.png">
    <a href="https://www.schemaninja.com/pricing" class="button" target="_blank" style="background-color: #27bb02;border: 1px solid #2cab03;color: #fff;text-decoration: none;text-decoration: none; ">Get start Now</a> 
      <a href="http://doc.schemaninja.com/review" class="button" target="_blank" style=" text-decoration: none; ">View demo</a>
  
		  </div>
        </div>
        <div class="tabc " id="sch_ninja_footer">
        <div class="row" style="
    text-align: center;
">
         <img src="https://www.schemaninja.com/wp-content/uploads/2017/03/footer-rec.png">
    <a href="https://www.schemaninja.com/pricing" class="button" target="_blank" style="background-color: #27bb02;border: 1px solid #2cab03;color: #fff;text-decoration: none;text-decoration: none; ">Get start Now</a> 
      <a href="http://doc.schemaninja.com/review" class="button" target="_blank" style=" text-decoration: none; ">View demo</a>
  
		  </div>
        </div>
        <div class="tabc " id="sch_ninja_coupon">
        <div class="row" style="
    text-align: center;
">
         <img src="https://www.schemaninja.com/wp-content/uploads/2017/03/coupon-rec-features.png">
    <a href="https://www.schemaninja.com/pricing" class="button" target="_blank" style="background-color: #27bb02;border: 1px solid #2cab03;color: #fff;text-decoration: none;text-decoration: none; ">Get start Now</a> 
      <a href="http://doc.schemaninja.com/coupon" class="button" target="_blank" style=" text-decoration: none; ">View demo</a>
  
		  </div>
        </div>
        <div class="tabc " id="sch_ninja_compare">
        <div class="row" style="
    text-align: center;
">
         <img src="https://www.schemaninja.com/wp-content/uploads/2017/03/hellobar-rec-features.png">
    <a href="https://www.schemaninja.com/pricing" class="button" target="_blank" style="background-color: #27bb02;border: 1px solid #2cab03;color: #fff;text-decoration: none;text-decoration: none; ">Get start Now</a> 
      <a href="http://doc.schemaninja.com/compare" class="button" target="_blank" style=" text-decoration: none; ">View demo</a>
  
		  </div>
        </div>
        <div class="tabc " id="sch_ninja_top_n">
        <div class="row" style="
    text-align: center;
">
         <img src="https://www.schemaninja.com/wp-content/uploads/2017/03/top10-rec-features.png">
    <a href="https://www.schemaninja.com/pricing" class="button" target="_blank" style="background-color: #27bb02;border: 1px solid #2cab03;color: #fff;text-decoration: none;text-decoration: none; ">Get start Now</a> 
      <a href="http://doc.schemaninja.com/top10" class="button" target="_blank" style=" text-decoration: none; ">View demo</a>
  
		  </div>
        </div>
        <div class="tabc " id="sch_ninja_offer">
        <div class="row" style="
    text-align: center;
">
         <img src="https://www.schemaninja.com/wp-content/uploads/2017/03/offer-rec-features.png">
    <a href="https://www.schemaninja.com/pricing" class="button" target="_blank" style="background-color: #27bb02;border: 1px solid #2cab03;color: #fff;text-decoration: none;text-decoration: none; ">Get start Now</a> 
      <a href="http://doc.schemaninja.com/offer" class="button" target="_blank" style=" text-decoration: none; ">View demo</a>
  
		  </div>
        </div>
        <div class="tabc " id="sch_ninja_expert">
        <div class="row" style="
    text-align: center;
">
         <img src="https://www.schemaninja.com/wp-content/uploads/2017/03/expert-rec-features.png">
    <a href="https://www.schemaninja.com/pricing" class="button" target="_blank" style="background-color: #27bb02;border: 1px solid #2cab03;color: #fff;text-decoration: none;text-decoration: none; ">Get start Now</a> 
      <a href="http://doc.schemaninja.com/expert" class="button" target="_blank" style=" text-decoration: none; ">View demo</a>
  
		  </div>
        </div>
    </div>
  </div>
</div>
<script>

	jQuery(".settings-navigation ul li").click(function(){

		var id=jQuery(this).attr("data-id");

		jQuery(".tabc").hide();

		jQuery("#"+id).show();

		jQuery(".settings-navigation ul li").removeClass("actv");



		jQuery(this).addClass("actv");

	});

	jQuery(".addrc").click(function(){

		var id=jQuery(".rclist").val();

		var title=jQuery(".rclist option:selected").text().trim();

		if(jQuery("#rcm_"+id).length<1){

			jQuery(".select-area").append('<div id="rcm_'+id+'" class="selected">'+title+' <i class="fa fa-close"></i><input type="hidden" name="sch_ninja_recoms[]" value="'+id+'"></div>');

		}

	});

	jQuery(".select-area").on('click',".deleterc",function(){

		jQuery(this).parent().remove();

	});
	
	jQuery(".add_hellobar_rc").click(function(){

		var id=jQuery(".hellobar_rclist").val();

		var title=jQuery(".hellobar_rclist option:selected").text().trim();

		if(jQuery("#hellobar_rcm_"+id).length<1){

			jQuery(".select-area").append('<div id="hellobar_rcm_'+id+'" class="selected">'+title+' <i class="hellobar_deleterc fa fa-close">delete</i><input type="hidden" name="hellobar_sch_ninja_recoms[]" value="'+id+'"></div>');

		}

	});

	jQuery(".select-area").on('click',".hellobar_deleterc",function(){

		jQuery(this).parent().remove();

	});

</script> 
<script>

$(document).ready(function(){

    $("upper p").css("display", "block");

});

</script>