<div class="ordersDevicetypes form">
<?php echo $this->Form->create('OrdersDevicetype');?>
	<fieldset>
 		<legend><?php __('Employee Edit Orders Devicetype'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('order_id');
		echo $this->Form->input('devicetype_id');
		echo $this->Form->input('qty');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('OrdersDevicetype.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('OrdersDevicetype.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Orders Devicetypes', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Orders', true), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order', true), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Devicetypes', true), array('controller' => 'devicetypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Devicetype', true), array('controller' => 'devicetypes', 'action' => 'add')); ?> </li>
	</ul>
</div>