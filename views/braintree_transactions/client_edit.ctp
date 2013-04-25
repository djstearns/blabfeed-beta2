<div class="braintreeTransactions form">
<?php echo $this->Form->create('BraintreeTransaction');?>
	<fieldset>
 		<legend><?php __('Edit Braintree Transaction'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('braintree_merchant_id');
		echo $this->Form->input('braintree_customer_id');
		echo $this->Form->input('braintree_credit_card_id');
		echo $this->Form->input('braintree_transaction_id');
		echo $this->Form->input('model');
		echo $this->Form->input('foreign_id');
		echo $this->Form->input('type');
		echo $this->Form->input('amount');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('BraintreeTransaction.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('BraintreeTransaction.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Braintree Transactions', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Braintree Merchants', true), array('controller' => 'braintree_merchants', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Braintree Merchant', true), array('controller' => 'braintree_merchants', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Braintree Customers', true), array('controller' => 'braintree_customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Braintree Customer', true), array('controller' => 'braintree_customers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Braintree Credit Cards', true), array('controller' => 'braintree_credit_cards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Braintree Credit Card', true), array('controller' => 'braintree_credit_cards', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Braintree Transactions', true), array('controller' => 'braintree_transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Braintree Transaction', true), array('controller' => 'braintree_transactions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Braintree Subscriptions', true), array('controller' => 'braintree_subscriptions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Braintree Subscription', true), array('controller' => 'braintree_subscriptions', 'action' => 'add')); ?> </li>
	</ul>
</div>