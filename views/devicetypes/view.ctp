<div class="devicetypes view">
<h2><?php  __('Devicetype');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $devicetype['Devicetype']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $devicetype['Devicetype']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $devicetype['Devicetype']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modelnum'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $devicetype['Devicetype']['modelnum']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($devicetype['User']['name'], array('controller' => 'users', 'action' => 'view', $devicetype['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $devicetype['Devicetype']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $devicetype['Devicetype']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Devicetype', true), array('action' => 'edit', $devicetype['Devicetype']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Devicetype', true), array('action' => 'delete', $devicetype['Devicetype']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $devicetype['Devicetype']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Devicetypes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Devicetype', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Devices', true), array('controller' => 'devices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Device', true), array('controller' => 'devices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders', true), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order', true), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Devices');?></h3>
	<?php if (!empty($devicetype['Device'])):?>
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
		foreach ($devicetype['Device'] as $device):
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
	<h3><?php __('Related Orders');?></h3>
	<?php if (!empty($devicetype['Order'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Ordernum'); ?></th>
		<th><?php __('Orderdate'); ?></th>
		<th><?php __('Trackingnum'); ?></th>
		<th><?php __('Chatlog'); ?></th>
		<th><?php __('Estrecddate'); ?></th>
		<th><?php __('Recddate'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($devicetype['Order'] as $order):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $order['id'];?></td>
			<td><?php echo $order['user_id'];?></td>
			<td><?php echo $order['ordernum'];?></td>
			<td><?php echo $order['orderdate'];?></td>
			<td><?php echo $order['trackingnum'];?></td>
			<td><?php echo $order['chatlog'];?></td>
			<td><?php echo $order['estrecddate'];?></td>
			<td><?php echo $order['recddate'];?></td>
			<td><?php echo $order['created'];?></td>
			<td><?php echo $order['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'orders', 'action' => 'view', $order['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'orders', 'action' => 'edit', $order['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'orders', 'action' => 'delete', $order['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $order['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Order', true), array('controller' => 'orders', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
