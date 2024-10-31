<?php 
	include( SCH_PLUGIN_PATH . 'includes/review-meta.php');
function sch_ninja_add_plugin_review_box(){
		global $post;
		$price = get_post_meta($post->ID, 'review_price', true);
		$title1 = get_post_meta($post->ID, 'review_title1', true);
	$title1 = get_post_meta($post->ID, 'review_name', true);
		$rating=	get_post_meta($post->ID, 'review_rating', true);
		$ratings=get_post_meta($post->ID, 'review_ratings', true);
		if(strlen($ratings)>5){
			$ratings=json_decode($ratings,true);
		}
		$pros=get_post_meta($post->ID, 'review_pros', true);
		$cons=get_post_meta($post->ID, 'review_cons', true);
		$specs=get_post_meta($post->ID, 'review_specs', true);
		$url=get_post_meta($post->ID, 'review_url', true);
		$show=get_post_meta($post->ID, 'review_show', true);
		$checked=($show=="on")?"checked":"";
		$title=get_post_meta($post->ID, 'review_title', true);
		$summary=get_post_meta($post->ID, 'review_summary', true);
		$numvotes=get_post_meta($post->ID, 'review_numvotes', true);
		$curr=get_post_meta($post->ID, 'review_currency', true);
		$position=get_post_meta($post->ID,'review_position',true);
		if(strlen($specs)>5){
			$specs=json_decode($specs,true);
		}
		$p=$i=$j=$k=$l=$m=$n=$rev_pros_count=$rev_cons_count=0; ?>
<!------- Review Meta Box ---------->
<div id="sch_tabs" class="sch_c-tabs">
        <div class="sch_c-tabs-nav" style="background-color: #03A9F4;padding: 0px 10px;">
          <h3 style="color: #fff;">
		  <i class="fa fa-edit" style="margin-right: 5px;"></i>Add Review Box in post</h3>
		 <a href="http://www.schemaninja.com/how-to-use-schemaninja-detailed-guide/" class="button" target="_blank" style="text-decoration: none;position: absolute;right: 20px;top: 13px;">Help Guide</a>
        </div>
        <div class="sch_c-tab is-active">
          <div class="sch_c-tab__content">		
<div class="content sch_tabc">
<div class="col-md-12">
            <div class="col-md-3">
<label>Show Review</label>
</div>
<div class="col-md-6">
<input type="checkbox" name="review_show" id="showReview" <?php echo esc_attr($checked); ?>>
</div>
</div>
<div class="clear"></div>
<div class="col-md-12">
<div class="col-md-3">				
<label>Position</label>
</div>
<div class="col-md-6">
<select name="review_position">
<option value="top" <?php echo (($position=="top")?"selected":"");?>>Top</option>
<option value="below" <?php echo (($position=="below")?"selected":"");?>>Below</option>
</select>
</div>
</div>
<div class="clear"></div>
<div class="col-md-12">
<div class="col-md-3">
<label>Currency</label>
</div>
<div class="col-md-6">
<select name="review_currency">
<option value="" <?php echo (($curr=="No")?"selected":"");?>>No Currency</option>
<option value="$" <?php echo (($curr=="$")?"selected":"");?>>Dollars</option>
<option value="&#8356;" <?php echo (($curr=="&#8356;")?"selected":"");?>>Pounds</option>
<option value="€" <?php echo (($curr=="€")?"selected":"");?>>Euros</option>
<option value="&#8377;" <?php echo (($curr=="&#8377;")?"selected":"");?>>INR</option>
<option value="¥" <?php echo (($curr=="¥")?"selected":"");?>>Chinese Yuan</option>
<option value="?????" <?php echo (($curr=="?????")?"selected":"");?>>United Arab Emirates Dirham</option>
<option value="A$" <?php echo (($curr=="A$")?"selected":"");?>>Australian Dollar</option>
<option value="?" <?php echo (($curr=="?")?"selected":"");?>>Russian Ruble</option>
<option value="R$" <?php echo (($curr=="R$")?"selected":"");?>>Brazilian real</option>
</select>
<span style="font-size:11px;display:block">If you dont want to show currency then select (No currency)</span>
</div>
</div>
<div class="clear"></div>
<div class="col-md-12">
<div class="col-md-3">
<label>Price</label>
</div>
<div class="col-md-6">
<input type="text" placeholder="Enter Your Price" name="review_price" value="<?php echo esc_attr($price) ;?>">
<span style="font-size:11px;display:block">You can also add text here (For eg. Free)</span>
</div>
</div>
<div class="clear"></div>
<div class="col-md-12">
<div class="col-md-3">
<label>Overall Rating</label>
</div>
<div class="col-md-6">
<select name="review_rating">
<?php for($cnt=0;$cnt<11;$cnt++){ ?>
<option value="<?php echo esc_attr($cnt);?>" <?php echo (($rating==$cnt)?"selected":"");?>><?php echo esc_attr($cnt);?></option>
<?php }?>
</select>					
</div>
</div>
<div class="clear"></div>
<div class="col-md-12">
<div class="col-md-3">
<label>Ratings</label>
</div>
<div class="col-md-4">
<div class="rating-metrics">
<?php if(is_array($ratings)){
foreach($ratings['metrics'] as $key=>$val){?>
<input type="text" name="<?php echo esc_attr($key);?>" value="<?php echo esc_attr($val);?>" style="display:block">
<?php $rv_count++;
	}
}?>
<input type="text" placeholder="Rating Parameter" name="review_<?php echo esc_attr($rv_count);?>_metric" value="" style="display:block">
</div>
</div>
<div class="col-md-4">
<div class="rating-values">
<?php if(is_array($ratings)){
foreach($ratings['values'] as $key=>$val){?>
<input type="text" name="<?php echo esc_attr($key);?>" value="<?php echo esc_attr($val);?>" style="display:block">
<?php $j++;
	}
}?>
<input type="text" placeholder="Parameter Value" name="review_<?php echo esc_attr($j);?>_value" value="" style="display:block">
<input type="hidden" name="rating_count" value="<?php echo ($rv_count+1);?>">
</div>
</div>
<div class="col-md-3">
<div class="rating-delete">
<?php if(is_array($ratings)){
foreach($ratings['values'] as $key=>$val){?>
<span data-val="<?php echo $m;?>" style="display:block;" class="delete-rating dashicons dashicons-minus sch_minus"></span>
<?php $m++;
	}
}?>
<span class="dashicons dashicons-plus sch_plus" id="addrvrating"></span>
<span data-val="<?php echo $m;?>" style="display:block;" class="delete-rating dashicons dashicons-minus sch_minus"></span>
</div>
</div>
</div>
<div class="clear"></div>
<div class="col-md-12">
<div class="col-md-3">
<label>Pros</label>
</div>
<div class="col-md-4">
<div class="pros">
<?php if(is_array($pros)){
foreach($pros as $pro ){?>
<input style="display:block" id="pro_<?php echo esc_attr($rev_pros_count);?>" value="<?php echo esc_attr($pro);?>" type="text" name="<?php echo'review_pros[]'?>">
<?php $rev_pros_count++;
	}
}?>
<input style="display:block" placeholder="Pros of the Product" type="text" id="pro_<?php echo esc_attr($rev_pros_count);?>" name="review_pros[]">
</div>
</div>
<div class="col-md-4 pros-btn-area">
<?php if(is_array($pros)){
$rev_pros_count=0;
foreach($pros as $pro){
if($rev_pros_count==0){?>
<div class="pros-btns">
<span class="dashicons dashicons-plus sch_plus" id="addpros"></span>
<span data-val="<?php echo $rev_pros_count;?>" style="display:block;" class="delete-pro dashicons dashicons-minus sch_minus"></span>
</div>
<?php }	else {?>
<div class="pros-btns">
<span data-val="<?php echo $rev_pros_count;?>" style="display:block;" class="delete-pro dashicons dashicons-minus sch_minus"></span>
</div>
<?php } $rev_pros_count++;
	}
}
if($rev_pros_count==0){?>
<div class="pros-btns">
<span class="dashicons dashicons-plus sch_plus" id="addpros"></span>
<span data-val="<?php echo $rev_pros_count;?>" style="display:block;" class="delete-pro dashicons dashicons-minus sch_minus"></span>
</div>
<?php } else {?>
<div class="pros-btns">
<span data-val="<?php echo $rev_pros_count;?>" style="display:block;" class="delete-pro dashicons dashicons-minus sch_minus"></span>
</div>
<?php } ?>
</div>
</div>
<div class="clear"></div>
<div class="col-md-12">
<div class="col-md-3">
<label>Cons</label>
</div>
<div class="col-md-4">
<div class="cons">
<?php if(is_array($cons)){
foreach($cons as $con){?>
<input style="display:block" id="con_<?php echo esc_attr($rev_cons_count);?>" value="<?php echo esc_attr($con);?>" type="text" name="review_cons[]">
<?php $rev_cons_count++;
}
}?>
<input type="text" id="con_<?php echo esc_attr($rev_cons_count);?>" style="display:block" name="review_cons[]" placeholder="Cons of the product">
</div>
</div>
<div class="col-md-3 cons-btn-area">
<?php if(is_array($cons)){
	$rev_cons_count=0;
  	foreach($cons as $con){
	if($rev_cons_count==0){?>
<div class="cons-btns">
<span class="dashicons dashicons-plus sch_plus" id="addcons"></span>
<span data-val="<?php echo $rev_cons_count;?>" style="display:block;" class="delete-con dashicons dashicons-minus sch_minus"></span>
</div>
<?php }	else {?>
<div class="cons-btns">
<span data-val="<?php echo $rev_cons_count;?>" style="display:block;" class="delete-con dashicons dashicons-minus sch_minus"></span>
</div>
<?php } $rev_cons_count++;
	}
}
if($rev_cons_count==0){?>
<div class="cons-btns">
<span class="dashicons dashicons-plus sch_plus" id="addcons"></span>
<span data-val="<?php echo $rev_cons_count;?>" style="display:block;" class="delete-con dashicons dashicons-minus sch_minus"></span>
</div><?php	} else {?>
<div class="cons-btns">
<span data-val="<?php echo $rev_cons_count;?>" style="display:block;" class="delete-con dashicons dashicons-minus sch_minus"></span>
</div>
<?php } ?>
</div>
</div>
<div class="clear"></div>
<div class="col-md-12">
<div class="col-md-3">
Specs
</div>
<div class="col-md-4">
<div class="specs-metrics">
<?php	if(is_array($specs)){
foreach($specs['metrics'] as $key=>$val){?>
<input type="text" name="<?php echo esc_attr($key);?>" value="<?php echo esc_attr($val);?>" style="display:block">
<?php $k++; 
	}
}  ?>
<input type="text" placeholder="Spec Parameter" name="spec_<?php echo esc_attr($k);?>_metric" value="" style="display:block">
</div>
</div>
<div class="col-md-4">
<div class="specs-values">
<?php
if(is_array($specs)){
	foreach($specs['values'] as $key=>$val){?>
<input type="text" name="<?php echo esc_attr($key);?>" value="<?php echo esc_attr($val);?>" style="display:block">
<?php
$l++;
	}
}?>
<input type="text" placeholder="Spec Value" name="spec_<?php echo esc_attr($l);?>_value" value="" style="display:block">
<input type="hidden"  name="spec_count" value="<?php echo ($l+1);?>">
</div>
</div>
<div class="col-md-3">
<div class="specs-delete">
<?php	if(is_array($specs)){
foreach($specs['values'] as $vl){?>
<span da
ta-val="<?php echo $n;?>" style="display:block;" class="delete-spec dashicons dashicons-minus sch_minus"></span>
<?php	$n++;
	}
}?>
<span class="dashicons dashicons-plus sch_plus" id="addspecs"></span>
<span data-val="<?php echo $n;?>" style="display:block;" class="delete-spec dashicons dashicons-minus sch_minus"></span>
</div>
</div>
</div>
<div class="clear"></div>
<div class="col-md-12">
<div class="col-md-3">
<label>Link</label>
</div>
<div class="col-md-6">
<input type="text" placeholder="URL of Product" name="review_url" value="<?php echo esc_attr($url);?>">
<span style="font-size:11px;display:block">Enter review URL or Affiliate Link (required)</span>
</div>
</div>
<div class="clear"></div>
<div class="col-md-12">
<div class="col-md-3">
<label>Summary</label>
</div>
<div class="col-md-6">
<textarea style="width:100%" placeholder="Overall Rating of Product" name="review_summary"><?php echo $summary;?></textarea>
</div>
</div>
<div class="clear"></div>
<div class="col-md-12">
<div class="col-md-3">
<label>Name</label>
</div>
<div class="col-md-6">
<input type="text" placeholder="Review Name" name="review_title" value="<?php echo $title;?>">
</div>
</div>
<div class="clear"></div>
<div class="col-md-12">
<div class="col-md-3">
<label>No. of Votes (Users)</label>
</div>
<div class="col-md-6">
<input type="number" placeholder="10" name="review_numvotes" value="<?php echo $numvotes;?>">
</div>
</div>

<div class="clear"></div>
<?php echo'
		<script>
			jQuery(".nav-tab").click(function(){
			var tb=jQuery(this).attr("data-id");
			jQuery(".nav-tab").removeClass("nav-tab-active");
			jQuery(this).addClass("nav-tab-active");
			jQuery(".tabc").addClass("hidden");
			jQuery("."+tb).removeClass("hidden");
			});
 			var revl='.($rev_pros_count+1).';
				jQuery("#addpros").click(
					function(){
						jQuery(".pros").append(\'<input style="display:block" placeholder="Pros of the product" id="pro_\'+revl+\'" type="text" name="review_pros[]">\');
						jQuery(".pros-btn-area").append(\'<div class="pros-btns"><span class="delete-pro dashicons dashicons-minus sch_minus" data-val="\'+revl+\'"></span></div>\');
				revl++;	}  
				);
var revm='.($rev_cons_count+1).';
			jQuery("#addcons").click(
					function(){
						jQuery(".cons").append(\'<input style="display:block" placeholder="Cons of the product" type="text" id="con_\'+revm+\'" name="review_cons[]">\');
						jQuery(".cons-btn-area").append(\'<div class="cons-btns"><span class="delete-con dashicons dashicons-minus sch_minus" data-val="\'+revm+\'"></span></div>\');
revm++;
					} 
				);

			var rvi='.($rv_count+1).';

			jQuery("#addrvrating").click(function(){
					jQuery(".rating-metrics").append(\'<input type="text" name="review_\'+rvi+\'_metric" placeholder="Rating Parameter" value="" style="display:block">\');
					jQuery(".rating-values").append(\'<input type="text" name="review_\'+rvi+\'_value" placeholder="Parameter value" value="" style="display:block">\');
					jQuery(\'input[name="rating_count"]\').val(parseInt(jQuery(\'input[name="rating_count"]\').val())+1);
					jQuery(".rating-delete").append(\'<span class="delete-rating dashicons dashicons-minus sch_minus" style="display:block;" data-val="\'+rvi+\'"></span>\');

					rvi++;
				});

			var k='.($k+1).';
				jQuery("#addspecs").click(function(){
					jQuery(".specs-metrics").append(\'<input type="text" name="spec_\'+k+\'_metric" value="" style="display:block">\');
					jQuery(".specs-values").append(\'<input type="text" name="spec_\'+k+\'_value" value="" style="display:block">\');
					jQuery(\'input[name="spec_count"]\').val(parseInt(jQuery(\'input[name="spec_count"]\').val())+1);
					jQuery(".specs-delete").append(\'<span class="delete-spec dashicons dashicons-minus sch_minus" style="display:block;" data-val="\'+k+\'"></span>\');
					k++;
				});
				jQuery("body").on("click",".delete-rating",function(){
					var vl=jQuery(this);
					jQuery(\'input[name="review_\'+vl.attr("data-val")+\'_metric"]\').remove();
					jQuery(\'input[name="review_\'+vl.attr("data-val")+\'_value"]\').remove();
					vl.remove();
				});
				jQuery("body").on("click",".delete-spec",function(){
					var vl=jQuery(this);
					jQuery(\'input[name="spec_\'+vl.attr("data-val")+\'_metric"]\').remove();
					jQuery(\'input[name="spec_\'+vl.attr("data-val")+\'_value"]\').remove();
					vl.remove();
				});
				jQuery("body").on("click",".delete-pro",function(){
					var vl=jQuery(this);
					jQuery(\'#pro_\'+vl.attr("data-val")).remove();
					vl.remove();
				});
				jQuery("body").on("click",".delete-con",function(){
					var vl=jQuery(this);
					jQuery(\'#con_\'+vl.attr("data-val")).remove();
					vl.remove();
				});
		</script>
';?>
</div>
</div>
</div>
</div>

<script>
  var myTabs = tabs({
    el: '#sch_tabs',
    tabNavigationLinks: '.sch_c-tabs-nav__link',
    tabContentContainers: '.sch_c-tab'
  });

  myTabs.init();
</script>
<?php } 
include( SCH_PLUGIN_PATH . 'admin/review_data.php');
include( SCH_PLUGIN_PATH . 'templates/review_template.php');
?>