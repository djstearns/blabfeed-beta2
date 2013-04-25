<div class="referralcredits form">
<?php echo $this->Form->create('Referralcredit');?>
	<fieldset>
 		<legend><?php __('Admin Add Referralcredit'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('referralid');
		echo $this->Form->input('amt');
		echo $this->Form->input('used');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Referralcredits', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>