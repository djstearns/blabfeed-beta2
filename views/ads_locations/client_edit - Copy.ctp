<div class="adsLocations form">
<?php echo $this->Form->create('AdsLocation');?>
	<fieldset>
 		<legend><?php __('Client Edit Ads Location'); ?></legend>
	<?php
		echo $this->Form->input('approved');
		echo $this->Form->input('denied');
		echo $this->Form->input('reviewed');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('AdsLocation.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('AdsLocation.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ads Locations', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Ads', true), array('controller' => 'ads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ad', true), array('controller' => 'ads', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations', true), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location', true), array('controller' => 'locations', 'action' => 'add')); ?> </li>
	</ul>
</div>