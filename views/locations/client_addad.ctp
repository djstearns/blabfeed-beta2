<div class="locations form">
<?php echo $this->Form->create('Location');?>
	<fieldset>
 		<legend><?php __('Admin Add Location'); ?></legend>
	<h2><?php  __('Location');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $location['Location']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $location['Location']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Address'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $location['Location']['address1']; ?><br />
            <?php echo $location['Location']['city']; ?>, <?php echo $location['Location']['state']; ?> <?php echo $location['Location']['zip']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Lat'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $location['Location']['lat']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Lng'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $location['Location']['lng']; ?>
			&nbsp;
		</dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('blabfeed URL:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo 'http://erp.blabfeed.com/ads/index.xml?='.$location['Location']['id']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php
			echo $this->Form->input('Ad.perpetual', array('label'=>'Run Continuously', 'type'=>'checkbox', 'checked'=>'checked', 'onClick'=>'showRuntime();'));
		?>
        <!--<input type="checkbox" id="perpetual" checked="checked" onclick="showRuntime();"/>-->
        <div id="runtime" style="display:none;">
        <?
			echo $this->Form->input('Ad.startdatem', array('label'=>'Start date', 'value'=>date('m/d/Y')));
			echo $this->Form->input('Ad.enddatem', array('label'=>'End date', 'value'=>date('m/d/Y', strtotime('+1 month'))));
			//echo $this->Form->input('Ad.startdate');
			
		?>
        </div>
      <?php
//debug($location);
		echo $this->Form->input('Location.id', array('type'=>'hidden', 'value'=>$location['Location']['id']));
		echo $this->Form->input('Ad', array('value'=>$ads, 'label'=>'Submit more of your adds to this location.','multiple'=>'checkbox', 'div'=>false));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<script type="text/javascript">
$(function() {
        $( "#AdStartdatem" ).datepicker();
    });
$(function() {
	$( "#AdEnddatem" ).datepicker();
});
function showRuntime(){
	if(document.getElementById('AdPerpetual').checked)
     document.getElementById('runtime').style.display = "none";
  else
     document.getElementById('runtime').style.display = "block";
}

</script>