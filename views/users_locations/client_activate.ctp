<div class="usersLocations form">
<?php echo $this->Form->create('UsersLocation');?>
	<fieldset>
 		<legend><?php __('Client Edit Users Location'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('location_id');
		echo $this->Form->input('hasaccess');
		echo $this->Form->input('invitecode');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('UsersLocation.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('UsersLocation.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users Locations', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations', true), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location', true), array('controller' => 'locations', 'action' => 'add')); ?> </li>
	</ul>
</div>