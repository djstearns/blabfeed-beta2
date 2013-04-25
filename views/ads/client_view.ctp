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
        <?php if($ad['Ad']['upload_id']!=0): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Upload'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $this->Html->image('/files/'.$ad['Upload']['name'], array( 'width'=>'200px', 'height'=>'200px', 'alt' => $ad['Upload']['name'], 'url' => array('controller' => 'uploads', 'action' => 'view', $ad['Upload']['id']))); ?>
			&nbsp;
		</dd>
        <?php else: ?>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ad'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<b><?php echo $ad['Ad']['messageheader'].'</b><br /> '.$ad['Ad']['messagetxt'].'<br /> '.$ad['Ad']['messagecontact']; ?>
			&nbsp;
		</dd>
        <?php endif; ?>
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
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ad['Ad']['created']; ?>
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
        <th><?php __('Est. monthly reach'); ?></th>
		<th><?php __('Active'); ?></th>
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
            <td><?php echo $location['avgreachpermon']; ?></td>
			<!--<td><?php //echo $location['user_id'];?></td>-->
			<td><?php echo $location['active'];?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
