<div class="usersLocations index">
	<h2><?php __('Users Locations');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('location_id');?></th>
			
			<th><?php echo $this->Paginator->sort('Can Submit', 'hasaccess');?></th>
            <th><?php echo $this->Paginator->sort('Can Approve', 'canapprove');?></th>
            <th><?php echo $this->Paginator->sort('active');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($usersLocations as $usersLocation):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $usersLocation['UsersLocation']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($usersLocation['User']['name'], array('controller' => 'users', 'action' => 'view', $usersLocation['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($usersLocation['Location']['name'], array('controller' => 'locations', 'action' => 'view', $usersLocation['Location']['id'])); ?>
		</td>
		<td><?php echo $usersLocation['UsersLocation']['hasaccess']; ?>&nbsp;</td>
        <td><?php echo $usersLocation['UsersLocation']['canapprove']; ?>&nbsp;</td>
        <td><?php echo $usersLocation['UsersLocation']['active']; ?>&nbsp;</td>
		<td><?php echo $usersLocation['UsersLocation']['created']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $usersLocation['UsersLocation']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $usersLocation['UsersLocation']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $usersLocation['UsersLocation']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $usersLocation['UsersLocation']['id'])); ?>
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