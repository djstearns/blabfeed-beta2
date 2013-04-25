<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ad', true), array('action' => 'edit', $ad['Ad']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Ad', true), array('action' => 'delete', $ad['Ad']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $ad['Ad']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ads', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ad', true), array('controller'=>'uploads', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations', true), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location', true), array('controller' => 'locations', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="ads view">
<h2><?php  __('Ad');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ad['Ad']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ad['Ad']['name']; ?>
			&nbsp;
		</dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Category'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($ad['Category']['name'], array('controller' => 'categories', 'action' => 'view', $ad['Ad']['category_id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($ad['User']['username'], array('controller' => 'users', 'action' => 'view', $ad['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ad Content'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php 
				if($ad['Ad']['upload_id'] !=0){ 
						echo $this->Html->image('/files/'.$ad['Upload']['name'], array('height'=>100, 'width'=>100));
					}else{
						echo $ad['Ad']['messageheader'].'<br /> '.$ad['Ad']['messagetxt'].'<br /> '.$ad['Ad']['messagecontact'];
					}
			 ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Approved'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ad['Ad']['approved']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Approved Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ad['Ad']['approved_date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Date Added'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ad['Ad']['created']; ?>
			&nbsp;
		</dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('QR'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
        <?php //debug($ad); ?>
			<?php echo $this->Html->image($this->GoogleChart->qr(array('chl'=>'http://'.$_SERVER['HTTP_HOST'] . $this->base . '/ads/hit/ad:'.$ad['Ad']['id'].'/loc:378'))); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="related">
	<h3><?php __('Related Locations');?></h3>
	<?php if (!empty($ad['Location'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Address1'); ?></th>
		<th><?php __('City'); ?></th>
		<th><?php __('State'); ?></th>
		<th><?php __('Zip'); ?></th>
		<th><?php __('Lat'); ?></th>
		<th><?php __('Lng'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Active'); ?></th>
		<th><?php __('Date Added'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($ad['Location'] as $location):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $location['id'];?></td>
			<td><?php echo $location['name'];?></td>
			<td><?php echo $location['description'];?></td>
			<td><?php echo $location['address1'];?></td>
			<td><?php echo $location['city'];?></td>
			<td><?php echo $location['state'];?></td>
			<td><?php echo $location['zip'];?></td>
			<td><?php echo $location['lat'];?></td>
			<td><?php echo $location['lng'];?></td>
			<td><?php echo $location['user_id'];?></td>
			<td><?php echo $location['active'];?></td>
			<td><?php echo $location['created'];?></td>
          
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'locations', 'action' => 'view', $location['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'locations', 'action' => 'edit', $location['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'locations', 'action' => 'delete', $location['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $location['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
