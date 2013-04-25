<div class="braintreeCreditCards view">
<h2><?php  __('Braintree Credit Card');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Token'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeCreditCard['BraintreeCreditCard']['token']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Braintree Merchant'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($braintreeCreditCard['BraintreeMerchant']['id'], array('controller' => 'braintree_merchants', 'action' => 'view', $braintreeCreditCard['BraintreeMerchant']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Braintree Customer'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($braintreeCreditCard['BraintreeCustomer']['email'], array('controller' => 'braintree_customers', 'action' => 'view', $braintreeCreditCard['BraintreeCustomer']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Braintree Address'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($braintreeCreditCard['BraintreeAddress']['id'], array('controller' => 'braintree_addresses', 'action' => 'view', $braintreeCreditCard['BraintreeAddress']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Unique Card Identifier'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeCreditCard['BraintreeCreditCard']['unique_card_identifier']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cardholder Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeCreditCard['BraintreeCreditCard']['cardholder_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Card Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeCreditCard['BraintreeCreditCard']['card_type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Masked Number'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeCreditCard['BraintreeCreditCard']['masked_number']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Expiration Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeCreditCard['BraintreeCreditCard']['expiration_date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Is Default'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeCreditCard['BraintreeCreditCard']['is_default']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeCreditCard['BraintreeCreditCard']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeCreditCard['BraintreeCreditCard']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Braintree Credit Card', true), array('action' => 'edit', $braintreeCreditCard['BraintreeCreditCard']['token'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Braintree Credit Card', true), array('action' => 'delete', $braintreeCreditCard['BraintreeCreditCard']['token']), null, sprintf(__('Are you sure you want to delete # %s?', true), $braintreeCreditCard['BraintreeCreditCard']['token'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Braintree Credit Cards', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Braintree Credit Card', true), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php __('Related Braintree Credit Card Relations');?></h3>
	<?php if (!empty($braintreeCreditCard['BraintreeCreditCardRelation'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Braintree Credit Card Id'); ?></th>
		<th><?php __('Model'); ?></th>
		<th><?php __('Foreign Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($braintreeCreditCard['BraintreeCreditCardRelation'] as $braintreeCreditCardRelation):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $braintreeCreditCardRelation['id'];?></td>
			<td><?php echo $braintreeCreditCardRelation['braintree_credit_card_id'];?></td>
			<td><?php echo $braintreeCreditCardRelation['model'];?></td>
			<td><?php echo $braintreeCreditCardRelation['foreign_id'];?></td>
			<td><?php echo $braintreeCreditCardRelation['created'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'braintree_credit_card_relations', 'action' => 'view', $braintreeCreditCardRelation['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'braintree_credit_card_relations', 'action' => 'edit', $braintreeCreditCardRelation['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'braintree_credit_card_relations', 'action' => 'delete', $braintreeCreditCardRelation['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $braintreeCreditCardRelation['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Braintree Credit Card Relation', true), array('controller' => 'braintree_credit_card_relations', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Braintree Subscriptions');?></h3>
	<?php if (!empty($braintreeCreditCard['BraintreeSubscription'])):?>
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
		foreach ($braintreeCreditCard['BraintreeSubscription'] as $braintreeSubscription):
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
	<?php if (!empty($braintreeCreditCard['BraintreeTransaction'])):?>
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
		foreach ($braintreeCreditCard['BraintreeTransaction'] as $braintreeTransaction):
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
