<div class="braintreeTransactionsCouponcodes index">
	<h2><?php __('Braintree Transactions Couponcodes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('braintree_transaction_id');?></th>
			<th><?php echo $this->Paginator->sort('couponcode_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($braintreeTransactionsCouponcodes as $braintreeTransactionsCouponcode):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $braintreeTransactionsCouponcode['BraintreeTransactionsCouponcode']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($braintreeTransactionsCouponcode['BraintreeTransaction']['id'], array('controller' => 'braintree_transactions', 'action' => 'view', $braintreeTransactionsCouponcode['BraintreeTransaction']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($braintreeTransactionsCouponcode['Couponcode']['code'], array('controller' => 'couponcodes', 'action' => 'view', $braintreeTransactionsCouponcode['Couponcode']['id'])); ?>
		</td>
		<td><?php echo $braintreeTransactionsCouponcode['BraintreeTransactionsCouponcode']['created']; ?>&nbsp;</td>
		<td><?php echo $braintreeTransactionsCouponcode['BraintreeTransactionsCouponcode']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $braintreeTransactionsCouponcode['BraintreeTransactionsCouponcode']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $braintreeTransactionsCouponcode['BraintreeTransactionsCouponcode']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $braintreeTransactionsCouponcode['BraintreeTransactionsCouponcode']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $braintreeTransactionsCouponcode['BraintreeTransactionsCouponcode']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Braintree Transactions Couponcode', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Braintree Transactions', true), array('controller' => 'braintree_transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Braintree Transaction', true), array('controller' => 'braintree_transactions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Couponcodes', true), array('controller' => 'couponcodes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Couponcode', true), array('controller' => 'couponcodes', 'action' => 'add')); ?> </li>
	</ul>
</div>