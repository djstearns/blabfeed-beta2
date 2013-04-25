<div class="impressions form">
<?php echo $this->Form->create('Impression');?>
	<fieldset>
 		<legend><?php __('Edit Impression'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('ad_id');
		echo $this->Form->input('location_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('impressiontype');
		echo $this->Form->input('devicetype');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Impression.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Impression.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Impressions', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Ads', true), array('controller' => 'ads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ad', true), array('controller' => 'ads', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations', true), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location', true), array('controller' => 'locations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>