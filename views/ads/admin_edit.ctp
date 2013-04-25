<div class="ads form">
<?php echo $this->Form->create('Ad');?>
	<fieldset>
 		<legend><?php __('Admin Edit Ad'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('user_id');
		echo $this->Form->input('upload_id');
		echo $this->Form->input('approved');
		echo $this->Form->input('approved_date');
		echo $this->Form->input('created');
		echo $this->Form->input('Location', array('type'=>'checkbox'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Ad.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Ad.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ads', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations', true), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location', true), array('controller' => 'locations', 'action' => 'add')); ?> </li>
	</ul>
</div>