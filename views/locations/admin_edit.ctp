<div class="locations form">
<?php echo $this->Form->create('Location');?>
	<fieldset>
 		<legend><?php __('Admin Edit Location'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('address1');
		echo $this->Form->input('address2');
		echo $this->Form->input('city');
		echo $this->Form->input('state');
		echo $this->Form->input('zip');
		echo $this->Form->input('lat');
		echo $this->Form->input('lng');
		echo $this->Form->input('user_id');
		echo $this->Form->input('active');
		echo $this->Form->input('public');
		echo $this->Form->input('avgreachpermon');
		//echo $this->Form->input('Ad', array('type'=>'checkbox'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Location.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Location.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Locations', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ads', true), array('controller' => 'ads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ad', true), array('controller' => 'ads', 'action' => 'add')); ?> </li>
	</ul>
</div>