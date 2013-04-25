<div class="braintreeTransactions index">
	<h2><?php __('Braintree Transactions');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('braintree_merchant_id');?></th>
			<th><?php echo $this->Paginator->sort('braintree_customer_id');?></th>
			<th><?php echo $this->Paginator->sort('braintree_credit_card_id');?></th>
			<th><?php echo $this->Paginator->sort('braintree_transaction_id');?></th>
			<th><?php echo $this->Paginator->sort('model');?></th>
			<th><?php echo $this->Paginator->sort('foreign_id');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo $this->Paginator->sort('amount');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($braintreeTransactions as $braintreeTransaction):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $braintreeTransaction['BraintreeTransaction']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($braintreeTransaction['BraintreeMerchant']['id'], array('controller' => 'braintree_merchants', 'action' => 'view', $braintreeTransaction['BraintreeMerchant']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($braintreeTransaction['BraintreeCustomer']['email'], array('controller' => 'braintree_customers', 'action' => 'view', $braintreeTransaction['BraintreeCustomer']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($braintreeTransaction['BraintreeCreditCard']['masked_number'], array('controller' => 'braintree_credit_cards', 'action' => 'view', $braintreeTransaction['BraintreeCreditCard']['token'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($braintreeTransaction['BraintreeTransaction']['id'], array('controller' => 'braintree_transactions', 'action' => 'view', $braintreeTransaction['BraintreeTransaction']['id'])); ?>
		</td>
		<td><?php echo $braintreeTransaction['BraintreeTransaction']['model']; ?>&nbsp;</td>
		<td><?php echo $braintreeTransaction['BraintreeTransaction']['foreign_id']; ?>&nbsp;</td>
		<td><?php echo $braintreeTransaction['BraintreeTransaction']['type']; ?>&nbsp;</td>
		<td><?php echo $braintreeTransaction['BraintreeTransaction']['amount']; ?>&nbsp;</td>
		<td><?php echo $braintreeTransaction['BraintreeTransaction']['status']; ?>&nbsp;</td>
		<td><?php echo $braintreeTransaction['BraintreeTransaction']['created']; ?>&nbsp;</td>
		<td><?php echo $braintreeTransaction['BraintreeTransaction']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $braintreeTransaction['BraintreeTransaction']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $braintreeTransaction['BraintreeTransaction']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $braintreeTransaction['BraintreeTransaction']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $braintreeTransaction['BraintreeTransaction']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Braintree Transaction', true), array('action' => 'add')); ?></li>
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