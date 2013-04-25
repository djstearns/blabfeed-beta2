<div class="galleries form">
<?php echo $this->Form->create('Gallery');?>
	<fieldset>
 		<legend><?php __('Admin Edit Gallery'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('basename');
		echo $this->Form->input('dirname');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Gallery.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Gallery.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Galleries', true), array('action' => 'index'));?></li>
	</ul>
</div>