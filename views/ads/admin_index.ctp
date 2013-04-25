<div class="ads index">
	<h2><?php __('Ads');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
            <th><?php echo $this->Paginator->sort('category_id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('ad_content');?></th>
			<th><?php echo $this->Paginator->sort('approved');?></th>
			<th><?php echo $this->Paginator->sort('approved_date');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($ads as $ad):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $ad['Ad']['id']; ?>&nbsp;</td>
       
		<td><?php echo $ad['Ad']['name']; ?></td>
         <td>
         		<?php echo $this->Html->link($ad['Category']['name'], array('controller' => 'categories', 'action' => 'view', $ad['Ad']['category_id'])); ?>
         </td>
		<td>
			<?php echo $this->Html->link($ad['User']['name'], array('controller' => 'users', 'action' => 'view', $ad['User']['id'])); ?>
		</td>
        
		<td><?php if($ad['Ad']['upload_id'] !=0){ 
						echo $this->Html->image('/files/'.$ad['Upload']['name'], array('height'=>100, 'width'=>100));
					}else{
						echo $ad['Ad']['messageheader'].'<br /> '.$ad['Ad']['messagetxt'].'<br /> '.$ad['Ad']['messagecontact'];
					}
					?>
        </td>
		<td><?php echo $ad['Ad']['approved']; ?>&nbsp;</td>
		<td><?php echo $ad['Ad']['approved_date']; ?>&nbsp;</td>
		<td><?php echo $ad['Ad']['created']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $ad['Ad']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $ad['Ad']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $ad['Ad']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $ad['Ad']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Ad', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations', true), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location', true), array('controller' => 'locations', 'action' => 'add')); ?> </li>
	</ul>
</div>