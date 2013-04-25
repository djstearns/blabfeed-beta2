<div class="couponcodes view">
<h2><?php  __('Couponcode');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $couponcode['Couponcode']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Code'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $couponcode['Couponcode']['code']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Amt'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $couponcode['Couponcode']['amt']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Multiple'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $couponcode['Couponcode']['multiple']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Redeemed'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $couponcode['Couponcode']['redeemed']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($couponcode['User']['name'], array('controller' => 'users', 'action' => 'view', $couponcode['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Braintree Transaction'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($couponcode['BraintreeTransaction']['id'], array('controller' => 'braintree_transactions', 'action' => 'view', $couponcode['BraintreeTransaction']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $couponcode['Couponcode']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Couponcode', true), array('action' => 'edit', $couponcode['Couponcode']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Couponcode', true), array('action' => 'delete', $couponcode['Couponcode']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $couponcode['Couponcode']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Couponcodes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Couponcode', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Braintree Transactions', true), array('controller' => 'braintree_transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Braintree Transaction', true), array('controller' => 'braintree_transactions', 'action' => 'add')); ?> </li>
	</ul>
</div>
