<div class="braintreeCreditCards index">
	<h2><?php __('Braintree Credit Cards');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('token');?></th>
			<th><?php echo $this->Paginator->sort('braintree_merchant_id');?></th>
			<th><?php echo $this->Paginator->sort('braintree_customer_id');?></th>
			<th><?php echo $this->Paginator->sort('braintree_address_id');?></th>
			<th><?php echo $this->Paginator->sort('unique_card_identifier');?></th>
			<th><?php echo $this->Paginator->sort('cardholder_name');?></th>
			<th><?php echo $this->Paginator->sort('card_type');?></th>
			<th><?php echo $this->Paginator->sort('masked_number');?></th>
			<th><?php echo $this->Paginator->sort('expiration_date');?></th>
			<th><?php echo $this->Paginator->sort('is_default');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($braintreeCreditCards as $braintreeCreditCard):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $braintreeCreditCard['BraintreeCreditCard']['token']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($braintreeCreditCard['BraintreeMerchant']['id'], array('controller' => 'braintree_merchants', 'action' => 'view', $braintreeCreditCard['BraintreeMerchant']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($braintreeCreditCard['BraintreeCustomer']['email'], array('controller' => 'braintree_customers', 'action' => 'view', $braintreeCreditCard['BraintreeCustomer']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($braintreeCreditCard['BraintreeAddress']['id'], array('controller' => 'braintree_addresses', 'action' => 'view', $braintreeCreditCard['BraintreeAddress']['id'])); ?>
		</td>
		<td><?php echo $braintreeCreditCard['BraintreeCreditCard']['unique_card_identifier']; ?>&nbsp;</td>
		<td><?php echo $braintreeCreditCard['BraintreeCreditCard']['cardholder_name']; ?>&nbsp;</td>
		<td><?php echo $braintreeCreditCard['BraintreeCreditCard']['card_type']; ?>&nbsp;</td>
		<td><?php echo $braintreeCreditCard['BraintreeCreditCard']['masked_number']; ?>&nbsp;</td>
		<td><?php echo $braintreeCreditCard['BraintreeCreditCard']['expiration_date']; ?>&nbsp;</td>
		<td><?php echo $braintreeCreditCard['BraintreeCreditCard']['is_default']; ?>&nbsp;</td>
		<td><?php echo $braintreeCreditCard['BraintreeCreditCard']['created']; ?>&nbsp;</td>
		<td><?php echo $braintreeCreditCard['BraintreeCreditCard']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $braintreeCreditCard['BraintreeCreditCard']['token'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $braintreeCreditCard['BraintreeCreditCard']['token'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $braintreeCreditCard['BraintreeCreditCard']['token']), null, sprintf(__('Are you sure you want to delete # %s?', true), $braintreeCreditCard['BraintreeCreditCard']['token'])); ?>
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
		<li><?php echo $this->Html->link(__('New Braintree Credit Card', true), array('action' => 'add')); ?></li>
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