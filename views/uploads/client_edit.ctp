    <div class="uploads form">
    
<?php  echo $this->Form->create('Upload', array('type'=>'file'));?>
	<fieldset>
 		<legend><h3>Step 1: Upload your media</h3></legend>
	<?php
		echo $this->Form->input('Ad.name', array('label'=>'Campaign name', 'title'=>'test tooltip','div'=>false)); echo '&nbsp;'.$this->Html->image('tooltip.gif', array('title' => 'Give your ad packet a short descriptive name to ensure chances of approval.', 'alt'=>'test'));
		echo '<br />';
		//echo $this->Form->input('name', array('label'=>'File nickname','div'=>false)); echo '&nbsp;'.$this->Html->image('tooltip.gif', array('title' => 'You can give your file name an alias in case the actual file name is not descriptive enough.'));
		echo '<br />';
		
		?>
        <!--<label>Perpetual?</label>-->
        <?
			echo $this->Form->input('Ad.perpetual', array('label'=>'Run Continuously', 'type'=>'checkbox', 'checked'=>'checked', 'onClick'=>'showRuntime();'));
		?>
        <!--<input type="checkbox" id="perpetual" checked="checked" onclick="showRuntime();"/>-->
        <div id="runtime" style="display:none;">
        <?
			echo $this->Form->input('Ad.startdatem', array('label'=>'Start date', 'value'=>date('m/d/Y')));
			echo $this->Form->input('Ad.enddatem', array('label'=>'End date', 'value'=>date('m/d/Y', strtotime('+1 week'))));
			//echo $this->Form->input('Ad.startdate');
			
		?>
        </div><?php echo '&nbsp;'.$this->Html->image('tooltip.gif', array('title' => 'Date copy.', 'alt'=>'test')); ?>
        <?php 
			echo $this->Form->input('Ad.category_id', array('value'=>$categories, 'label'=>'Choose Category')); 
			echo $this->Form->input('Ad.id', array( 'type'=>'hidden'));  
						echo '&nbsp;'.$this->Html->image('tooltip.gif', array('title' => 'Category copy.', 'alt'=>'test'));
                    
		?>
        <br />
        <span style="margin: 0px 0px 0px 3px; font-family: 'Lucida Grande', Arial, sans-serif;font-size: 20px; color: #464646;">Choose your type of ad:</span>
        <div class="tabs">
                <ul>
                	<li><a href="#Emails-tab"><span><?php __('Media Ad'); ?></span></a></li>
                    <li><a href="#Businesses-tab"><span><?php __('Text Ad'); ?></span></a></li>
                	
                    <?php echo $this->Layout->adminTabs(); ?>
                </ul>
         
        		<div id="Emails-tab" style="width:870px; height:260px;  border:thin;">
                   <?php
						echo $this->Form->input('file', array('type'=>'file'));
						echo $this->Form->input('Upload.user_id', array('type'=>'hidden', 'value'=>$user,'div'=>false));
						echo $this->Form->input('Ad.user_id', array('type'=>'hidden', 'value'=>$user));
					?>
                     <?php	
						echo '&nbsp;'.$this->Html->image('tooltip.gif', array('title' => 'Aspect ratio copy.', 'alt'=>'test'));
                    ?>
                    <br />
                    *file types allowed are .png, .jpg, .gif.<br />
                    *file maximum size is: <br />
                    *image will be resized to screen<br />
                    Tip: it is best to upload a file with a 16:9 aspect ratio.<br /><br />
                    16:9 sizes:<br />
                    	1280x720<br />
                        1920x1080
                    
                    <br />
                   
                </div>
                <div id="Businesses-tab" style="width:870px; height:230px;  border:thin;">
					<?
                    	echo $this->Form->input('Ad.messageheader', array('label'=>'Your headline','div'=>false)); echo '&nbsp;'.$this->Html->image('tooltip.gif', array('title' => 'Say something bold and catchy here!'));
						echo '<br />';
						echo $this->Form->input('Ad.messagetxt',  array('label'=>'Your ad description','div'=>false)); echo '&nbsp;'.$this->Html->image('tooltip.gif', array('title' => 'Put your main message here.'));
						echo '<br />';
						echo $this->Form->input('Ad.messagecontact', array('label'=>'Website or phone number','div'=>false)); echo '&nbsp;'.$this->Html->image('tooltip.gif', array('title' => 'How will people who see your message get ahold of you?'));
                    ?>
            	</div>
            
        </div>
            
        
	</fieldset>
<?php echo $this->Form->end(__('Next >>', true));?>
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
