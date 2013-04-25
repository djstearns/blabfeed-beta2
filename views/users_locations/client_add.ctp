<div class="usersLocations form">
<?php echo $this->Form->create('UsersLocation');?>
	<fieldset>
 		<legend><?php __('Client Add Users Location'); ?></legend>
	<?php
		echo $this->Form->input('email');
		echo $this->Form->input('location_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>