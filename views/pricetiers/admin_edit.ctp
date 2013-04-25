<div class="pricetiers form">
<?php echo $this->Form->create('Pricetier');?>
	<fieldset>
 		<legend><?php __('Admin Edit Pricetier'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('parent_id');
		echo $this->Form->input('numofmodel');
		echo $this->Form->input('name');
		echo $this->Form->input('price');
		echo $this->Form->input('model');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Pricetier.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Pricetier.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Pricetiers', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Pricetiers', true), array('controller' => 'pricetiers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Pricetier', true), array('controller' => 'pricetiers', 'action' => 'add')); ?> </li>
	</ul>
</div>