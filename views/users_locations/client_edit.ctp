<div class="usersLocations form">
<?php echo $this->Form->create('UsersLocation');?>
	<fieldset>
 		<legend><?php __('Client Edit Users Location'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo 'User id: '.$this->data['UsersLocation']['user_id'];
		
		echo '<br />Location id: '.$this->data['UsersLocation']['location_id'];
		echo $this->Form->input('hasaccess', array('label'=>'Can Submit to Location'));
		echo $this->Form->input('canapprove', array('label'=>'Can Approve'));
		//echo $this->Form->input('invitecode');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>