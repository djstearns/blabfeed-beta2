<div class="locations form">
<?php echo $this->Form->create('Location');?>
	<fieldset>
 		<legend><?php __('Add Location'); ?></legend>
	<?php
		echo $this->Form->input('name', array('div'=>false, 'label'=>'Location name')); echo '&nbsp;'.$this->Html->image('tooltip.gif', array('title' => 'Give your location a short descriptive name to attract ads.', 'alt'=>'test'));
		echo '<br />';
		echo $this->Form->input('description',  array('div'=>false, 'label'=>'location description')); echo '&nbsp;'.$this->Html->image('tooltip.gif', array('title' => 'Give your ad packet a short description.  You may want to include details like "near the point of sale".', 'alt'=>'test'));
		echo '<br />';
		echo $this->Form->input('category_id', array('value'=>$categories));
		echo $this->Form->input('address1'); 
		echo $this->Form->input('address2');
		echo $this->Form->input('city');
		echo $this->Form->input('state');
		echo $this->Form->input('zip');
		
		echo $this->Form->input('avgreachpermon', array('div'=>false, 'label'=>'Estimated reach per month')); echo '&nbsp;'.$this->Html->image('tooltip.gif', array('title' => 'Give your best estimation at the amount of traffic at your location to relay to potential advertisers.', 'alt'=>'test'));
		echo '<br />';
		echo $this->Form->input('active', array('div'=>false)); echo '&nbsp;'.$this->Html->image('tooltip.gif', array('title' => 'Tells advertisers when if your screen is ready.', 'alt'=>'test'));
		echo '<br />';
		echo $this->Form->input('public', array('div'=>false)); echo '&nbsp;'.$this->Html->image('tooltip.gif', array('title' => 'Makes your location searchable to advertisers.', 'alt'=>'test'));
		echo '<br />';
		
		//echo $this->Form->input('created', array('type'=>'hidden'));
		//echo $this->Form->input('Ad');

//debug($location);
		echo $this->Form->input('Location.id', array('type'=>'hidden', 'value'=>$location['Location']['id']));
		echo $this->Form->input('Ad', array('value'=>$ads, 'label'=>'Submit more of your adds to this location.','multiple'=>'checkbox', 'div'=>false));
	?>
	</fieldset>
    <div align="right">
<?php echo $this->Form->end(__('Submit', true));?></div>