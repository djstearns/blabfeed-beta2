<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Location', true), array('action' => 'add')); ?></li>
	</ul>
</div>
<div class="locations index">
	<h2><?php __('Locations');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('address1');?></th>
			<!--<th><?php //echo $this->Paginator->sort('address2');?></th>-->
			<th><?php echo $this->Paginator->sort('city');?></th>
			<th><?php echo $this->Paginator->sort('state');?></th>
			<th><?php echo $this->Paginator->sort('zip');?></th>
			<!--<th><?php //echo $this->Paginator->sort('user_id');?></th>-->
			<th><?php echo $this->Paginator->sort('active');?></th>
			<th><?php echo $this->Paginator->sort('Estimated monthy reach', 'avgreachpermon');?></th>
            <!--<th><?php echo $this->Paginator->sort('created');?></th>-->
            
			<th class="actions"><?php __('Actions');?></th>
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
		<td><?php echo $location['Location']['id']; ?>&nbsp;</td>
		<td><?php echo $location['Location']['name']; ?>&nbsp;</td>
		<td><?php echo $location['Location']['description']; ?>&nbsp;</td>
		<td><?php echo $location['Location']['address1']; ?>&nbsp;</td>
		<!--<td><?php //echo $location['Location']['address2']; ?>&nbsp;</td>-->
		<td><?php echo $location['Location']['city']; ?>&nbsp;</td>
		<td><?php echo $location['Location']['state']; ?>&nbsp;</td>
		<td><?php echo $location['Location']['zip']; ?>&nbsp;</td>
		<!--<td>
			<?php //echo $this->Html->link($location['User']['name'], array('controller' => 'users', 'action' => 'view', $location['User']['id'])); ?>
		</td>-->
		<td><?php echo $location['Location']['active']; ?>&nbsp;</td>
        <td><?php echo $location['Location']['avgreachpermon']; ?>&nbsp;</td>
		<!--<td><?php //echo $location['Location']['created']; ?>&nbsp;</td>-->
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $location['Location']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $location['Location']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $location['Location']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $location['Location']['id'])); ?>
		</td>
	</tr>
    <tr>
    	<td colspan="10" align="center" <?php echo $class;?>>
        	Your blabfeed location url: <?php echo 'http://erp.blabfeed.com/ads/index.xml?id='.$location['Location']['id']; ?>
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
<!--<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php //echo $this->Html->link(__('New Location', true), array('action' => 'add')); ?></li>
		<li><?php //echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('List Ads', true), array('controller' => 'ads', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Ad', true), array('controller' => 'ads', 'action' => 'add')); ?> </li>
	</ul>
</div>-->