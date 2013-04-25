<div class="braintreeTransactionsCouponcodes view">
<h2><?php  __('Braintree Transactions Couponcode');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeTransactionsCouponcode['BraintreeTransactionsCouponcode']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Braintree Transaction'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($braintreeTransactionsCouponcode['BraintreeTransaction']['id'], array('controller' => 'braintree_transactions', 'action' => 'view', $braintreeTransactionsCouponcode['BraintreeTransaction']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Couponcode'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($braintreeTransactionsCouponcode['Couponcode']['code'], array('controller' => 'couponcodes', 'action' => 'view', $braintreeTransactionsCouponcode['Couponcode']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeTransactionsCouponcode['BraintreeTransactionsCouponcode']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $braintreeTransactionsCouponcode['BraintreeTransactionsCouponcode']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Braintree Transactions Couponcode', true), array('action' => 'edit', $braintreeTransactionsCouponcode['BraintreeTransactionsCouponcode']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Braintree Transactions Couponcode', true), array('action' => 'delete', $braintreeTransactionsCouponcode['BraintreeTransactionsCouponcode']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $braintreeTransactionsCouponcode['BraintreeTransactionsCouponcode']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Braintree Transactions Couponcodes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Braintree Transactions Couponcode', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Braintree Transactions', true), array('controller' => 'braintree_transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Braintree Transaction', true), array('controller' => 'braintree_transactions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Couponcodes', true), array('controller' => 'couponcodes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Couponcode', true), array('controller' => 'couponcodes', 'action' => 'add')); ?> </li>
	</ul>
</div>
