<div class="devices view">
<h2><?php  __('Device');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $device['Device']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Devicetype'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($device['Devicetype']['name'], array('controller' => 'devicetypes', 'action' => 'view', $device['Devicetype']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('BlabSerial'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $device['Device']['blabSerial']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Serial'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $device['Device']['serial']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $device['Device']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mediasignagename'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $device['Device']['mediasignagename']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($device['User']['name'], array('controller' => 'users', 'action' => 'view', $device['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Contract'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($device['Contract']['id'], array('controller' => 'contracts', 'action' => 'view', $device['Contract']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Location'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($device['Location']['name'], array('controller' => 'locations', 'action' => 'view', $device['Location']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sublocationdesc'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $device['Device']['sublocationdesc']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $device['Device']['status']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Scheduledinstalldate'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $device['Device']['scheduledinstalldate']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Actualinstalldate'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $device['Device']['actualinstalldate']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Conditiondesc'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $device['Device']['conditiondesc']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Order'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($device['Order']['id'], array('controller' => 'orders', 'action' => 'view', $device['Order']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $device['Device']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $device['Device']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Device', true), array('action' => 'edit', $device['Device']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Device', true), array('action' => 'delete', $device['Device']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $device['Device']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Devices', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Device', true), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php __('Related Contracts');?></h3>
	<?php if (!empty($device['Contract'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Device Id'); ?></th>
		<th><?php __('Lastupdate'); ?></th>
		<th><?php __('Updatefrequency'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($device['Contract'] as $contract):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $contract['id'];?></td>
			<td><?php echo $contract['device_id'];?></td>
			<td><?php echo $contract['lastupdate'];?></td>
			<td><?php echo $contract['updatefrequency'];?></td>
			<td><?php echo $contract['created'];?></td>
			<td><?php echo $contract['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'contracts', 'action' => 'view', $contract['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'contracts', 'action' => 'edit', $contract['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'contracts', 'action' => 'delete', $contract['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $contract['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Contract', true), array('controller' => 'contracts', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Deviceuserlogs');?></h3>
	<?php if (!empty($device['Deviceuserlog'])):?>
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
		foreach ($device['Deviceuserlog'] as $deviceuserlog):
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
