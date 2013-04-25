<div class="braintreeCustomers index">
	<h2><?php __('Braintree Customers');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('braintree_merchant_id');?></th>
			<th><?php echo $this->Paginator->sort('model');?></th>
			<th><?php echo $this->Paginator->sort('foreign_id');?></th>
			<th><?php echo $this->Paginator->sort('first_name');?></th>
			<th><?php echo $this->Paginator->sort('last_name');?></th>
			<th><?php echo $this->Paginator->sort('company');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('phone');?></th>
			<th><?php echo $this->Paginator->sort('fax');?></th>
			<th><?php echo $this->Paginator->sort('website');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($braintreeCustomers as $braintreeCustomer):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $braintreeCustomer['BraintreeCustomer']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($braintreeCustomer['BraintreeMerchant']['id'], array('controller' => 'braintree_merchants', 'action' => 'view', $braintreeCustomer['BraintreeMerchant']['id'])); ?>
		</td>
		<td><?php echo $braintreeCustomer['BraintreeCustomer']['model']; ?>&nbsp;</td>
		<td><?php echo $braintreeCustomer['BraintreeCustomer']['foreign_id']; ?>&nbsp;</td>
		<td><?php echo $braintreeCustomer['BraintreeCustomer']['first_name']; ?>&nbsp;</td>
		<td><?php echo $braintreeCustomer['BraintreeCustomer']['last_name']; ?>&nbsp;</td>
		<td><?php echo $braintreeCustomer['BraintreeCustomer']['company']; ?>&nbsp;</td>
		<td><?php echo $braintreeCustomer['BraintreeCustomer']['email']; ?>&nbsp;</td>
		<td><?php echo $braintreeCustomer['BraintreeCustomer']['phone']; ?>&nbsp;</td>
		<td><?php echo $braintreeCustomer['BraintreeCustomer']['fax']; ?>&nbsp;</td>
		<td><?php echo $braintreeCustomer['BraintreeCustomer']['website']; ?>&nbsp;</td>
		<td><?php echo $braintreeCustomer['BraintreeCustomer']['created']; ?>&nbsp;</td>
		<td><?php echo $braintreeCustomer['BraintreeCustomer']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $braintreeCustomer['BraintreeCustomer']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $braintreeCustomer['BraintreeCustomer']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $braintreeCustomer['BraintreeCustomer']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $braintreeCustomer['BraintreeCustomer']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Braintree Customer', true), array('action' => 'add')); ?></li>
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