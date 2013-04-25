<div class="deviceuserlogs index">
	<h2><?php __('Deviceuserlogs');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('device_id');?></th>
			<th><?php echo $this->Paginator->sort('contract_id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('feild');?></th>
			<th><?php echo $this->Paginator->sort('changedfrom');?></th>
			<th><?php echo $this->Paginator->sort('changedto');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($deviceuserlogs as $deviceuserlog):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $deviceuserlog['Deviceuserlog']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($deviceuserlog['Device']['id'], array('controller' => 'devices', 'action' => 'view', $deviceuserlog['Device']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($deviceuserlog['Contract']['id'], array('controller' => 'contracts', 'action' => 'view', $deviceuserlog['Contract']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($deviceuserlog['User']['name'], array('controller' => 'users', 'action' => 'view', $deviceuserlog['User']['id'])); ?>
		</td>
		<td><?php echo $deviceuserlog['Deviceuserlog']['feild']; ?>&nbsp;</td>
		<td><?php echo $deviceuserlog['Deviceuserlog']['changedfrom']; ?>&nbsp;</td>
		<td><?php echo $deviceuserlog['Deviceuserlog']['changedto']; ?>&nbsp;</td>
		<td><?php echo $deviceuserlog['Deviceuserlog']['created']; ?>&nbsp;</td>
		<td><?php echo $deviceuserlog['Deviceuserlog']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $deviceuserlog['Deviceuserlog']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $deviceuserlog['Deviceuserlog']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $deviceuserlog['Deviceuserlog']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $deviceuserlog['Deviceuserlog']['id'])); ?>
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
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Deviceuserlog', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Devices', true), array('controller' => 'devices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Device', true), array('controller' => 'devices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contracts', true), array('controller' => 'contracts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contract', true), array('controller' => 'contracts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>