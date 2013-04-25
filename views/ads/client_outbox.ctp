<div class="ads index">
	<h2><?php __('Ads Outbox');?></h2>
    
	<script>
    $(function() {
        $( "#accordion" ).accordion();
    });
    </script>
    <table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
            <th><?php echo $this->Paginator->sort('image');?></th>
			<!--<th><?php //echo $this->Paginator->sort('user_id');?></th>-->
			<!--<th><?php //echo $this->Paginator->sort('approved');?></th>-->
			<!--<th><?php //echo $this->Paginator->sort('approved_date');?></th>-->
			<th><?php echo $this->Paginator->sort('created');?></th>
	</tr>
    </table>
	
    <div id="accordion">
    
		<?php
		$r = 0;
        $i = 0;
        foreach ($ads as $ad):
            //debugger::dump($ad['Location']);
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
        ?>
            <h3>&nbsp;<?php //echo $i?>
            <table>
            <tr<?php echo $class;?>>
                <td><?php echo $ad['Ad']['id']; ?>&nbsp;</td>
                <td><?php echo $ad['Ad']['name']; ?>&nbsp;</td>
                <td>
					 <?php 
					 	if($ad['Ad']['upload_id']!=0){
							echo $this->Html->image('/files/'.$ad['Upload']['name'], array('url'=> array('controller' => 'upload', 'action' => 'view', $ad['Upload']['id']), 'width'=> 100, 'height'=>100)); 		
						}else{
							echo $ad['Ad']['messageheader'].'<br />'.$ad['Ad']['messagetxt'].'<br />'.$ad['Ad']['messagecontact'];
						}
					 ?>
                </td>
               <!-- <td>
                    <?php //echo $this->Html->link($ad['User']['name'], array('controller' => 'users', 'action' => 'view', $ad['User']['id'])); ?>
                </td>-->
                
                <!--<td><?php  //if( $ad['Ad']['approved']=='1'){echo $this->Html->image('/img/icons/tick.png', array());}else{echo $this->Html->image('/img/icons/cross.png', array());}; ?>&nbsp;</td> -->
                <!--<td><?php //echo $ad['Ad']['approved_date']; ?>&nbsp;</td>-->
                <td><?php echo $ad['Ad']['created']; ?>&nbsp;</td>
            
                </tr>
                </table>
                </h3>
                <div>
                	
                 	<?php //echo $this->Html->link(__('View', true), array('action' => 'view', $ad['Ad']['id'])); ?>
                    <?php //echo $this->Html->link(__('Edit', true), array('action' => 'edit', $ad['Ad']['id'])); ?>
                    <?php //echo $this->Html->link(__('Delete', true), array('action' => 'delete', $ad['Ad']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $ad['Ad']['id'])); ?>
 				Locations proposed:
                <?php //debugger::dump($ad['AdsLocations']); ?>
                <table>
                	<tr>
                    	<th><?php echo $this->Paginator->sort('name');?></th>
                        <th><?php echo $this->Paginator->sort('description');?></th>
                        <th><?php echo $this->Paginator->sort('address');?></th>
                       
                        <th><?php echo $this->Paginator->sort('active');?></th>
                        <th><?php echo $this->Paginator->sort('created');?></th>
                        <th><?php echo $this->Paginator->sort('approved');?></th>
                        <th><?php echo $this->Paginator->sort('denied');?></th>
                         <!--<th><?php //echo $this->Paginator->sort('reviewed');?></th>-->
                    </tr>
                    <?php foreach($ad['Location'] as $location): ?>
                    <?php //debugger::dump($location['AdsLocation']); ?>
                    	<tr>
                        	<td><?php echo $location['name']; ?>&nbsp;</td>
                            <td><?php echo $location['description']; ?>&nbsp;</td>
                            <td><?php echo $location['address1']; ?>&nbsp;
                            <br /><?php echo $location['address2']; ?>&nbsp;
                            <br /><?php echo $location['city']; ?>&nbsp;
                            <br /><?php echo $location['state']; ?>&nbsp;
                            <br /><?php echo $location['zip']; ?>&nbsp;
               
                            <td><?php if($location['active']=='1'){echo $this->Html->image('/img/icons/tick.png', array( 'rel' => $location['AdsLocation']['id'].'-3'));}else{echo $this->Html->image('/img/icons/cross.png', array( 'rel' => $location['AdsLocation']['id'].'-3'));}; ?>&nbsp;</td>
                            <td><?php echo $location['created']; ?>&nbsp;</td>
                            <td><?php
							//echo $location['AdsLocation']['id'] ;
                            
								if($location['AdsLocation']['approved']=='1'){
										echo $this->Html->image('/img/icons/tick.png', array('class' => 'permission-toggle', 'rel' => $location['AdsLocation']['id'].'-3'));
							} else {
								echo $this->Html->image('/img/icons/cross.png', array('class' => 'permission-toggle', 'rel' => $location['AdsLocation']['id'].'-3'));
							}
							?>
								</td>
								<td><?php
								 if($location['AdsLocation']['approved']=='-1'){
										echo $this->Html->image('/img/icons/tick.png', array('class' => 'permission-toggle', 'rel' => $location['AdsLocation']['id'].'-3'));
							} else {
								echo $this->Html->image('/img/icons/cross.png', array('class' => 'permission-toggle', 'rel' => $location['AdsLocation']['id'].'-3'));
							}
						?>
                            	</td>
								<!--<td><?php
								/*
								 if($location['AdsLocation']['reviewed']=='1'){
										echo $this->Html->image('/img/icons/tick.png', array('class' => 'permission-toggle', 'rel' => $location['AdsLocation']['id'].'-3'));
							} else {
								echo $this->Html->image('/img/icons/cross.png', array('class' => 'permission-toggle', 'rel' => $location['AdsLocation']['id'].'-3'));
							}
							*/
						?>
                            </td>-->
                            
                        </tr>
                    <?php $r++; endforeach; ?>
                </table>
            	<div align="right">
            		<?php if($location['AdsLocation']['approved']==0) {echo $this->Html->link('Edit this ad', array('action'=>'client_edit', $ad['Ad']['id']));} ?>
					<?php echo $this->Html->link('Delete this ad', array('action'=>'client_deloutbox', $ad['Ad']['id'])); ?>
                </div>
            </div>
        <?php $r++; endforeach; ?>
  
	</div>
  
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