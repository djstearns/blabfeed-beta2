<div class="pricetiers form">
<?php echo $this->Form->create('Pricetier');?>
	<fieldset>
 		<legend><?php __('Add Pricetier'); ?></legend>
	<?php
		echo $this->Form->input('parent_id');
		echo $this->Form->input('alias');
		echo $this->Form->input('price');
		echo $this->Form->input('model');
		echo $this->Form->input('lft');
		echo $this->Form->input('rght');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Pricetiers', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Pricetiers', true), array('controller' => 'pricetiers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Pricetier', true), array('controller' => 'pricetiers', 'action' => 'add')); ?> </li>
	</ul>
</div>