<div class="braintreeSubscriptions view">
<h2><?php  __('Subscription');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeSubscription['BraintreeSubscription']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Braintree Merchant'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($braintreeSubscription['BraintreeMerchant']['id'], array('controller' => 'braintree_merchants', 'action' => 'view', $braintreeSubscription['BraintreeMerchant']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Braintree Customer'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($braintreeSubscription['BraintreeCustomer']['email'], array('controller' => 'braintree_customers', 'action' => 'view', $braintreeSubscription['BraintreeCustomer']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Braintree Credit Card'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($braintreeSubscription['BraintreeCreditCard']['masked_number'], array('controller' => 'braintree_credit_cards', 'action' => 'view', $braintreeSubscription['BraintreeCreditCard']['token'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Braintree Transaction Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeSubscription['BraintreeSubscription']['braintree_transaction_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Model'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeSubscription['BraintreeSubscription']['model']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Foreign Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeSubscription['BraintreeSubscription']['foreign_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeSubscription['BraintreeSubscription']['type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Amount'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeSubscription['BraintreeSubscription']['amount']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeSubscription['BraintreeSubscription']['status']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeSubscription['BraintreeSubscription']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeSubscription['BraintreeSubscription']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('PlanId'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeSubscription['BraintreeSubscription']['planId']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Braintree Subscription', true), array('action' => 'edit', $braintreeSubscription['BraintreeSubscription']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Braintree Subscription', true), array('action' => 'delete', $braintreeSubscription['BraintreeSubscription']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $braintreeSubscription['BraintreeSubscription']['id'])); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Braintree Transactions');?></h3>
	<?php if (!empty($braintreeSubscription['BraintreeTransaction'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		
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
		foreach ($braintreeSubscription['BraintreeTransaction'] as $braintreeTransaction):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $braintreeTransaction['id'];?></td>
			
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

</div>
