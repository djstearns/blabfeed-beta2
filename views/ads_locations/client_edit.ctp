<?php foreach($ads  as $loc){debugger::dump($loc);  debugger::dump($loc['Location']);} ?>
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
            <th><?php echo $this->Paginator->sort('image');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('approved');?></th>
			<th><?php echo $this->Paginator->sort('approved_date');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
	</tr>
    </table>
     <?php echo $this->Form->create('AdsLocation');?>
    <div id="accordion">
   
		<?php
        $i = 0;
		$r = 0;
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
					 <?php echo $this->Html->image($ad['Ad']['Upload']['name'], array('url'=> array('controller' => 'upload', 'action' => 'view', $ad['Ad']['Upload']['id']), 'width'=> 100, 'height'=>100)); ?>
                </td>
                <td>
                    <?php echo $this->Html->link($ad['Ad']['User']['name'], array('controller' => 'users', 'action' => 'view', $ad['Ad']['User']['id'])); ?>
                </td>
                
                <td><?php echo $ad['Ad']['approved']; ?>&nbsp;</td>
                <td><?php echo $ad['Ad']['approved_date']; ?>&nbsp;</td>
                <td><?php echo $ad['Ad']['created']; ?>&nbsp;</td>
            
                </tr>
                </table>
                </h3>
                <div>
                	
                 	<?php //echo $this->Html->link(__('View', true), array('action' => 'view', $ad['Ad']['id'])); ?>
                    <?php //echo $this->Html->link(__('Edit', true), array('action' => 'edit', $ad['Ad']['id'])); ?>
                    <?php //echo $this->Html->link(__('Delete', true), array('action' => 'delete', $ad['Ad']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $ad['Ad']['id'])); ?>
 				Locations proposed:
                <table>
                	<tr>
                    	<th><?php echo $this->Paginator->sort('name');?></th>
                        <th><?php echo $this->Paginator->sort('description');?></th>
                        <th><?php echo $this->Paginator->sort('address1');?></th>
                        <th><?php echo $this->Paginator->sort('address2');?></th>
                        <th><?php echo $this->Paginator->sort('city');?></th>
                        <th><?php echo $this->Paginator->sort('state');?></th>
                        <th><?php echo $this->Paginator->sort('zip');?></th>
                        <th><?php echo $this->Paginator->sort('active');?></th>
                        <th><?php echo $this->Paginator->sort('approve');?></th>
                        <th><?php echo $this->Paginator->sort('deny');?></th>
                        <th><?php echo $this->Paginator->sort('review');?></th>
                    </tr>
                    <?php //foreach($ad['Location'] as $location): ?>
                    	<tr>
                        	<td><?php echo $ad['Location']['name']; ?>&nbsp;</td>
                            <td><?php echo $ad['Location']['description']; ?>&nbsp;</td>
                            <td><?php echo $ad['Location']['address1']; ?>&nbsp;</td>
                            <td><?php echo $ad['Location']['address2']; ?>&nbsp;</td>
                            <td><?php echo $ad['Location']['city']; ?>&nbsp;</td>
                            <td><?php echo $ad['Location']['state']; ?>&nbsp;</td>
                            <td><?php echo $ad['Location']['zip']; ?>&nbsp;</td>
               
                            <td><?php echo $ad['Location']['active']; ?>&nbsp;</td>
                            <td><?php echo $this->Form->input($r.'.approved', array('value'=>$ad['AdsLocation']['approved'])); 
									  echo $this->Form->input($r.'.id', array('value'=>$ad['AdsLocation']['id']));
								?>&nbsp;
                            </td>
                            
                             <td><?php echo $this->Form->input($r.'.denied', array('value'=>$ad['AdsLocation']['denied'])); 
									
								?>&nbsp;
                            </td>
                            <td><?php echo $this->Form->input($r.'.reviewed', array('value'=>$ad['AdsLocation']['reviewed'])); 
									
								?>&nbsp;
                            </td>
                        </tr>
                    <?php //endforeach; ?>
                </table>
            
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
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Ad', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations', true), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location', true), array('controller' => 'locations', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="adsLocations form">

	<fieldset>
 		<legend><?php __('Client Edit Ads Location'); ?></legend>
	<?php
		echo $this->Form->input('approved');
		echo $this->Form->input('denied');
		echo $this->Form->input('reviewed');
	?>
	</fieldset>

</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('AdsLocation.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('AdsLocation.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ads Locations', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Ads', true), array('controller' => 'ads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ad', true), array('controller' => 'ads', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations', true), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location', true), array('controller' => 'locations', 'action' => 'add')); ?> </li>
	</ul>
</div>