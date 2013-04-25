<div class="adsLocations view">
<h2><?php  __('Ads Location');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adsLocation['AdsLocation']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ad'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($adsLocation['Ad']['name'], array('controller' => 'ads', 'action' => 'view', $adsLocation['Ad']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Location'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($adsLocation['Location']['name'], array('controller' => 'locations', 'action' => 'view', $adsLocation['Location']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ads Location', true), array('action' => 'edit', $adsLocation['AdsLocation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Ads Location', true), array('action' => 'delete', $adsLocation['AdsLocation']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $adsLocation['AdsLocation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ads Locations', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ads Location', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ads', true), array('controller' => 'ads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ad', true), array('controller' => 'ads', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations', true), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location', true), array('controller' => 'locations', 'action' => 'add')); ?> </li>
	</ul>
</div>
