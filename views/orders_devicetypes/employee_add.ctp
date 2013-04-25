<div class="ordersDevicetypes form">
<?php echo $this->Form->create('OrdersDevicetype');?>
	<fieldset>
 		<legend><?php __('Employee Add Orders Devicetype'); ?></legend>
	<?php
		/*
		echo $this->Form->input('order_id');
		echo $this->Form->input('devicetype_id');
		echo $this->Form->input('qty');
	
		//echo $this->Form->input('OrdersDevicetype.0.id');
		echo $this->Form->input('OrdersDevicetype.0.order_id');
		echo $this->Form->input('OrdersDevicetype.0.devicetype_id');
		echo $this->Form->input('OrdersDevicetype.0.qty');
		
		//echo $this->Form->input('OrdersDevicetype.1.id');
		echo $this->Form->input('OrdersDevicetype.1.order_id');
		echo $this->Form->input('OrdersDevicetype.1.devicetype_id');
		echo $this->Form->input('OrdersDevicetype.1.qty');
		*/
		
		echo $this->Form->input('Order.ordernum');
		echo $this->Form->input('Order.orderdate');
		echo $this->Form->input('Order.trackingnum');
		echo $this->Form->input('Order.chatlog');
		echo $this->Form->input('Order.estrecddate');
		echo $this->Form->input('Order.recddate');
	
		
		echo $this->Form->input('OrdersDevicetype.0.qty');
		echo $this->Form->input('OrdersDevicetype.0.devicetype_id');
		echo $this->Form->input('OrdersDevicetype.1.qty');
		echo $this->Form->input('OrdersDevicetype.1.devicetype_id');
	
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Orders Devicetypes', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Orders', true), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order', true), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Devicetypes', true), array('controller' => 'devicetypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Devicetype', true), array('controller' => 'devicetypes', 'action' => 'add')); ?> </li>
	</ul>
</div>