<div class="impressions index">
	<h2><?php __('Impressions');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('ad_id');?></th>
			<th><?php echo $this->Paginator->sort('location_id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('impressiontype');?></th>
			<th><?php echo $this->Paginator->sort('devicetype');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($impressions as $impression):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $impression['Impression']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($impression['Ad']['name'], array('controller' => 'ads', 'action' => 'view', $impression['Ad']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($impression['Location']['name'], array('controller' => 'locations', 'action' => 'view', $impression['Location']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($impression['User']['name'], array('controller' => 'users', 'action' => 'view', $impression['User']['id'])); ?>
		</td>
		<td><?php echo $impression['Impression']['impressiontype']; ?>&nbsp;</td>
		<td><?php echo $impression['Impression']['devicetype']; ?>&nbsp;</td>
		<td><?php echo $impression['Impression']['created']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $impression['Impression']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $impression['Impression']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $impression['Impression']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $impression['Impression']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Impression', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Ads', true), array('controller' => 'ads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ad', true), array('controller' => 'ads', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations', true), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location', true), array('controller' => 'locations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>