<div class="usercredits view">
<h2><?php  __('Usercredit');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $usercredit['Usercredit']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $usercredit['Usercredit']['type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Amt'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $usercredit['Usercredit']['amt']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $usercredit['Usercredit']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $usercredit['Usercredit']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Usercredit', true), array('action' => 'edit', $usercredit['Usercredit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Usercredit', true), array('action' => 'delete', $usercredit['Usercredit']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $usercredit['Usercredit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Usercredits', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usercredit', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
