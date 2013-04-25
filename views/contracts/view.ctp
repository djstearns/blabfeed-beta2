<div class="contracts view">
<h2><?php  __('Contract');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $contract['Contract']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Device'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($contract['Device']['id'], array('controller' => 'devices', 'action' => 'view', $contract['Device']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Lastupdate'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $contract['Contract']['lastupdate']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updatefrequency'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $contract['Contract']['updatefrequency']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $contract['Contract']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $contract['Contract']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Contract', true), array('action' => 'edit', $contract['Contract']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Contract', true), array('action' => 'delete', $contract['Contract']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $contract['Contract']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Contracts', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contract', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Devices', true), array('controller' => 'devices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Device', true), array('controller' => 'devices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Deviceuserlogs', true), array('controller' => 'deviceuserlogs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Deviceuserlog', true), array('controller' => 'deviceuserlogs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Devices');?></h3>
	<?php if (!empty($contract['Device'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Devicetype Id'); ?></th>
		<th><?php __('BlabSerial'); ?></th>
		<th><?php __('Serial'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Mediasignagename'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Contract Id'); ?></th>
		<th><?php __('Location Id'); ?></th>
		<th><?php __('Sublocationdesc'); ?></th>
		<th><?php __('Status'); ?></th>
		<th><?php __('Scheduledinstalldate'); ?></th>
		<th><?php __('Actualinstalldate'); ?></th>
		<th><?php __('Conditiondesc'); ?></th>
		<th><?php __('Order Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($contract['Device'] as $device):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $device['id'];?></td>
			<td><?php echo $device['devicetype_id'];?></td>
			<td><?php echo $device['blabSerial'];?></td>
			<td><?php echo $device['serial'];?></td>
			<td><?php echo $device['description'];?></td>
			<td><?php echo $device['mediasignagename'];?></td>
			<td><?php echo $device['user_id'];?></td>
			<td><?php echo $device['contract_id'];?></td>
			<td><?php echo $device['location_id'];?></td>
			<td><?php echo $device['sublocationdesc'];?></td>
			<td><?php echo $device['status'];?></td>
			<td><?php echo $device['scheduledinstalldate'];?></td>
			<td><?php echo $device['actualinstalldate'];?></td>
			<td><?php echo $device['conditiondesc'];?></td>
			<td><?php echo $device['order_id'];?></td>
			<td><?php echo $device['created'];?></td>
			<td><?php echo $device['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'devices', 'action' => 'view', $device['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'devices', 'action' => 'edit', $device['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'devices', 'action' => 'delete', $device['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $device['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Device', true), array('controller' => 'devices', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Deviceuserlogs');?></h3>
	<?php if (!empty($contract['Deviceuserlog'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Device Id'); ?></th>
		<th><?php __('Contract Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Feild'); ?></th>
		<th><?php __('Changedfrom'); ?></th>
		<th><?php __('Changedto'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($contract['Deviceuserlog'] as $deviceuserlog):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $deviceuserlog['id'];?></td>
			<td><?php echo $deviceuserlog['device_id'];?></td>
			<td><?php echo $deviceuserlog['contract_id'];?></td>
			<td><?php echo $deviceuserlog['user_id'];?></td>
			<td><?php echo $deviceuserlog['feild'];?></td>
			<td><?php echo $deviceuserlog['changedfrom'];?></td>
			<td><?php echo $deviceuserlog['changedto'];?></td>
			<td><?php echo $deviceuserlog['created'];?></td>
			<td><?php echo $deviceuserlog['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'deviceuserlogs', 'action' => 'view', $deviceuserlog['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'deviceuserlogs', 'action' => 'edit', $deviceuserlog['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'deviceuserlogs', 'action' => 'delete', $deviceuserlog['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $deviceuserlog['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Deviceuserlog', true), array('controller' => 'deviceuserlogs', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
