<div class="usercredits form">
<?php echo $this->Form->create('Usercredit');?>
	<fieldset>
 		<legend><?php __('Add Usercredit'); ?></legend>
	<?php
		echo $this->Form->input('type');
		echo $this->Form->input('amt');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Usercredits', true), array('action' => 'index'));?></li>
	</ul>
</div>