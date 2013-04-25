<div class="uploads form">
<?php echo $this->Form->create('Upload');?>
	<fieldset>
 		<legend><?php __('Add Upload'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('type');
		echo $this->Form->input('size');
	?>
	</fieldset>
    <div align="right">
		<?php echo $this->Form->end(__('Submit', true));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Uploads', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Ads', true), array('controller' => 'ads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ad', true), array('controller' => 'ads', 'action' => 'add')); ?> </li>
	</ul>
</div>