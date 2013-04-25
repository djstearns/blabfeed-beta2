<div class="orders form">
<?php echo $this->Form->create('Order');?>
	<fieldset>
 		<legend><?php __('Employee Add Order'); ?></legend>
	<?php
	/*
		echo $this->Form->input('user_id');
		echo $this->Form->input('ordernum');
		echo $this->Form->input('orderdate');
		echo $this->Form->input('trackingnum');
		echo $this->Form->input('chatlog');
		echo $this->Form->input('estrecddate');
		echo $this->Form->input('recddate');
		echo $this->Form->input('Devicetype');
		*/
		echo $this->Form->input('Order.ordernum');
		echo $this->Form->input('Order.orderdate');
		echo $this->Form->input('Order.trackingnum');
		echo $this->Form->input('Order.chatlog');
		echo $this->Form->input('Order.estrecddate');
		echo $this->Form->input('Order.recddate');
		echo $this->Form->input('OrdersDevicestype.0.devicetype_id');
		echo $this->Form->input('OrdersDevicestype.0.qty');
		echo $this->Form->input('OrdersDevicestype.1.devicetype_id');
		echo $this->Form->input('OrdersDevicestype.1.qty');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Orders', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Devices', true), array('controller' => 'devices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Device', true), array('controller' => 'devices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Devicetypes', true), array('controller' => 'devicetypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Devicetype', true), array('controller' => 'devicetypes', 'action' => 'add')); ?> </li>
	</ul>
</div>