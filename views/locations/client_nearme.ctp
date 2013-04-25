<div>
	<h3>You must choose "Always share" to search by Geoloation and reload the page.</h3>
</div>
<div>
<table><tr><th>Search for loacations</th><th>Searched Locations</th>
<tr><td width="460px;">
     <?php echo $this->Form->create('Location');?>
		<div class="tabs">
            <ul>
                <li><a href="#geolocation-tab"><span><?php __('Your Current Location'); ?></span></a></li>
                <li><a href="#address-tab"><span><?php __('Search an address'); ?></span></a></li>
                
                <?php echo $this->Layout->adminTabs(); ?>
            </ul>
            
            <div id="geolocation-tab" style="width:300px; height:260px;  border:thin;">
         <?php //echo $this->Form->create('Location');?>
                <fieldset>
                    Your geolocation
                    <div id="mapholder"></div>
                    
                       
                    <input  name="data[Location][lng]" id="lng" type="hidden" />
                    <input  name="data[Location][lat]" id="lat"  type="hidden" /> 
            <?php
               //echo $this->Form->input('lng', array('id'=>'lng','type'=>'hidden'));
                //echo $this->Form->input('lat', array('id'=>'lat', 'type'=>'hidden'));
            ?>
            </fieldset>
        </div>
           <div id="address-tab" style="width:300px; height:240px;  border:thin;">
    		
            <?php
				echo $this->Html->link(__('Clear address', true), array('action' => 'nearme'));
			
                //echo $this->Form->input('address1', array('id'=>'address1', 'title'=>'test tooltip'));
                //echo $this->Form->input('address2', array('id'=>'address2'));
                //echo $this->Form->input('city', array('id'=>'city'));
                //echo $this->Form->input('state', array('id'=>'state'));
                echo $this->Form->input('zip', array('id'=>'zip'));
                
				
            ?>
        </div>
	</div>
    <br />
    
     	<?php if(!empty($this->data)){
					if($this->data['Location']['dist'] != 10){
						$mydist = $this->data['Location']['dist'];}
					else{
						$mydist=10;
					}
				}else{
					$mydist = 10;
				}
				
				echo $this->Form->input('dist', array('id'=>'dist', 'label'=>'Maximum distance (in miles)', 'value'=>$mydist)); ?>
               
        
		<?php echo $this->Form->end(__('Search ', true));?>
</td><td valign="top">
	 <?php
				
							
							
				//echo $this->GoogleMapV3->map($defaul, array('style'=>'width:100%; height: 800px'));
				echo '<script type="text/javascript" src="'.$this->GoogleMapV3->apiUrl().'"></script>';
				
				$options = array(
							'geolocate' => true,
							'div' => array('id'=>'someothers'),
							'map' => array('zoom'=>15, 'type'=>'R', 'navOptions'=>array('style'=>'SMALL'), 'typeOptions' => array('style'=>'HORIZONTAL_BAR', 'pos'=>'RIGHT_TOP'))
							);
							
							$result = $this->GoogleMapV3->map($options);
							foreach($locations as $addy){
								$this->GoogleMapV3->addMarker(array('lat'=>$addy['Location']['lat'],'lng'=>$addy['Location']
								['lng'], 'title'=>'Marker', 'content'=>$addy['Location']['name'].'<br>'.$addy['Location']['description'], 'icon'=>$this->GoogleMapV3->iconSet('green', 'E')));
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

							?>	

 </td></tr></table>
</div>
<div class="locations index">
	<h2><?php __('Locations');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('address1');?></th>
			<!--<th><?php //echo $this->Paginator->sort('address2');?></th>-->
			<th><?php echo $this->Paginator->sort('city');?></th>
			<th><?php echo $this->Paginator->sort('state');?></th>
			<th><?php echo $this->Paginator->sort('zip');?></th>
            <th><?php echo $this->Paginator->sort('Estimated monthly reach', 'avgreachpermon');?></th>
            <th><?php echo $this->Paginator->sort('Actions');?></th>
			<!--<th><?php //echo $this->Paginator->sort('user_id');?></th>
			<th ><?php //__('Active');?></th>-->
	</tr>
	<?php
	$i = 0;
	
	foreach ($locations as $location):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $location['Location']['name']; ?>&nbsp;</td>
		<td><?php echo $location['Location']['description']; ?>&nbsp;</td>
		<td><?php echo $location['Location']['address1']; ?>&nbsp;</td>
		<!--<td><?php //echo $location['Location']['address2']; ?>&nbsp;</td>-->
		<td><?php echo $location['Location']['city']; ?>&nbsp;</td>
		<td><?php echo $location['Location']['state']; ?>&nbsp;</td>
		<td><?php echo $location['Location']['zip']; ?>&nbsp;</td>
        <td><?php echo $location['Location']['avgreachpermon'];?></td>
		<!--<td>
        
			<?php //if(isset($location['User'])){
					//echo $this->Html->link($location['User']['name'], array('controller' => 'users', 'action' => 'view', $location['User']['id'])); 
			//}
			?>
           
		</td>
		<td>
		<?php //echo $location['Location']['active']; 
        
        if($location['Location']['active']=='1'){
										//echo $this->Html->image('/img/icons/tick.png', array('class' => 'permission-toggle'));
							} else {
								//echo $this->Html->image('/img/icons/cross.png', array('class' => 'permission-toggle'));
							}
        
        ?>&nbsp;
        </td>-->
		<td class="actions">
        	<?php if($location['User']['id'] == $userid): ?>
				<?php echo $this->Html->link(__('View', true), array('action' => 'view', $location['Location']['id'])); ?>
                <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $location['Location']['id'])); ?>
                <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $location['Location']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $location['Location']['id'])); ?>
            <? endif; ?>
            <?php
				 echo $this->Html->link(__('Advertise here', true), array('action' => 'addad', $location['Location']['id'])); 
			?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
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
	  +latlon+"&zoom=14&size=400x300&sensor=true&markers=color:blue%7Clabel:B%7C"+latlon;
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
  </script>

	