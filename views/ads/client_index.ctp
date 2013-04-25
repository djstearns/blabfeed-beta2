<div class="ads index">

<?php //echo $this->element('sql_dump'); ?>
	<h2><?php __('Ads Inbox');?></h2>
	<script>
    $(function() {
        $( "#accordion" ).accordion();
    });
    </script>
    <table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
            <th><?php echo $this->Paginator->sort('Image/Ad', 'image');?></th>
            <th><?php echo $this->Paginator->sort('Category'); ?></th>
			<!--<th><?php //echo $this->Paginator->sort('user_id');?></th>-->
			<!--<th><?php //echo $this->Paginator->sort('approved');?></th>-->
			<!--<th><?php //echo $this->Paginator->sort('approved_date');?></th>-->
			<th><?php echo $this->Paginator->sort('created');?></th>
	</tr>
    </table>
    <?php echo $this->Form->create('Ads');?>
	<?php //debug($ads); ?>
    
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
                	<?php if($ad['Ad']['upload_id']!=0){
					 	echo $this->Html->image('/files/'.$ad['Upload']['name'], array('url'=> array('controller' => 'upload', 'action' => 'view', $ad['Upload']['id']), 'width'=> 100, 'height'=>100)); 	
					}else{
						echo $ad['Ad']['messageheader'].'<br />'.$ad['Ad']['messagetxt'].'<br />'.$ad['Ad']['messagecontact'];
					}
					 ?>
                </td>
                <td>
                	<?php echo $ad['Category']['name']; ?>
                </td>
                <!--<td>
                    <?php //echo $this->Html->link($ad['User']['name'], array('controller' => 'users', 'action' => 'view', $ad['User']['id'])); ?>
                </td>-->
                
                <!--<th><td><?php  //if( $ad['Ad']['approved']=='1'){echo $this->Html->image('/img/icons/tick.png', array());}else{echo $this->Html->image('/img/icons/cross.png', array());}; ?>&nbsp;</td>-->
                <!--<th><td><?php //echo $ad['Ad']['approved_date']; ?>&nbsp;</td> -->
                <td><?php echo $ad['Ad']['created']; ?>&nbsp;</td>
            	
                </tr>
                </table>
                </h3>
                <div>
                	
                 	<?php //echo $this->Html->link(__('View', true), array('action' => 'view', $ad['Ad']['id'])); ?>
                    <?php //echo $this->Html->link(__('Edit', true), array('action' => 'edit', $ad['Ad']['id'])); ?>
                    <?php //echo $this->Html->link(__('Delete', true), array('action' => 'delete', $ad['Ad']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $ad['Ad']['id'])); ?>
 				Locations proposed:<br />
                <?php if($ad['Ad']['upload_id']!=0){
                	echo $this->Html->link('Download', array('controller'=>'uploads', 'action'=>'download', $ad['Upload']['id']));
				}
				?>
                <?php echo $this->Html->link('Send Message to submitter', array('controller'=>'users', 'action'=>'sendmessage', $ad['User']['id']))?>
                <br />
                <?php echo $this->Html->link('Edit Ad', array('controller'=>'ads','action'=>'edit',$ad['Ad']['id'])); ?>
                <?php //debugger::dump($ad['AdsLocations']); ?>
                <table>
                	<tr>
                    	<th><?php echo $this->Paginator->sort('name');?></th>
                        <th><?php echo $this->Paginator->sort('description');?></th>
                        <th><?php echo $this->Paginator->sort('address');?></th>
                       
                        <th><?php echo $this->Paginator->sort('active');?></th>
                        <th><?php echo $this->Paginator->sort('created');?></th>
                        <th><?php echo $this->Paginator->sort('approved');?></th>
                    
                         <!--<th><?php //echo $this->Paginator->sort('reviewed');?></th>-->
                    </tr>
                    <?php foreach($ad['Location'] as $location): ?>
                    <?php //debugger::dump($location); ?>
                    <?php //debugger::dump($location['AdsLocation']); ?>
                    	<?php //if($location['user_id'] == $userid): ?>
                            <tr>
                                <td><?php echo $location['name']; ?>&nbsp;</td>
                                <td><?php echo $location['description']; ?>&nbsp;</td>
                                <td><?php echo $location['address1']; ?>&nbsp;
                                <?php if($location['address2'] != '' || !empty($location['address2']) || !isset($location['address2'])){echo '<br />'.$location['address2'];} ?>
                                <br /><?php echo $location['city'].', '; ?>
                                <?php echo $location['state']; ?>
                                <?php echo $location['zip']; ?>
                   
                                <td><?php if($location['active']=='1'){echo $this->Html->image('/img/icons/tick.png', array( 'rel' => $location['AdsLocation']['id'].'-3'));}else{echo $this->Html->image('/img/icons/cross.png', array( 'rel' => $location['AdsLocation']['id'].'-3'));}; ?>&nbsp;</td>
                                <td><?php echo $location['created']; ?>&nbsp;</td>
                                <td><?php
                                //echo $location['AdsLocation']['id'] ;
                                 if ($location['AdsLocation']['approved'] == 1) {
                                    //echo $this->Html->image('/img/icons/tick.png', array('class' => 'permission-toggle', 'rel' => $location['AdsLocation']['id'].'-3'));
                                } else {
                                    //echo $this->Html->image('/img/icons/cross.png', array('class' => 'permission-toggle', 'rel' => $location['AdsLocation']['id'].'-3'));
                                }
                                    echo $this->Form->input('AdsLocation.'.$r.'.id', array('value'=> $location['AdsLocation']['id'], 'type'=>'hidden'));
                                    
                                    $val = $location['AdsLocation']['approved'];
                                        echo $this->Form->input('AdsLocation.'.$r.'.approved', array('value'=>$val, 'label'=>false, 'options' => array(
										'1'=>'Approved',
										'0'=>'--',
										'-1'=>'Denied'
										))); 
                                    
                                    
                                ?>
                                    </td>
                                    
                                    <!--<td><?php
                                    /* if($location['AdsLocation']['reviewed']=='1'){
                                        echo $this->Form->input('AdsLocation.'.$r.'.reviewed', array('label'=>false, 'checked'=>true));
                                    }else{
                                        echo $this->Form->input('AdsLocation.'.$r.'.reviewed', array('label'=>false));
                                    }
									*/
                            ?>
                                </td>-->
                                
                            </tr>
                            <?php //endif; ?>
                    <?php $r++; endforeach; ?>
                </table>
                <div align="right">
                </div>
            </div>
        <?php $r++; endforeach; ?>
  
	</div>
   
    <?php echo $this->Form->end(__('Submit', true));?>
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
<!--
<div class="actions">
	<h3><?php //__('Actions'); ?></h3>
	<ul>
		<li><?php //echo $this->Html->link(__('New Ad', true), array('action' => 'add')); ?></li>
		<li><?php //echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('List Locations', true), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Location', true), array('controller' => 'locations', 'action' => 'add')); ?> </li>
	</ul>
</div>-->