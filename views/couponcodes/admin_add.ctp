<div class="couponcodes form">
<?php echo $this->Form->create('Couponcode');?>
	<fieldset>
 		<legend><?php __('Admin Add Couponcode'); ?></legend>
	<?php
		echo $this->Form->input('code');
		echo $this->Form->input('amt');
		echo $this->Form->input('multiple');
		echo $this->Form->input('redeemed');
		echo $this->Form->input('user_id');
		echo $this->Form->input('braintree_transaction_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Couponcodes', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Braintree Transactions', true), array('controller' => 'braintree_transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Braintree Transaction', true), array('controller' => 'braintree_transactions', 'action' => 'add')); ?> </li>
	</ul>
</div>