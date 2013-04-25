<div class="braintreeCreditCards form">
<?php echo $this->Form->create('BraintreeCreditCard');?>
	<fieldset>
 		<legend><?php __('Client Add Braintree Credit Card'); ?></legend>
	<?php
		echo $this->Form->input('braintree_merchant_id');
		echo $this->Form->input('braintree_customer_id');
		echo $this->Form->input('braintree_address_id');
		echo $this->Form->input('unique_card_identifier');
		echo $this->Form->input('cardholder_name');
		echo $this->Form->input('card_type');
		echo $this->Form->input('masked_number');
		echo $this->Form->input('expiration_date');
		echo $this->Form->input('is_default');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Braintree Credit Cards', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Braintree Merchants', true), array('controller' => 'braintree_merchants', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Braintree Merchant', true), array('controller' => 'braintree_merchants', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Braintree Customers', true), array('controller' => 'braintree_customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Braintree Customer', true), array('controller' => 'braintree_customers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Braintree Addresses', true), array('controller' => 'braintree_addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Braintree Address', true), array('controller' => 'braintree_addresses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Braintree Credit Card Relations', true), array('controller' => 'braintree_credit_card_relations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Braintree Credit Card Relation', true), array('controller' => 'braintree_credit_card_relations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Braintree Subscriptions', true), array('controller' => 'braintree_subscriptions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Braintree Subscription', true), array('controller' => 'braintree_subscriptions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Braintree Transactions', true), array('controller' => 'braintree_transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Braintree Transaction', true), array('controller' => 'braintree_transactions', 'action' => 'add')); ?> </li>
	</ul>
</div>