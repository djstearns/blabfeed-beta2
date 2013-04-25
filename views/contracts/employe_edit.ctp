<div class="contracts form">
<?php echo $this->Form->create('Contract');?>
	<fieldset>
 		<legend><?php __('Admin Edit Contract'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('device_id');
		echo $this->Form->input('lastupdate');
		echo $this->Form->input('updatefrequency');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Contract.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Contract.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Contracts', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Devices', true), array('controller' => 'devices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Device', true), array('controller' => 'devices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Deviceuserlogs', true), array('controller' => 'deviceuserlogs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Deviceuserlog', true), array('controller' => 'deviceuserlogs', 'action' => 'add')); ?> </li>
	</ul>
</div>