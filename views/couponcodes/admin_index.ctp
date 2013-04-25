<div class="couponcodes index">
	<h2><?php __('Couponcodes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('code');?></th>
			<th><?php echo $this->Paginator->sort('amt');?></th>
			<th><?php echo $this->Paginator->sort('multiple');?></th>
			<th><?php echo $this->Paginator->sort('redeemed');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('braintree_transaction_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($couponcodes as $couponcode):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $couponcode['Couponcode']['id']; ?>&nbsp;</td>
		<td><?php echo $couponcode['Couponcode']['code']; ?>&nbsp;</td>
		<td><?php echo $couponcode['Couponcode']['amt']; ?>&nbsp;</td>
		<td><?php echo $couponcode['Couponcode']['multiple']; ?>&nbsp;</td>
		<td><?php echo $couponcode['Couponcode']['redeemed']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($couponcode['User']['name'], array('controller' => 'users', 'action' => 'view', $couponcode['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($couponcode['BraintreeTransaction']['id'], array('controller' => 'braintree_transactions', 'action' => 'view', $couponcode['BraintreeTransaction']['id'])); ?>
		</td>
		<td><?php echo $couponcode['Couponcode']['created']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $couponcode['Couponcode']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $couponcode['Couponcode']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $couponcode['Couponcode']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $couponcode['Couponcode']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Couponcode', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Braintree Transactions', true), array('controller' => 'braintree_transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Braintree Transaction', true), array('controller' => 'braintree_transactions', 'action' => 'add')); ?> </li>
	</ul>
</div>