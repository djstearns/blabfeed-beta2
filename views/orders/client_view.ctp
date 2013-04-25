<div class="orders view">
<h2><?php  __('Order');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($order['User']['name'], array('controller' => 'users', 'action' => 'view', $order['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ordernum'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['ordernum']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Orderdate'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['orderdate']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Trackingnum'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['trackingnum']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Chatlog'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['chatlog']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Estrecddate'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['estrecddate']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Recddate'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['recddate']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Order', true), array('action' => 'edit', $order['Order']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Order', true), array('action' => 'delete', $order['Order']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $order['Order']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Devices', true), array('controller' => 'devices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Device', true), array('controller' => 'devices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Devicetypes', true), array('controller' => 'devicetypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Devicetype', true), array('controller' => 'devicetypes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Devices');?></h3>
	<?php if (!empty($order['Device'])):?>
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
		foreach ($order['Device'] as $device):
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
	<h3><?php __('Related Devicetypes');?></h3>
	<?php if (!empty($order['Devicetype'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Modelnum'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($order['Devicetype'] as $devicetype):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $devicetype['id'];?></td>
			<td><?php echo $devicetype['name'];?></td>
			<td><?php echo $devicetype['description'];?></td>
			<td><?php echo $devicetype['modelnum'];?></td>
			<td><?php echo $devicetype['user_id'];?></td>
			<td><?php echo $devicetype['created'];?></td>
			<td><?php echo $devicetype['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'devicetypes', 'action' => 'view', $devicetype['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'devicetypes', 'action' => 'edit', $devicetype['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'devicetypes', 'action' => 'delete', $devicetype['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $devicetype['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Devicetype', true), array('controller' => 'devicetypes', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
