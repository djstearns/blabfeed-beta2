<div class="usercredits form">
<?php echo $this->Form->create('Usercredit');?>
	<fieldset>
 		<legend><?php __('Admin Edit Usercredit'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('type');
		echo $this->Form->input('amt');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Usercredit.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Usercredit.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Usercredits', true), array('action' => 'index'));?></li>
	</ul>
</div>