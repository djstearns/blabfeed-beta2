<div class="braintreeCustomers view">
<h2><?php  __('Braintree Customer');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeCustomer['BraintreeCustomer']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Braintree Merchant'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($braintreeCustomer['BraintreeMerchant']['id'], array('controller' => 'braintree_merchants', 'action' => 'view', $braintreeCustomer['BraintreeMerchant']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Model'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeCustomer['BraintreeCustomer']['model']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Foreign Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeCustomer['BraintreeCustomer']['foreign_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('First Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeCustomer['BraintreeCustomer']['first_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Last Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeCustomer['BraintreeCustomer']['last_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Company'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeCustomer['BraintreeCustomer']['company']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeCustomer['BraintreeCustomer']['email']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Phone'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeCustomer['BraintreeCustomer']['phone']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fax'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeCustomer['BraintreeCustomer']['fax']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Website'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeCustomer['BraintreeCustomer']['website']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeCustomer['BraintreeCustomer']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeCustomer['BraintreeCustomer']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Braintree Customer', true), array('action' => 'edit', $braintreeCustomer['BraintreeCustomer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Braintree Customer', true), array('action' => 'delete', $braintreeCustomer['BraintreeCustomer']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $braintreeCustomer['BraintreeCustomer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Braintree Customers', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Braintree Customer', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Braintree Merchants', true), array('controller' => 'braintree_merchants', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Braintree Merchant', true), array('controller' => 'braintree_merchants', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Braintree Addresses', true), array('controller' => 'braintree_addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Braintree Address', true), array('controller' => 'braintree_addresses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Braintree Credit Cards', true), array('controller' => 'braintree_credit_cards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Braintree Credit Card', true), array('controller' => 'braintree_credit_cards', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Braintree Subscriptions', true), array('controller' => 'braintree_subscriptions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Braintree Subscription', true), array('controller' => 'braintree_subscriptions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Braintree Transactions', true), array('controller' => 'braintree_transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Braintree Transaction', true), array('controller' => 'braintree_transactions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Braintree Addresses');?></h3>
	<?php if (!empty($braintreeCustomer['BraintreeAddress'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Braintree Merchant Id'); ?></th>
		<th><?php __('Braintree Customer Id'); ?></th>
		<th><?php __('Unique Address Identifier'); ?></th>
		<th><?php __('First Name'); ?></th>
		<th><?php __('Last Name'); ?></th>
		<th><?php __('Company'); ?></th>
		<th><?php __('Street Address'); ?></th>
		<th><?php __('Extended Address'); ?></th>
		<th><?php __('Locality'); ?></th>
		<th><?php __('Region'); ?></th>
		<th><?php __('Postal Code'); ?></th>
		<th><?php __('Country Code Alpha 2'); ?></th>
		<th><?php __('Country Code Alpha 3'); ?></th>
		<th><?php __('Country Code Numeric'); ?></th>
		<th><?php __('Country Name'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($braintreeCustomer['BraintreeAddress'] as $braintreeAddress):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $braintreeAddress['id'];?></td>
			<td><?php echo $braintreeAddress['braintree_merchant_id'];?></td>
			<td><?php echo $braintreeAddress['braintree_customer_id'];?></td>
			<td><?php echo $braintreeAddress['unique_address_identifier'];?></td>
			<td><?php echo $braintreeAddress['first_name'];?></td>
			<td><?php echo $braintreeAddress['last_name'];?></td>
			<td><?php echo $braintreeAddress['company'];?></td>
			<td><?php echo $braintreeAddress['street_address'];?></td>
			<td><?php echo $braintreeAddress['extended_address'];?></td>
			<td><?php echo $braintreeAddress['locality'];?></td>
			<td><?php echo $braintreeAddress['region'];?></td>
			<td><?php echo $braintreeAddress['postal_code'];?></td>
			<td><?php echo $braintreeAddress['country_code_alpha_2'];?></td>
			<td><?php echo $braintreeAddress['country_code_alpha_3'];?></td>
			<td><?php echo $braintreeAddress['country_code_numeric'];?></td>
			<td><?php echo $braintreeAddress['country_name'];?></td>
			<td><?php echo $braintreeAddress['created'];?></td>
			<td><?php echo $braintreeAddress['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'braintree_addresses', 'action' => 'view', $braintreeAddress['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'braintree_addresses', 'action' => 'edit', $braintreeAddress['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'braintree_addresses', 'action' => 'delete', $braintreeAddress['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $braintreeAddress['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Braintree Address', true), array('controller' => 'braintree_addresses', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Braintree Credit Cards');?></h3>
	<?php if (!empty($braintreeCustomer['BraintreeCreditCard'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Token'); ?></th>
		<th><?php __('Braintree Merchant Id'); ?></th>
		<th><?php __('Braintree Customer Id'); ?></th>
		<th><?php __('Braintree Address Id'); ?></th>
		<th><?php __('Unique Card Identifier'); ?></th>
		<th><?php __('Cardholder Name'); ?></th>
		<th><?php __('Card Type'); ?></th>
		<th><?php __('Masked Number'); ?></th>
		<th><?php __('Expiration Date'); ?></th>
		<th><?php __('Is Default'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($braintreeCustomer['BraintreeCreditCard'] as $braintreeCreditCard):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $braintreeCreditCard['token'];?></td>
			<td><?php echo $braintreeCreditCard['braintree_merchant_id'];?></td>
			<td><?php echo $braintreeCreditCard['braintree_customer_id'];?></td>
			<td><?php echo $braintreeCreditCard['braintree_address_id'];?></td>
			<td><?php echo $braintreeCreditCard['unique_card_identifier'];?></td>
			<td><?php echo $braintreeCreditCard['cardholder_name'];?></td>
			<td><?php echo $braintreeCreditCard['card_type'];?></td>
			<td><?php echo $braintreeCreditCard['masked_number'];?></td>
			<td><?php echo $braintreeCreditCard['expiration_date'];?></td>
			<td><?php echo $braintreeCreditCard['is_default'];?></td>
			<td><?php echo $braintreeCreditCard['created'];?></td>
			<td><?php echo $braintreeCreditCard['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'braintree_credit_cards', 'action' => 'view', $braintreeCreditCard['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'braintree_credit_cards', 'action' => 'edit', $braintreeCreditCard['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'braintree_credit_cards', 'action' => 'delete', $braintreeCreditCard['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $braintreeCreditCard['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Braintree Credit Card', true), array('controller' => 'braintree_credit_cards', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Braintree Subscriptions');?></h3>
	<?php if (!empty($braintreeCustomer['BraintreeSubscription'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Braintree Merchant Id'); ?></th>
		<th><?php __('Braintree Customer Id'); ?></th>
		<th><?php __('Braintree Credit Card Id'); ?></th>
		<th><?php __('Braintree Transaction Id'); ?></th>
		<th><?php __('Model'); ?></th>
		<th><?php __('Foreign Id'); ?></th>
		<th><?php __('Type'); ?></th>
		<th><?php __('Amount'); ?></th>
		<th><?php __('Status'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('PlanId'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($braintreeCustomer['BraintreeSubscription'] as $braintreeSubscription):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $braintreeSubscription['id'];?></td>
			<td><?php echo $braintreeSubscription['braintree_merchant_id'];?></td>
			<td><?php echo $braintreeSubscription['braintree_customer_id'];?></td>
			<td><?php echo $braintreeSubscription['braintree_credit_card_id'];?></td>
			<td><?php echo $braintreeSubscription['braintree_transaction_id'];?></td>
			<td><?php echo $braintreeSubscription['model'];?></td>
			<td><?php echo $braintreeSubscription['foreign_id'];?></td>
			<td><?php echo $braintreeSubscription['type'];?></td>
			<td><?php echo $braintreeSubscription['amount'];?></td>
			<td><?php echo $braintreeSubscription['status'];?></td>
			<td><?php echo $braintreeSubscription['created'];?></td>
			<td><?php echo $braintreeSubscription['modified'];?></td>
			<td><?php echo $braintreeSubscription['planId'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'braintree_subscriptions', 'action' => 'view', $braintreeSubscription['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'braintree_subscriptions', 'action' => 'edit', $braintreeSubscription['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'braintree_subscriptions', 'action' => 'delete', $braintreeSubscription['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $braintreeSubscription['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Braintree Subscription', true), array('controller' => 'braintree_subscriptions', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Braintree Transactions');?></h3>
	<?php if (!empty($braintreeCustomer['BraintreeTransaction'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Braintree Merchant Id'); ?></th>
		<th><?php __('Braintree Customer Id'); ?></th>
		<th><?php __('Braintree Credit Card Id'); ?></th>
		<th><?php __('Braintree Transaction Id'); ?></th>
		<th><?php __('Model'); ?></th>
		<th><?php __('Foreign Id'); ?></th>
		<th><?php __('Type'); ?></th>
		<th><?php __('Amount'); ?></th>
		<th><?php __('Status'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($braintreeCustomer['BraintreeTransaction'] as $braintreeTransaction):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $braintreeTransaction['id'];?></td>
			<td><?php echo $braintreeTransaction['braintree_merchant_id'];?></td>
			<td><?php echo $braintreeTransaction['braintree_customer_id'];?></td>
			<td><?php echo $braintreeTransaction['braintree_credit_card_id'];?></td>
			<td><?php echo $braintreeTransaction['braintree_transaction_id'];?></td>
			<td><?php echo $braintreeTransaction['model'];?></td>
			<td><?php echo $braintreeTransaction['foreign_id'];?></td>
			<td><?php echo $braintreeTransaction['type'];?></td>
			<td><?php echo $braintreeTransaction['amount'];?></td>
			<td><?php echo $braintreeTransaction['status'];?></td>
			<td><?php echo $braintreeTransaction['created'];?></td>
			<td><?php echo $braintreeTransaction['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'braintree_transactions', 'action' => 'view', $braintreeTransaction['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'braintree_transactions', 'action' => 'edit', $braintreeTransaction['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'braintree_transactions', 'action' => 'delete', $braintreeTransaction['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $braintreeTransaction['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Braintree Transaction', true), array('controller' => 'braintree_transactions', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
