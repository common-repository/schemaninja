<div id="tabs" class="sch_c-tabs">
<div class="sch_c-tabs-nav" style="background-color: #03A9F4;padding: 0px 10px;">
          <h3 style="color: #fff;">
		  <i class="fa fa-edit" style="margin-right: 5px;"></i>Add Recommendation Box in post</h3>
		 <a href="http://www.schemaninja.com/how-to-use-schemaninja-detailed-guide/" class="button" target="_blank" style="text-decoration: none;position: absolute;right: 20px;top: 13px;">Help Guide</a>
        </div>
        <div class="sch_c-tab is-active">
          <div class="sch_c-tab__content">
		  <div class="col-md-12">
            <div class="col-md-3">
				<label>Overall Rating</label>
				</div>
				<div class="col-md-6">
<?php echo '
<select class="form-control" name="recommendation_rating">
				<option value="0"'.(($rating==0)?"selected":"").'>0</option>
				<option value="0.5"'.(($rating==0.5)?"selected":"").'>0.5</option>
				<option value="1"'.(($rating==1)?"selected":"").'>1</option>
				<option value="1.5"'.(($rating==1.5)?"selected":"").'>1.5</option>
				<option value="2"'.(($rating==2)?"selected":"").'>2</option>
				<option value="2.5"'.(($rating==2.5)?"selected":"").'>2.5</option>
				<option value="3"'.(($rating==3)?"selected":"").'>3</option>
				<option value="3.5"'.(($rating==3.5)?"selected":"").'>3.5</option>
				<option value="4"'.(($rating==4)?"selected":"").'>4</option>
				<option value="4.5"'.(($rating==4.5)?"selected":"").'>4.5</option>
				<option value="5"'.(($rating==5)?"selected":"").'>5</option>
</select>
'; ?>
</div>
</div>
<div class="clear"></div>
<div class="col-md-12">
<div class="col-md-3">
<label>Price</label>
</div>
<div class="col-md-6">
<input type="text" name="recommendation_price" class="form-control" placeholder="Product price" value="<?php echo $price;?>">
</div>
</div>
<div class="clear"></div>
<div class="col-md-12">
<div class="col-md-3">
<label>Pros</label>
</div>
<div class="col-md-4">
<div class="pros">
<?php
	if(is_array($pros)){
		foreach($pros as $pro ){
		?>
		<input style="display:block;margin-top: 4px;" id="pro_<?php echo $pros_count;?>"  class="form-control" value="<?php echo $pro;?>" type="text" name="recommendation_pros[]">
<?php	$pros_count++;
				}
					}?>
		<input style="display:block;margin-top: 4px;"  class="form-control" placeholder="Pros of the Product" type="text" id="pro_<?php echo $pros_count;?>" name="recommendation_pros[]"> 
		</div></div><div class="col-md-3">		 
		<div style="vertical-align:top" class="pros-btn-area">
<?php if(is_array($pros)){
	$pros_count=0;
		foreach($pros as $pro){
			if($pros_count==0){?>
			<div class="pros-btns">			
			<span class="dashicons dashicons-plus sch_plus" id="addpros"></span>
			<span data-val="<?php echo $pros_count;?>" style="display:block;" class="delete-pro dashicons dashicons-minus sch_minus"></span>
			</div>
				<?php } else {?>								
			<div class="pros-btns">
			<span data-val="<?php echo $pros_count;?>" style="display:block;" class="delete-pro dashicons dashicons-minus sch_minus"></span>
			</div>
					<?php 
					}
					$pros_count++;
		}
						} 
						if($pros_count==0){?>
			<div class="pros-btns">			
			<span class="dashicons dashicons-plus sch_plus" id="addpros"></span>
			<span data-val="<?php echo $pros_count;?>" style="display:block;" class="delete-pro dashicons dashicons-minus sch_minus"></span>
			</div>
				<?php } else {?>								
			<div class="pros-btns">
			<span data-val="<?php echo $pros_count;?>" style="display:block;" class="delete-pro dashicons dashicons-minus sch_minus"></span>
			</div>
					<?php }?>
			</div>
			</div>
</div>
<div class="clear"></div>
<div class="col-md-12">
<div class="col-md-3">
	<label>Cons </label>
</div>
<div class="col-md-4">
	<div class="cons"> 
<?php if(is_array($cons)){
	foreach($cons as $con){?>
	<input class="form-control" style="display:block;margin-top: 4px;" id="con_<?php echo $cons_count;?>" value="<?php echo $con;?>" type="text" name="recommendation_cons[]">
<?php 
$cons_count++;
	}
}?>
<input class="form-control" type="text" id="con_<?php echo $cons_count;?>" style="display:block;margin-top: 4px;" name="recommendation_cons[]" placeholder="Cons of the product">
		</div>
			</div>
<div class="col-md-3">
	<div style="vertical-align:top" class="cons-btn-area">
<?php if(is_array($cons)){
		$cons_count=0;
			foreach($cons as $con){
					if($cons_count==0){?>
		<div class="cons-btns">
		<span class="dashicons dashicons-plus sch_plus" id="addcons"></span>
			<span data-val="<?php echo $cons_count;?>" style="display:block;" class="delete-con dashicons dashicons-minus sch_minus"></span>
		</div>
							<?php }	else {?>
		<div class="cons-btns">
		<span data-val="<?php echo $cons_count;?>" style="display:block;" class="delete-con dashicons dashicons-minus sch_minus"></span>
		</div>
							<?php }
							$cons_count++;							
							}
					}
						if($cons_count==0){?>
		<div class="cons-btns">
		<span class="dashicons dashicons-plus sch_plus" id="addcons"></span>
			<span data-val="<?php echo $cons_count;?>" style="display:block;" class="delete-con sch_minus dashicons dashicons-minus"></span>
		</div>
							<?php }	else{?>
		<div class="cons-btns">
		<span data-val="<?php echo $cons_count;?>" style="display:block;" class="delete-con dashicons dashicons-minus sch_minus"></span>
		</div>
		<?php }?>
					</div></div>
					</div>
					<div class="clear"></div>
					<div class="col-md-12">
					<div class="col-md-3">
				<label>Try Button text</label>
				</div>
				<div class="col-md-6">
				<input type="text" name="recommendation_trybtn" placeholder="Try Button Text" class="form-control" value="<?php echo $trybtn;?>">
				</div>
				</div>
				<div class="clear"></div>
					<div class="col-md-12">
					<div class="col-md-3">
				<label>Affiliate URL</label>
				</div>
				<div class="col-md-6">
				 <input type="url" class="form-control" name="recommendation_url" value="<?php echo $url ;?>" placeholder="Affiliate Link">
				<span class="help-text">Enter Affiliate Link</span>
				</div>
				</div>
				<div class="clear"></div>
				<div class="col-md-12">
					<div class="col-md-3">
					<label>Ratings</label>
					</div>
					 <div class="col-md-5">
						<div class="rating-metrics">
						<?php if(is_array($ratings)){
							foreach((array)$ratings['metrics'] as $key=>$val){?>
							<input class="form-control"  type="text" name="<?php echo $key;?>" placeholder="Rating Parameter" value="<?php echo $val;?>" style="margin-top:3px;display:block">
								<?php $i++;
							}
						}?>
					<input type="text" class="form-control"  name="recommendation_<?php echo $i;?>_metric" placeholder="Rating Parameter" value="" style="margin-top:3px;display:block">
						</div>
					</div>
<div class="col-md-2">
		<div class="rating-values"><?php
						if(is_array($ratings)){
							foreach((array)$ratings['values'] as $key=>$rating){?>
						<select name="<?php echo $key;?>" style="height: 26px;">
							<option value="0"<?php echo (($rating==0)?"selected":"");?>>0</option>
							<option value="0.5"<?php echo(($rating==0.5)?"selected":"");?>>0.5</option>
							<option value="1"<?php echo (($rating==1)?"selected":"");?>>1</option>
							<option value="1.5"<?php echo (($rating==1.5)?"selected":"");?>>1.5</option>
							<option value="2"<?php echo (($rating==2)?"selected":"");?>>2</option>
							<option value="2.5"<?php echo (($rating==2.5)?"selected":"");?>>2.5</option>
							<option value="3"<?php echo (($rating==3)?"selected":"");?>>3</option>
							<option value="3.5"<?php echo (($rating==3.5)?"selected":"");?>>3.5</option>
							<option value="4"<?php echo (($rating==4)?"selected":"");?>>4</option>
							<option value="4.5"<?php echo (($rating==4.5)?"selected":"");?>>4.5</option>
							<option value="5"<?php echo (($rating==5)?"selected":"");?>>5</option>
						</select>
								<?php $j++;
							}
						}?>					
			             <select name="recommendation_<?php echo $j;?>_value" style="height: 26px;">
							<option value="0">0</option>
							<option value="0.5">0.5</option>
							<option value="1">1</option>
							<option value="1.5">1.5</option>
							<option value="2">2</option>
							<option value="2.5">2.5</option>
							<option value="3">3</option>
							<option value="3.5">3.5</option>
							<option value="4">4</option>
							<option value="4.5">4.5</option>
							<option value="5">5</option>
						</select>
							<input type="hidden" name="rating_count" value="<?php echo ($i+1);?>">
						</div></div>
<div class="col-md-2">
		<span class="dashicons dashicons-plus sch_plus" id="addrcmrating"></span>
		<span data-val="<?php echo $i;?>" style="display:block;" class="delrcmrating sch_minus dashicons dashicons-minus"></span>
<div class="rating-delete">
<?php	if(is_array($ratings)){
		$j=0;
		foreach((array)$ratings['values'] as $key=>$val){?>
			<span data-val="<?php echo $j;?>" style="display:block;" class="delrcmrating sch_minus dashicons dashicons-minus"></span>
<?php	$j++;
	}
}?>					
 </div>
	</div></div></div>
<div class="clear"></div>
          </div>
      </div>
	  <script>
  var myTabs = tabs({
    el: '#tabs',
    tabNavigationLinks: '.sch_c-tabs-nav__link',
    tabContentContainers: '.sch_c-tab'
  });

  myTabs.init();
</script>
		
<?php echo '
					<script>
				var i='.($i+1).';
				jQuery("#addrcmrating").click(function(){
					jQuery(".rating-metrics").append(\'<input type="text" placeholder="Rating Parameter"  name="recommendation_\'+i+\'_metric" value="" style="margin-top:3px;display:block">\');
					jQuery(".rating-values").append(\'<select name="recommendation_\'+i+\'_value" style="    height: 26px;"><option value="0">0</option><option value="0.5">0.5</option><option value="1">1</option><option value="1.5">1.5</option><option value="2">2</option><option value="2.5">2.5</option><option value="3">3</option><option value="3.5">3.5</option><option value="4">4</option><option value="4.5">4.5</option><option value="5">5</option></select>\');
					jQuery(\'input[name="rating_count"]\').val(parseInt(jQuery(\'input[name="rating_count"]\').val())+1);
					jQuery(".rating-delete").append(\'<span class="delrcmrating dashicons dashicons-minus sch_minus" style="margin-top:3px;display: block;" data-val="\'+i+\'"></span>\');
					i++;
				});
			jQuery("#showRecommendation").click(function(){
					console.log("ssss");
					if(jQuery("#showRecommendation").is(":checked")){
						jQuery(".rcm-section").css("display","block");
					}
					else
					jQuery(".rcm-section").css("display","none");
			});	
			jQuery("body").on("click",".delrcmrating",function(){
					var vl=jQuery(this);
					console.log("iam here");
					jQuery(\'select[name="recommendation_\'+vl.attr("data-val")+\'_value"]\').remove();
					jQuery(\'input[name="recommendation_\'+vl.attr("data-val")+\'_metric"]\').remove();
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
var l='.($pros_count+1).';
			jQuery("#addpros").click(
					function(){
						jQuery(".pros").append(\'<input style="margin-top:3px;display:block" id="pro_\'+l+\'" type="text" name="recommendation_pros[]" placeholder="Pros of the product">\');
						jQuery(".pros-btn-area").append(\'<div class="pros-btns"><span class="delete-pro dashicons dashicons-minus sch_minus" data-val="\'+l+\'"></span></div>\');
					}
				);
var m='.($cons_count+1).';
			jQuery("#addcons").click(
					function(){
						jQuery(".cons").append(\'<input style="margin-top:3px;display:block" type="text" id="con_\'+m+\'" name="recommendation_cons[]" placeholder="Cons of the product">\');
						jQuery(".cons-btn-area").append(\'<div class="cons-btns"><span class="delete-con dashicons dashicons-minus sch_minus" data-val="\'+m+\'"></span></div>\');
					}
			);
			</script>';?>
			 <script type="text/javascript">
jQuery(document).ready(function($){
    $('#upload-btn').click(function(e) {
        e.preventDefault();
        var image = wp.media({ 
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            // Let's assign the url value to the input field
            $('#image_url').val(image_url);
        });
    });
});
</script> 