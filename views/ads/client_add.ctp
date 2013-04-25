
<div id="containerx" style="width:5000px; overflow:auto;">
<?php echo $this->Form->create('Ad', array('type'=>'file'));?>

<!--// TABS ||||||||||||||||||||||||||-->         
        		<div id="contentscroll" style="width:870px; height:900px; margin-right:1000px; border:thin;" class="box">
                   	<legend><h3>Step 1: Upload your media</h3></legend>
					<?php
                        echo $this->Form->input('Ad.name', array('label'=>'Campaign name', 'title'=>'test tooltip','div'=>false)); echo '&nbsp;'.$this->Html->image('tooltip.gif', array('title' => 'Give your ad packet a short descriptive name to ensure chances of approval.', 'alt'=>'test'));
                        echo '<br />';
                        //echo $this->Form->input('name', array('label'=>'File nickname','div'=>false)); echo '&nbsp;'.$this->Html->image('tooltip.gif', array('title' => 'You can give your file name an alias in case the actual file name is not descriptive enough.'));
                        echo '<br />';
                        
                        ?>
                        <!--<label>Perpetual?</label>-->
                        <?
                            echo $this->Form->input('Ad.perpetual', array('label'=>'Run Continuously', 'type'=>'checkbox', 'checked'=>'checked', 'onClick'=>'showRuntime();'));
                        ?>
                        <!--<input type="checkbox" id="perpetual" checked="checked" onclick="showRuntime();"/>-->
                        <div id="runtime" style="display:none;">
                        <?
                            echo $this->Form->input('Ad.startdatem', array('label'=>'Start date', 'value'=>date('m/d/Y')));
                            echo $this->Form->input('Ad.enddatem', array('label'=>'End date', 'value'=>date('m/d/Y', strtotime('+1 month'))));
                            //echo $this->Form->input('Ad.startdate');
                            
                        ?>
                        </div><?php echo '&nbsp;'.$this->Html->image('tooltip.gif', array('title' => 'Date copy.', 'alt'=>'test')); ?>
                        <?php 
                            echo $this->Form->input('Ad.category_id', array('value'=>$categories, 'label'=>'Choose Category', 'class'=>'chzn-select'));  
                                        echo '&nbsp;'.$this->Html->image('tooltip.gif', array('title' => 'Category copy.', 'alt'=>'test'));
                                    
                        ?>
                        <br />
                        <span style="margin: 0px 0px 0px 3px; font-family: 'Lucida Grande', Arial, sans-serif;font-size: 20px; color: #464646;">Choose your type of ad:</span>
                        <div class="tabs">
                                <ul>
                                    <li><a href="#image-tab"><span><?php __('Media Ad'); ?></span></a></li>
                                    <li><a href="#text-tab"><span><?php __('Text Ad'); ?></span></a></li>
                                    
                                    <?php echo $this->Layout->adminTabs(); ?>
                                </ul>
                         
                                <div id="image-tab" style="width:870px; height:450px;  border:thin;">
                                
                                	<div class="tabs" style="width:800px;">
                                    <ul>
                                        <li><a href="#media-tab"><span><?php __('Image'); ?></span></a></li>
                                        <li><a href="#imageurl-tab"><span><?php __('Image URL'); ?></span></a></li>
                                        
                                        <?php echo $this->Layout->adminTabs(); ?>
                                    </ul>
                                    	<div id="media-tab" style="width:800px; height:350px;  border:thin;">
                                       		
                                            <div>
                                            	<a id="image" class="bigbutton">Upload new to myGallery</a><br /><br />
                                                <a id="gallery" class="bigbutton">Choose from myGallery</a>
                                                <?php echo $this->Form->input('Ad.upload_id', array('type'=>'text', 'type'=>'hidden')); ?>
                                                
                                            </div>
                                            
                           					
                                        	 <div  style="float:left; width:400px;">
                                            
                                            <br />
                                             <?php	
                                                echo '&nbsp;'.$this->Html->image('tooltip.gif', array('title' => 'Aspect ratio copy.', 'alt'=>'test'));
                                            ?>
                                             
                                            <?php //debug($editor); ?>
                                            <div id="editor" style="display:<?php echo ($editor == 1 ? 'block' : 'none'); ?>">
                                                editor
                                            </div>
                                            <br />
                                            *file types allowed are .png, .jpg, .gif.<br />
                                            *file maximum size is: <br />
                                            *image will be resized to screen<br />
                                            Tip: it is best to upload a file with a 16:9 horizontal aspect ratio.<br /><br />
                                            16:9 sizes:<br />
                                                1280x720<br />
                                                1920x1080
                                            
                                            <br />
                                           </div>
                                            <div id="showimg" style="float:left; width:400px;display:none;">
                                            	<img id="blah" src="#" alt="your image" /><br />
                                                <a id="clearimage">clear image</a>
                                            </div>
                                            
                                           
                                       </div>
                                       <div id="imageurl-tab" style="width:850px; height:350px;  border:thin;">
                                       	<?php
                                       
                                        echo $this->Form->input('Ad.photo_url', array('type'=>'text', 'class'=>'imgurl'));
                                        echo $this->Form->input('Ad.user_id', array('type'=>'hidden', 'value'=>$user));
                                    	?>
                                       </div>
                                   	</div>
                                </div>
                                <div id="text-tab" style="width:870px; height:350px;  border:thin;">
                                    <?
                                        echo $this->Form->input('Ad.messageheader', array('label'=>'Your headline','class'=>'adtxt', 'div'=>false)); echo '&nbsp;'.$this->Html->image('tooltip.gif', array('title' => 'Say something bold and catchy here!'));
                                        echo '<br />';
                                        echo $this->Form->input('Ad.messagetxt',  array('label'=>'Your ad description','class'=>'adtxt', 'div'=>false)); echo '&nbsp;'.$this->Html->image('tooltip.gif', array('title' => 'Put your main message here.'));
                                        echo '<br />';
                                        echo $this->Form->input('Ad.messagecontact', array('label'=>'Website or phone number','class'=>'adtxt', 'div'=>false)); echo '&nbsp;'.$this->Html->image('tooltip.gif', array('title' => 'How will people who see your message get ahold of you?'));
                                        echo '<br />';
                                        echo $this->Form->input('Ad.qrcodeurl', array('type'=>'text','label'=>'Qr Code URL','class'=>'adtxt', 'div'=>false)); echo '&nbsp;'.$this->Html->image('tooltip.gif', array('title' => 'This is where users will go when the qr code is scanned.'));
                                    ?>
                                </div>
                            
                        </div>
                   <div style="align:right">         
                   <a style="float:right" id="next" class="bigbuttonNext" tabindex="1">Next</a>
                   </div>
                </div>
               <div id="contentscroll" style="width:870px; height:900px; margin-right:1000px; border:thin;" class="box">
                	<h3>Step 2: Choose your locations to submit your ad.</h3>
                    <div id="startmaintable">
                    	<table>
                   
                          <tr>
                          	<td>
                          	<select class="chzn-select" tabindex="1" style="width:150px" id="queryfld-select">
                            	<option>Category</option>
                                <option>Zip Code</option>
                                <option>Name</option>
                                <option>My Locations</option>
                                <option>Near Me</option>
                            </select>
                            </td>
                            <td>
                            	
                                  
                             <select class="chzn-select" id="filtervalues" style="width:400px" multiple="true">
                              <option>Choose...</option>
                              <option>jQuery</option>
                              <option selected="selected">MooTools</option>
                              <option>Prototype</option>
                              <option selected="selected">Dojo Toolkit</option>
                            </select>

                            </td>
                            <td>
                            	<label>budget</label><br /><input  />
                            </td>
                             <td>
                            	<input type="submit" value="search"  />
                            </td>
                          </tr>
                          <tr>
                          	<td colspan="4"><div id="mapholder"></div> <input  name="data[Location][lng]" id="lng" type="hidden" />
                    <input  name="data[Location][lat]" id="lat"  type="hidden" /> </td>
                              
                          </tr>
                       </table>
                       <a id="back" class="bigbuttonBack">Back</a><a id="next" class="bigbuttonNext">Next</a>
                   </div><!-- end startmaintable -->
                  	<?php //debug($locationsarr); 
                        foreach($locationsarr as $loc){
                            echo '<div style="display: none; z-index: 1016; outline: 0px; height: auto; width: 500px; top: 82px; left: 247px;" class="ui-dialog ui-widget ui-widget-content ui-corner-all " tabindex="-1" role="dialog" aria-labelledby="ui-dialog-title-dialog"><div class="dialog" id="dialog'.$loc['Location']['id'].'" style="width: auto; min-height: 111px; height: auto;" class="ui-dialog-content ui-widget-content"><b>Location Name:</b> '.$loc['Location']['name'].'<br  /><b>Description:</b> '.$loc['Location']['description'].'<br /><br /><b>Est. monthly reach: </b>'.$loc['Location']['avgreachpermon'].'</div></div>';
                        }
                   ?>
            	</div>
                <div id="contentscroll" style="width:870px; height:900px;  border:thin;" class="box">
					
                     <a id="back" class="bigbuttonBack">Back</a>
                     <div align="right">
						
                        </div>
                        <?php echo $this->Form->end(__('Submit', true));?>
            	</div>
            
     


	</div>
	
  
</div>
<script>
 $("#image").click(function() {
    $( "#dialog-modal" ).dialog({
      height: 900,
	  width: 1010,
      modal: true
    });
  });
</script>
<div id="dialog-modal" title="Add new media" style="display:none;">
	<!--<iframe src="http://dev.blabfeed.com/admin/galleries/add" height="850", width="980"></iframe>-->
   <iframe id="svg_fame" src="http://dev.blabfeed.com/client/uploads/add" height="800", width="1000"></iframe>
<script type="text/javascript">

 
  
  $("#gallery").click(function() {
    // will be called by popup window
	openWindow();
   
  });
   function setValue(val){
	   obj = JSON.parse(val);
	  	$("#showimg").show();
		$("#AdUploadId").val(obj['id']);
		$('#blah')
					.attr('src', 'http://dev.blabfeed.com/files/'+obj['url'])		
					.width(150)
					.height(200);
		};
		
	

    // Open a popup window
    function openWindow(){
       window.open("http://dev.blabfeed.com/client/uploads/insert", 'choose',
        'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
        'resizable=1, scrollbars=0, width=800, height=600' );
    }    
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				
				$('#blah')
					.attr('src', e.target.result)
					
					.width(150)
					.height(200)
					.show()
				};

			reader.readAsDataURL(input.files[0]);
		}
	}                              
</script>

<script type="text/javascript">

$(".chzn-select").chosen();
$("#clearimage").click(function (){
		$("#showimg").hide();
		$("#AdUploadId").val(null);
		$('#blah')
					.attr('src', '')		
					.width(150)
					.height(200);
		
});
$(function() {
        $( "#AdStartdatem" ).datepicker();
});
$(function() {
	$( "#AdEnddatem" ).datepicker();
});

$("#AdPerpetual").live("click", function() {
    if(this.checked){
	 $('#runtime').hide();
	 $(this).prop('checked', false);
	}else{
      $('#runtime').show();
	  $(this).prop('checked', true);
	};
	return false;
});

$(".imgurl").change(function(){
	if(   $(".adtxt").val() != ""  || $("#AdUploadId").val() != ''){//$("#UploadFile").val() != "" ||
		if($(this).val() != ""){
			$(this).val('');
			alert('You have already specified an image or text ad.');
		}
	}
	this.focus();	
	return false;
});
$(".adtxt").change(function(){
	if( $("#AdPhotoUrl").val() != "" || $("#AdUploadId").val() != '' ){//|| $("#UploadFile").val() != ""
	
		if($(this).val() != ""){
			$(this).val('');
			alert('You have already chosen an image or image url.');
		}
	}
	
	return false;
});
$("#AdUploadId").change(function(){
	if( $(".adtxt").val() != "" || $(".imgurl").val() != ""){
		if($(this).val() != ""){
			$(this).val("");
			alert('You have already chosen an text ad or image url.');
		}
	}
	
});



$("#queryfld-select").chosen().change(function() {
	$('#filtervalues').empty();
	
	
	$("#filtervalues").append('<option value=1>My option1</option>');
	$("#filtervalues").append('<option value=2>My option2</option>');
	$("#filtervalues").append('<option value=3>My option3</option>');
	$("#filtervalues").append('<option value=4>My option4</option>');
	$("#filtervalues").append('<option value=5>My option5</option>');
	
	$("#filtervalues").trigger("liszt:updated");
	$(this).focus();
});


getLocation();
function getLocation()
	  {
	  if (navigator.geolocation)
		{
		navigator.geolocation.getCurrentPosition(showPosition,showError);
		}
	  else{x.innerHTML="Geolocation is not supported by this browser.";}
	  }
	
	function showPosition(position)
	  {
	  var latlon=position.coords.latitude+","+position.coords.longitude;
	  var img_url="http://maps.googleapis.com/maps/api/staticmap?center="
	  +latlon+"&zoom=14&size=200x200&sensor=true&markers=color:blue%7Clabel:B%7C"+latlon;
	  document.getElementById("mapholder").innerHTML="<img src='"+img_url+"'>";
	  document.getElementById('lat').value = position.coords.latitude;
	  document.getElementById('lng').value = position.coords.longitude;
	  }
	
	function showError(error)
	  {
	  switch(error.code) 
		{
		case error.PERMISSION_DENIED:
		  x.innerHTML="User denied the request for Geolocation."
		  break;
		case error.POSITION_UNAVAILABLE:
		  x.innerHTML="Location information is unavailable."
		  break;
		case error.TIMEOUT:
		  x.innerHTML="The request to get user location timed out."
		  break;
		case error.UNKNOWN_ERROR:
		  x.innerHTML="An unknown error occurred."
		  break;
		default:
		  document.getElementById('ha').style.display = "block";
		  break;
		}
	  };
	  
	 $('#search').click(function(){
	//var inpt = $(this).attr("fld");
	//alert($('#Couponcode'+inpt+'Code').val());   
	//check for type of serach GEO OR ZIP
			
		$.post('http://dev.blabfeed.com/client/locations/search', {dist:$('#dist').val()},function(data) {
			
			$('#code_feedback').html(data);
			$('#code_feedback').show();
	   });
	   return false;
	}); 
	
	$("#geolocation-tab").click(function(){
		
	});
	  
$(function() {
	$( "input:checkbox[name='data[Location][Location][]']" ).click(function(){
		var locid = $(this).val();
		var amt = $("#loc"+locid).html();
		var reachdiv = $("#reachtotal").html();
		var amt1 = $("#bill"+locid).html();
		var reachdiv1 = $("#billtotal").html();
		if($(this).attr("checked")==true)
		{
			//add it
			reachdiv = parseInt(reachdiv) + parseInt(amt);
			reachdiv1 = parseFloat(reachdiv1) + parseFloat(amt1);
		}else{
			//subtract it
			reachdiv = parseInt(reachdiv) - parseInt(amt);
			reachdiv1 = parseFloat(reachdiv1) - parseFloat(amt1);
			//alert(reachdiv);
		}
		$("#AdTotal").val(reachdiv1);
		$("#billtotal").html(parseFloat(reachdiv1).toFixed(2));
		$("#reachtotal").html(reachdiv);
		

		
	});
	
	
});


var dlg = $(".dialog").dialog({
  autoOpen: false,
  draggable: false,
  resizable: false,
  width: 500
});

$(".test").mouseover(function() {
	var test = $(this).find('input');
    var div = $("#dialog"+test.val())
	div.dialog("open");
}).mousemove(function(event) {
  dlg.dialog("option", "position", {
    my: "left top",
    at: "right bottom",
    of: event,
    offset: "20 20"
  });
}).mouseout(function() {
  dlg.dialog("close");
});


$(".bigbuttonNext").click(function(){
	//alert($("#containerx").css("margin-left"));
	var pos = $("#containerx").css("margin-left");
	pos = parseInt(pos) - 1930;
    $("#containerx").animate({marginLeft:+pos+'px'});
  });
$(".bigbuttonBack").click(function(){
	var pos = $("#containerx").css("margin-left");
	pos = parseInt(pos) + 1930;
	
    $("#containerx").animate({marginLeft:+pos+'px'});
  });
  

</script>
