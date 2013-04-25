<div class="ordersDevicetypes view">
<h2><?php  __('Orders Devicetype');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ordersDevicetype['OrdersDevicetype']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Order'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($ordersDevicetype['Order']['id'], array('controller' => 'orders', 'action' => 'view', $ordersDevicetype['Order']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Devicetype'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($ordersDevicetype['Devicetype']['name'], array('controller' => 'devicetypes', 'action' => 'view', $ordersDevicetype['Devicetype']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Qty'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ordersDevicetype['OrdersDevicetype']['qty']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ordersDevicetype['OrdersDevicetype']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ordersDevicetype['OrdersDevicetype']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Orders Devicetype', true), array('action' => 'edit', $ordersDevicetype['OrdersDevicetype']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Orders Devicetype', true), array('action' => 'delete', $ordersDevicetype['OrdersDevicetype']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $ordersDevicetype['OrdersDevicetype']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders Devicetypes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orders Devicetype', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders', true), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order', true), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Devicetypes', true), array('controller' => 'devicetypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Devicetype', true), array('controller' => 'devicetypes', 'action' => 'add')); ?> </li>
	</ul>
</div>
