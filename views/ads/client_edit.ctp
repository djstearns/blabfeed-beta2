<div class="ads form">
<?php echo $this->Form->create('Ad');?>
	<fieldset>
 		<legend><?php __('Client Edit Ad'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('category_id');
	
		//echo $this->Form->input('Location');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>