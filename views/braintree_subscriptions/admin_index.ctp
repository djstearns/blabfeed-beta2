<div class="braintreeSubscriptions index">
	<h2><?php __('Braintree Subscriptions');?></h2>
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
			<th><?php echo $this->Paginator->sort('planId');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($braintreeSubscriptions as $braintreeSubscription):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $braintreeSubscription['BraintreeSubscription']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($braintreeSubscription['BraintreeMerchant']['id'], array('controller' => 'braintree_merchants', 'action' => 'view', $braintreeSubscription['BraintreeMerchant']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($braintreeSubscription['BraintreeCustomer']['email'], array('controller' => 'braintree_customers', 'action' => 'view', $braintreeSubscription['BraintreeCustomer']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($braintreeSubscription['BraintreeCreditCard']['masked_number'], array('controller' => 'braintree_credit_cards', 'action' => 'view', $braintreeSubscription['BraintreeCreditCard']['token'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($braintreeSubscription['BraintreeTransaction']['id'], array('controller' => 'braintree_transactions', 'action' => 'view', $braintreeSubscription['BraintreeTransaction']['id'])); ?>
		</td>
		<td><?php echo $braintreeSubscription['BraintreeSubscription']['model']; ?>&nbsp;</td>
		<td><?php echo $braintreeSubscription['BraintreeSubscription']['foreign_id']; ?>&nbsp;</td>
		<td><?php echo $braintreeSubscription['BraintreeSubscription']['type']; ?>&nbsp;</td>
		<td><?php echo $braintreeSubscription['BraintreeSubscription']['amount']; ?>&nbsp;</td>
		<td><?php echo $braintreeSubscription['BraintreeSubscription']['status']; ?>&nbsp;</td>
		<td><?php echo $braintreeSubscription['BraintreeSubscription']['created']; ?>&nbsp;</td>
		<td><?php echo $braintreeSubscription['BraintreeSubscription']['modified']; ?>&nbsp;</td>
		<td><?php echo $braintreeSubscription['BraintreeSubscription']['planId']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $braintreeSubscription['BraintreeSubscription']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $braintreeSubscription['BraintreeSubscription']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $braintreeSubscription['BraintreeSubscription']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $braintreeSubscription['BraintreeSubscription']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Braintree Subscription', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Braintree Merchants', true), array('controller' => 'braintree_merchants', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Braintree Merchant', true), array('controller' => 'braintree_merchants', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Braintree Customers', true), array('controller' => 'braintree_customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Braintree Customer', true), array('controller' => 'braintree_customers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Braintree Credit Cards', true), array('controller' => 'braintree_credit_cards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Braintree Credit Card', true), array('controller' => 'braintree_credit_cards', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Braintree Transactions', true), array('controller' => 'braintree_transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Braintree Transaction', true), array('controller' => 'braintree_transactions', 'action' => 'add')); ?> </li>
	</ul>
</div>