<div class="orders index">
	<h2><?php __('Orders');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('devicetype_id');?></th>
			<th><?php echo $this->Paginator->sort('quantity');?></th>
			<th><?php echo $this->Paginator->sort('chatlog');?></th>
			<th><?php echo $this->Paginator->sort('estrecddate');?></th>
			<th><?php echo $this->Paginator->sort('recddate');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($orders as $order):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $order['Order']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($order['User']['name'], array('controller' => 'users', 'action' => 'view', $order['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($order['Devicetype']['name'], array('controller' => 'devicetypes', 'action' => 'view', $order['Devicetype']['id'])); ?>
		</td>
		<td><?php echo $order['Order']['quantity']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['chatlog']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['estrecddate']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['recddate']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['created']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $order['Order']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $order['Order']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $order['Order']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $order['Order']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Order', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Devicetypes', true), array('controller' => 'devicetypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Devicetype', true), array('controller' => 'devicetypes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Devices', true), array('controller' => 'devices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Device', true), array('controller' => 'devices', 'action' => 'add')); ?> </li>
	</ul>
</div>