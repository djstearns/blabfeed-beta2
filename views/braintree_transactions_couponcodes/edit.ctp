<div class="braintreeTransactionsCouponcodes form">
<?php echo $this->Form->create('BraintreeTransactionsCouponcode');?>
	<fieldset>
 		<legend><?php __('Edit Braintree Transactions Couponcode'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('braintree_transaction_id');
		echo $this->Form->input('couponcode_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('BraintreeTransactionsCouponcode.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('BraintreeTransactionsCouponcode.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Braintree Transactions Couponcodes', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Braintree Transactions', true), array('controller' => 'braintree_transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Braintree Transaction', true), array('controller' => 'braintree_transactions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Couponcodes', true), array('controller' => 'couponcodes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Couponcode', true), array('controller' => 'couponcodes', 'action' => 'add')); ?> </li>
	</ul>
</div>