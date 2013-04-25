    <div class="uploads form">
<?php echo $this->Form->create('Upload', array('type'=>'file'));?>
	
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
			echo $this->Form->input('Ad.enddatem', array('label'=>'End date', 'value'=>date('m/d/Y', strtotime('+1 month'))));
			//echo $this->Form->input('Ad.startdate');
			
		?>
        </div><?php echo '&nbsp;'.$this->Html->image('tooltip.gif', array('title' => 'Date copy.', 'alt'=>'test')); ?>
        <?php 
			echo $this->Form->input('Ad.category_id', array('value'=>$categories, 'label'=>'Choose Category'));  
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
         
        		<div id="Emails-tab" style="width:870px; height:350px;  border:thin;">
                   <div id="image">
					   <?php
                            echo $this->Form->input('file', array('type'=>'file'));
                        ?>
                    </div>
                    <a href="#" id="clearimage">Delete image</a>
                    <?php
						echo '<br />OR<br />';
						echo $this->Form->input('Ad.photo_url', array('type'=>'text', 'class'=>'imgurl'));
						echo $this->Form->input('Upload.user_id', array('type'=>'hidden', 'value'=>$user,'div'=>false));
						echo $this->Form->input('Ad.user_id', array('type'=>'hidden', 'value'=>$user));
					?>
                     <?php	
						echo '&nbsp;'.$this->Html->image('tooltip.gif', array('title' => 'Aspect ratio copy.', 'alt'=>'test'));
                    ?>
                     
                    <?php //debug($editor); ?>
                    <div id="editor" style="display:<?php echo ($editor == 1 ? 'block' : 'none'); ?>">
                    	editor
                    </div>
                    <br />
                    *file types allowed are .png, .jpg, .gif.<br />
                    *image will be resized to screen<br />
                    Tip: it is best to upload a file with a 16:9 horizontal aspect ratio.<br /><br />
                    
                    
                    <br />
                   
                </div>
                <div id="Businesses-tab" style="width:870px; height:350px;  border:thin;">
					<?
                    	echo $this->Form->input('Ad.messageheader', array('label'=>'Your headline','class'=>'adtxt', 'div'=>false)); echo '&nbsp;'.$this->Html->image('tooltip.gif', array('title' => 'Say something bold and catchy here!'));
						echo '<br />';
						echo $this->Form->input('Ad.messagetxt',  array('label'=>'Your ad description','class'=>'adtxt', 'div'=>false)); echo '&nbsp;'.$this->Html->image('tooltip.gif', array('title' => 'Put your main message here.'));
						echo '<br />';
						echo $this->Form->input('Ad.messagecontact', array('label'=>'Website or phone number','class'=>'adtxt', 'div'=>false)); echo '&nbsp;'.$this->Html->image('tooltip.gif', array('title' => 'How will people who see your message get ahold of you?'));
						echo '<br />';
						echo $this->Form->input('Ad.qrcodeurl', array('type'=>'text','label'=>'Qr Code URL','class'=>'adtxt', 'div'=>false)); echo '&nbsp;'.$this->Html->image('tooltip.gif', array('title' => 'This is where users will go when the qr code is scanned.'));
                    ?>
            	</div>
                <div align="right">
            <?php echo $this->Form->end('Next >>', array('class'=>'nofloat'));?>
            </div>
        </div>
            
        
	
   


</div>
<script type="text/javascript">
$("#clearimage").click(function (){
	var val = $("#image").html($("#image").html());
});
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
$(".imgurl").change(function(){
	if(  $("#UploadFile").val() != "" || $(".adtxt").val() != ""){
		if($(this).val() != ""){
			$(this).val('');
			alert('You have already specified an image or text ad.');
		}
	}
});
$(".adtxt").change(function(){
	if( $("#AdPhotoUrl").val() != "" || $("#UploadFile").val() != ""){
	
		if($(this).val() != ""){
			$(this).val('');
			alert('You have already chosen an image or image url.');
		}
	}
});
$("#UploadFile").click(function(){
	if( $(".adtxt").val() != "" || $(".imgurl").val() != ""){
		if($(this).val() != ""){
			$(this).val("");
			alert('You have already chosen an text ad or image url.');
		}
	}
});

</script>
