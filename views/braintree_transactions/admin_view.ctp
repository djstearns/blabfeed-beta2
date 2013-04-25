<div class="braintreeTransactions view">
<h2><?php  __('Braintree Transaction');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeTransaction['BraintreeTransaction']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Braintree Merchant'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($braintreeTransaction['BraintreeMerchant']['id'], array('controller' => 'braintree_merchants', 'action' => 'view', $braintreeTransaction['BraintreeMerchant']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Braintree Customer'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($braintreeTransaction['BraintreeCustomer']['email'], array('controller' => 'braintree_customers', 'action' => 'view', $braintreeTransaction['BraintreeCustomer']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Braintree Credit Card'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($braintreeTransaction['BraintreeCreditCard']['masked_number'], array('controller' => 'braintree_credit_cards', 'action' => 'view', $braintreeTransaction['BraintreeCreditCard']['token'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Braintree Transaction'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($braintreeTransaction['BraintreeTransaction']['id'], array('controller' => 'braintree_transactions', 'action' => 'view', $braintreeTransaction['BraintreeTransaction']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Model'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeTransaction['BraintreeTransaction']['model']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Foreign Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeTransaction['BraintreeTransaction']['foreign_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeTransaction['BraintreeTransaction']['type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Amount'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeTransaction['BraintreeTransaction']['amount']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeTransaction['BraintreeTransaction']['status']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeTransaction['BraintreeTransaction']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeTransaction['BraintreeTransaction']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Braintree Transaction', true), array('action' => 'edit', $braintreeTransaction['BraintreeTransaction']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Braintree Transaction', true), array('action' => 'delete', $braintreeTransaction['BraintreeTransaction']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $braintreeTransaction['BraintreeTransaction']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Braintree Transactions', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Braintree Transaction', true), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php __('Related Braintree Subscriptions');?></h3>
	<?php if (!empty($braintreeTransaction['BraintreeSubscription'])):?>
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
		foreach ($braintreeTransaction['BraintreeSubscription'] as $braintreeSubscription):
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
	<?php if (!empty($braintreeTransaction['BraintreeTransaction'])):?>
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
		foreach ($braintreeTransaction['BraintreeTransaction'] as $braintreeTransaction):
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
