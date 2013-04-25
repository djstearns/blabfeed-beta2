<div class="pricetiers view">
<h2><?php  __('Pricetier');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pricetier['Pricetier']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Parent Pricetier'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($pricetier['ParentPricetier']['id'], array('controller' => 'pricetiers', 'action' => 'view', $pricetier['ParentPricetier']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Alias'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pricetier['Pricetier']['alias']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Price'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pricetier['Pricetier']['price']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Model'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pricetier['Pricetier']['model']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Lft'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pricetier['Pricetier']['lft']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Rght'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pricetier['Pricetier']['rght']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pricetier', true), array('action' => 'edit', $pricetier['Pricetier']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Pricetier', true), array('action' => 'delete', $pricetier['Pricetier']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pricetier['Pricetier']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pricetiers', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pricetier', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pricetiers', true), array('controller' => 'pricetiers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Pricetier', true), array('controller' => 'pricetiers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Pricetiers');?></h3>
	<?php if (!empty($pricetier['ChildPricetier'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Parent Id'); ?></th>
		<th><?php __('Alias'); ?></th>
		<th><?php __('Price'); ?></th>
		<th><?php __('Model'); ?></th>
		<th><?php __('Lft'); ?></th>
		<th><?php __('Rght'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($pricetier['ChildPricetier'] as $childPricetier):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $childPricetier['id'];?></td>
			<td><?php echo $childPricetier['parent_id'];?></td>
			<td><?php echo $childPricetier['alias'];?></td>
			<td><?php echo $childPricetier['price'];?></td>
			<td><?php echo $childPricetier['model'];?></td>
			<td><?php echo $childPricetier['lft'];?></td>
			<td><?php echo $childPricetier['rght'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'pricetiers', 'action' => 'view', $childPricetier['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'pricetiers', 'action' => 'edit', $childPricetier['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'pricetiers', 'action' => 'delete', $childPricetier['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $childPricetier['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Pricetier', true), array('controller' => 'pricetiers', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
