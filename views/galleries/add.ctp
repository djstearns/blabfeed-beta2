<div class="galleries form">
<?php echo $this->Form->create('Gallery');?>
	<fieldset>
 		<legend><?php __('Add Gallery'); ?></legend>
	<?php
		echo $this->Form->input('basename');
		echo $this->Form->input('dirname');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Galleries', true), array('action' => 'index'));?></li>
	</ul>
</div>