<div class="pricetiers index">
	<h2><?php __('Pricetiers');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('parent_id');?></th>
			<th><?php echo $this->Paginator->sort('alias');?></th>
			<th><?php echo $this->Paginator->sort('price');?></th>
			<th><?php echo $this->Paginator->sort('model');?></th>
			<th><?php echo $this->Paginator->sort('lft');?></th>
			<th><?php echo $this->Paginator->sort('rght');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($pricetiers as $pricetier):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $pricetier['Pricetier']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pricetier['ParentPricetier']['id'], array('controller' => 'pricetiers', 'action' => 'view', $pricetier['ParentPricetier']['id'])); ?>
		</td>
		<td><?php echo $pricetier['Pricetier']['alias']; ?>&nbsp;</td>
		<td><?php echo $pricetier['Pricetier']['price']; ?>&nbsp;</td>
		<td><?php echo $pricetier['Pricetier']['model']; ?>&nbsp;</td>
		<td><?php echo $pricetier['Pricetier']['lft']; ?>&nbsp;</td>
		<td><?php echo $pricetier['Pricetier']['rght']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $pricetier['Pricetier']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $pricetier['Pricetier']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $pricetier['Pricetier']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pricetier['Pricetier']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Pricetier', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Pricetiers', true), array('controller' => 'pricetiers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Pricetier', true), array('controller' => 'pricetiers', 'action' => 'add')); ?> </li>
	</ul>
</div>