jQuery(function($){
   $(document).ready(function(){	
    
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

	jQuery(".select-area").on('click',".hellobar_deleterc",function(){

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
    
   });
   });