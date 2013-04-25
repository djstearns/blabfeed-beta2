<div class="deviceuserlogs form">
<?php echo $this->Form->create('Deviceuserlog');?>
	<fieldset>
 		<legend><?php __('Admin Add Deviceuserlog'); ?></legend>
	<?php
		echo $this->Form->input('device_id');
		echo $this->Form->input('contract_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('feild');
		echo $this->Form->input('changedfrom');
		echo $this->Form->input('changedto');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Deviceuserlogs', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Devices', true), array('controller' => 'devices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Device', true), array('controller' => 'devices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contracts', true), array('controller' => 'contracts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contract', true), array('controller' => 'contracts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>