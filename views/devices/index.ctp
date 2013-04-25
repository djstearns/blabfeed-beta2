<div class="devices index">
	<h2><?php __('Devices');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('devicetype_id');?></th>
			<th><?php echo $this->Paginator->sort('blabSerial');?></th>
			<th><?php echo $this->Paginator->sort('serial');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('mediasignagename');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('contract_id');?></th>
			<th><?php echo $this->Paginator->sort('location_id');?></th>
			<th><?php echo $this->Paginator->sort('sublocationdesc');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th><?php echo $this->Paginator->sort('scheduledinstalldate');?></th>
			<th><?php echo $this->Paginator->sort('actualinstalldate');?></th>
			<th><?php echo $this->Paginator->sort('conditiondesc');?></th>
			<th><?php echo $this->Paginator->sort('order_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($devices as $device):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $device['Device']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($device['Devicetype']['name'], array('controller' => 'devicetypes', 'action' => 'view', $device['Devicetype']['id'])); ?>
		</td>
		<td><?php echo $device['Device']['blabSerial']; ?>&nbsp;</td>
		<td><?php echo $device['Device']['serial']; ?>&nbsp;</td>
		<td><?php echo $device['Device']['description']; ?>&nbsp;</td>
		<td><?php echo $device['Device']['mediasignagename']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($device['User']['name'], array('controller' => 'users', 'action' => 'view', $device['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($device['Contract']['id'], array('controller' => 'contracts', 'action' => 'view', $device['Contract']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($device['Location']['name'], array('controller' => 'locations', 'action' => 'view', $device['Location']['id'])); ?>
		</td>
		<td><?php echo $device['Device']['sublocationdesc']; ?>&nbsp;</td>
		<td><?php echo $device['Device']['status']; ?>&nbsp;</td>
		<td><?php echo $device['Device']['scheduledinstalldate']; ?>&nbsp;</td>
		<td><?php echo $device['Device']['actualinstalldate']; ?>&nbsp;</td>
		<td><?php echo $device['Device']['conditiondesc']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($device['Order']['id'], array('controller' => 'orders', 'action' => 'view', $device['Order']['id'])); ?>
		</td>
		<td><?php echo $device['Device']['created']; ?>&nbsp;</td>
		<td><?php echo $device['Device']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $device['Device']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $device['Device']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $device['Device']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $device['Device']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Device', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Devicetypes', true), array('controller' => 'devicetypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Devicetype', true), array('controller' => 'devicetypes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contracts', true), array('controller' => 'contracts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contract', true), array('controller' => 'contracts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations', true), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location', true), array('controller' => 'locations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders', true), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order', true), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Deviceuserlogs', true), array('controller' => 'deviceuserlogs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Deviceuserlog', true), array('controller' => 'deviceuserlogs', 'action' => 'add')); ?> </li>
	</ul>
</div>