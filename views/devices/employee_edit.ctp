<div class="devices form">
<?php echo $this->Form->create('Device');?>
	<fieldset>
 		<legend><?php __('Employee Edit Device'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('devicetype_id');
		echo $this->Form->input('blabSerial');
		echo $this->Form->input('serial');
		echo $this->Form->input('description');
		echo $this->Form->input('mediasignagename');
		echo $this->Form->input('user_id');
		echo $this->Form->input('contract_id');
		echo $this->Form->input('location_id');
		echo $this->Form->input('sublocationdesc');
		echo $this->Form->input('status');
		echo $this->Form->input('scheduledinstalldate');
		echo $this->Form->input('actualinstalldate');
		echo $this->Form->input('conditiondesc');
		echo $this->Form->input('order_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Device.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Device.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Devices', true), array('action' => 'index'));?></li>
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