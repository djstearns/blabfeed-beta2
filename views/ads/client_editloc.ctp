
<div>
	<h3>Step 2: Choose your locations to submit your ad.</h3>
</div>

<div>
<table><tr><th>Search for loacations</th><th>Pick your searched locations from the checkboxes below</th>
<tr><td width="360px;">
<?php echo $this->Form->create('Ad');?>
	<div class="tabs">
        <ul>
            <li><a href="#geolocation-tab"><span><?php __('Your Current Location'); ?></span></a></li>
            <li><a href="#address-tab"><span><?php __('Search an address'); ?></span></a></li>
            
            <?php echo $this->Layout->adminTabs(); ?>
        </ul>
        <?php echo $this->Form->create('Location');?>
        <div id="geolocation-tab" style="width:200px; height:200px;  border:thin;">
         <?php //echo $this->Form->create('Location');?>
                
                    Your geolocation
                    <div id="mapholder"></div>
                    
                       
                    <input  name="data[Location][lng]" id="lng" type="hidden" />
                    <input  name="data[Location][lat]" id="lat"  type="hidden" /> 
            <?php
               //echo $this->Form->input('lng', array('id'=>'lng','type'=>'hidden'));
                //echo $this->Form->input('lat', array('id'=>'lat', 'type'=>'hidden'));
            ?>
           
        </div>

        <div id="address-tab" style="width:200px; height:200px;  border:thin;">
    		
            <?php
				
                //echo $this->Form->input('address1', array('id'=>'address1'));
                //echo $this->Form->input('address2', array('id'=>'address2'));
                //echo $this->Form->input('city', array('id'=>'city'));
                //echo $this->Form->input('state', array('id'=>'state'));
                echo $this->Form->input('zip', array('id'=>'zip'));
                
            ?>
        </div>
        
	</div>
    
     	<?php if(!empty($this->data) && isset($this->data['Location']['dist'])){
					if($this->data['Location']['dist'] != 10){
						$mydist = $this->data['Location']['dist'];}
					else{
						$mydist=10;
					}
				}else{
					$mydist = 10;
				}
				 
				echo $this->Form->input('dist', array('id'=>'dist', 'label'=>'Maximum distance', 'value'=>$mydist)); ?>
               
        
		<?php echo $this->Form->submit('Search', array('name'=>'ad'));?>
        <?php echo $this->Form->create('Ad');?>
</td><td valign="top">

	
	<table><tr><td>
    Filter:<br />
    <input id="filter" type="button" name="filter" value="Show only my locations" ><br />
    <input id="unfilter" type="button" name="filter" value="Show all locations available" >
    <input id="checkall" type="button" name="Select all" value="Select All" >
    <input id="uncheckall" type="button" name="Unselect all" value="Unselect All" >
    </td></tr></table>
    <script type="application/javascript">
		
	</script>
      <?php //debug($mylocations); ?>
	<?php
		echo $this->Form->input('Ad.id');
		//echo $this->Form->input('name', array('div'=>false, 'label'=>'Your ad packet name'));  echo '&nbsp;'.$this->Html->image('cake_logo.png', array('title' => 'You can change the name of your ad packet if you wish.'));
		//echo '<br />';
		//echo $this->Form->input('upload_id', array('label'=>'Your ad packet media file')); echo '&nbsp;'.$this->Html->image('cake_logo.png', array('title' => 'Your chosen file for this ad packet.'));
		//echo '<br />';
		//echo $this->Form->input('Ad.startdate');
		//echo $this->Form->input('Ad.enddate');
	
		
	?>
    <div style="height:300px; overflow:auto;">
    <table><tr><td>
    <?php	
		echo $this->Form->input('Location', array('multiple' => 'checkbox', 'div'=>false,'label'=>'', 'class'=>'test'));  
	?>
    </td></tr></table>
    </div>
  
	<div><?php echo $this->Form->input('total', array('type'=>'hidden', 'value'=>number_format(($totallocs/1000)*6.25,2,'.','')));?> </div>

<div style="display:none;">
<?php
	$tot = 0;
	foreach($locationsarr as $location){
		
			echo '<div id="loc'.$location['Location']['id'].'" >'.$location['Location']['avgreachpermon'].'</div>';
		
		//if(){
			$tot = $tot + $location['Location']['avgreachpermon'];
		//}
	}
	$bill = 0;
	foreach($locationsarr as $location){
		if($location['Location']['user_id'] != $userid){
			echo '<div id="bill'.$location['Location']['id'].'" >'.number_format(($location['Location']['avgreachpermon']/1000)*6.25, 2, '.', '').'</div>';
			$tot = $tot + $location['Location']['avgreachpermon'];
		}else{
			echo '<div id="bill'.$location['Location']['id'].'" >0</div>';
	
		}
		//if(){
			
		//}
	}
?>
</div>

<table><th>
Total Estimated Monthly Reach:</th><tr><td align="center"><div id="reachtotal"><?php echo $totallocs;?></div><br />people per month
</td></tr>

<th>Your Estimated Monthy bill:</th><tr><td align="center"><div id="billtotal"><?php echo number_format(($totallocs/1000)*6.25,2,'.','');?></div>
</td></tr></table>
<br />


</td></tr><tr><td colspan="2">
<?php
				
							
							
				//echo $this->GoogleMapV3->map($defaul, array('style'=>'width:100%; height: 800px'));
				echo '<script type="text/javascript" src="'.$this->GoogleMapV3->apiUrl().'"></script>';
				
				
				$options = array(
							'geolocate' => true,
							'div' => array('id'=>'someothers', 'width'=>'800px'),
							'map' => array('zoom'=>15, 'type'=>'R', 'navOptions'=>array('style'=>'SMALL'), 'typeOptions' => array('style'=>'HORIZONTAL_BAR', 'pos'=>'RIGHT_TOP'))
							);
							
							$result = $this->GoogleMapV3->map($options);
							//debugger::dump($locations);
							
							$alpharr = array('1'=>'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
							$alpharrasoc = array();
							//$char = $alpharrasoc[$addy['Location']['id']];
							foreach($alpharr as $i=>$letter){
								$alpharrasoc[$i] = $letter;
							}
							foreach($locationsarr as $addy){
								//create content div
								if($addy['Location']['address2'] != ''){
									$addresspara =  '<b>'.$addy['Location']['name'].'</b><br>'.
													$addy['Location']['address1'].'<br>'.
													$addy['Location']['address2'].'<br>'.
													$addy['Location']['city'].', '.$addy['Location']['state'].' '.$addy['Location']['zip'].'<br>';
								}else{
									$addresspara = '<b>'.$addy['Location']['name'].'</b><br>'.
													$addy['Location']['address1'].'<br>'.
													$addy['Location']['city'].', '.$addy['Location']['state'].' '.$addy['Location']['zip'].'<br>';
								}
								
								$addresspara = '<table><tr><td>'.$addresspara.'</td><td><b>Description:</b><br>'.$addy['Location']['description'].'</td></tr></table>';
								$tempid = $addy['Location']['id']%26;
								$char = $alpharrasoc[$tempid];
								$this->GoogleMapV3->addMarker(array(
									'lat'=>$addy['Location']['lat'],
									'lng'=>$addy['Location']['lng'], 
									'title'=>'Marker', 
									'content'=>	$addresspara, 
									'icon'=>$this->GoogleMapV3->iconSet('green', $char)));
							}
					
							//echo $deal['Business']['lat'].'=lat';
							//echo $deal['Business']['long'].'=long';
							
							
							//$this->GoogleMapV3->addMarker(array('lat'=>47.69847,'lng'=>11.9514, 'title'=>'Marker2', 'content'=>'Some more Html-<b>Content</b>'));
							
							
							//$this->GoogleMapV3->addMarker(array('lat'=>47.19847,'lng'=>11.1514, 'title'=>'Marker3'));
							
							/*
							$options = array(
							'lat'=>48.15144,
							'lng'=>10.198,
							'content'=>'Thanks for using this'
							);
							$this->GoogleMapV3->addInfoWindow($options);
							//$this->GoogleMapV3->addEvent();
							*/
							
							$result .= $this->GoogleMapV3->script();
							
							echo $result;
							
							/*
								$m = $this->GoogleMapV3->pathElements = array(
								array(
								'path' => array('Berlin', 'Stuttgart'),
								'color' => 'green',
								),
								array(
								'path' => array('44.2,11.1', '43.1,12.2', '44.3,11.3', '43.3,12.3'),
								),
								array(
								'path' => array(array('lat'=>'48.1','lng'=>'11.1'), array('lat'=>'48.4','lng'=>'11.2')), //'Frankfurt'
								'color' => 'red',
								'weight' => 10
								)
								);
								
								$is = $this->GoogleMapV3->staticPaths($m);
								//echo pr(h($is));
								
								
								$options = array(
								'paths' => $is
								);
								$is = $this->GoogleMapV3->staticMapLink('My Title', $options);
								//echo h($is).BR.BR;
								
								$is = $this->GoogleMapV3->staticMap($options);
								echo $is;
								*/
								//debug($locationsarr);
							?>	
                            </td></tr>
<tr><td>
    <?php echo $this->Html->link('<< Back', array('controller'=>'uploads', 'action'=>'edit', $id), array('class'=>'bigbutton', 'type'=>'button')); ?>
    </td><td align="right">
    <?php echo $this->Form->submit('Submit', array('name'=>'ad'));?>
    </td>
    </tr>
</table>
</div>


<?php //debug($locationsarr); 
	foreach($locationsarr as $loc){
		echo '<div style="display: none; z-index: 1016; outline: 0px; height: auto; width: 500px; top: 82px; left: 247px;" class="ui-dialog ui-widget ui-widget-content ui-corner-all " tabindex="-1" role="dialog" aria-labelledby="ui-dialog-title-dialog"><div class="dialog" id="dialog'.$loc['Location']['id'].'" style="width: auto; min-height: 111px; height: auto;" class="ui-dialog-content ui-widget-content"><b>Location Name:</b> '.$loc['Location']['name'].'<br  /><b>Description:</b> '.$loc['Location']['description'].'<br /><br /><b>Est. monthly reach: </b>'.$loc['Location']['avgreachpermon'].'</div></div>';
	}
?>
<!--
<div style="display: none; z-index: 1016; outline: 0px; height: auto; width: 500px; top: 82px; left: 247px;" class="ui-dialog ui-widget ui-widget-content ui-corner-all " tabindex="-1" role="dialog" aria-labelledby="ui-dialog-title-dialog"><div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix" unselectable="on"><span class="ui-dialog-title" id="ui-dialog-title-dialog" unselectable="on">jQuery UI Dialog</span><a href="#" class="ui-dialog-titlebar-close ui-corner-all" role="button" unselectable="on"><span class="ui-icon ui-icon-closethick" unselectable="on">close</span></a></div><div id="dialog" style="width: auto; min-height: 111px; height: auto;" class="ui-dialog-content ui-widget-content">
            <p>positioned relative to mousemove event, using the position utility</p>
<code><pre>.dialog({
  position: {
    my: 'left',
    at: 'right',
    of: event
  }
});</pre></code>
  </div></div>
  -->
<script type="text/javascript">

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
	  }
$(function() {
	$("#checkall").click(function(){
		$('input[type=checkbox]').each(function () {
           if ($(this).parent().is(':visible')) {
              $(this).attr('checked','checked');
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
				
           }
		});
	})
	
	$("#uncheckall").click(function(){
		$('input[type=checkbox]').each(function () {
           
            $(this).removeAttr('checked');
			$("#AdTotal").val(0);
			$("#billtotal").html(parseFloat(0).toFixed(2));
			$("#reachtotal").html(0);
			  
		});
	})
	
	
	$("#filter").click(function(){
		<?php echo "var mylocations = [". json_encode($mylocations) . "];\n"; ?>
		
		$('input[type=checkbox]').each(function () {
           //alert($(this).attr('value'));
		    var val = $(this).attr('value'); 
			var hidediv = true;
			for(var i = 0; i < mylocations.length; i++) {
				for(key in mylocations[i]) {
					if(val == key){
						hidediv = false;	
					}
				}
			}
			if (hidediv == true){
				$(this).parent().hide();
				
			}
			
		});
	})
	
	$("#unfilter").click(function(){
		<?php echo "var mylocations = ". $mylocations . ";\n"; ?>;
		
		$('input[type=checkbox]').each(function () {
           $(this).parent().show();
		});
	})
	
	$( "input:checkbox" ).click(function(){
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


  </script>