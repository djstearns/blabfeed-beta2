<div class="grid_16">
	<div class="content">
        <center><h2>Create your FREE <?php echo $this->Html->image('blabfeed_web copy.png'); ?> account now!<?php //echo $title_for_layout; ?></h2></center>
        <div style="float:left;  margin:15px;">
        <iframe src="http://player.vimeo.com/video/48349226?title=0&amp;byline=0&amp;portrait=0" width="400" height="300" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe><br />
        <center><?php echo $this->Html->image('http://www.blabfeed.com/images/featured.jpg'); ?></center>
        </div>
        <div style="float:left; width:400px; margin:10px; ">
            
            <?php echo $this->Form->create('User');?>
                <fieldset>
                <?php
                    echo $this->Form->input('name', array('div'=>false, 'label'=>false, 'default'=>'Your Name', 'defaultValue'=>'Your Name')); echo '&nbsp; ';
                    echo $this->Form->input('email', array('div'=>false, 'label'=>false, 'default'=>'Your Email', 'defaultValue'=>'Your Email')); echo '&nbsp;*';
                    echo $this->Form->input('phone', array('div'=>false,'label'=>false, 'default'=>'Your Phone', 'defaultValue'=>'Your Phone')); echo '&nbsp; ';
                     echo $this->Form->input('username', array('div'=>false, 'label'=>false,  'default'=>'New Username', 'defaultValue'=>'New Username')); echo '&nbsp;*';
                    echo $this->Form->input('passwordshow', array('div'=>false, 'label'=>false,  'default'=>'New Password', 'type'=>'text', 'defaultValue'=>'New Password')); 
                    echo $this->Form->input('password', array('value' => '','label'=>false, 'div'=>false));echo '&nbsp;*';
                    echo $this->Form->input('userrefid', array('type'=>'hidden', 'value'=>$id));
                    //echo $this->Form->input('name');
                    //echo $this->Form->input('website');
                ?>
                </fieldset>
            <?php echo $this->Form->end(array('label'=>'Sign up!'));?>
            <?php echo $this->Html->link('Sign in', 'http://erp.blabfeed.com/client', array('target'=>'_blank'));?>
    	</div>
    </div>
    
</div>
<div class="clear"></div>
<script type="text/javascript">
   $('input[type=text]').focus(function() {
	
      if($(this).val() == $(this).attr('defaultValue')) {
		
         $(this).val('');
      }
   })
   
   .blur(function() {
      if($(this).val().length == 0) {
         $(this).val($(this).attr('defaultValue'));
      }
   });
   
   
	$('#UserPasswordshow').show();
	$('#UserPassword').hide();
	
	$('#UserPasswordshow').focus(function() {
		$('#UserPasswordshow').hide();
		$('#UserPassword').show();
		$('#UserPassword').focus();
	});
	$('#UserPassword').blur(function() {
		if($('#UserPassword').val() == '') {
			$('#UserPasswordshow').show();
			$('#UserPassword').hide();
		}
	});
</script>
<style type="text/css">
#login input[type="text"], #login input[type="password"] 
{
	width:300px;
}

div label, div input {
  display:inline-block;
  height:30px;
  margin:5px;
  
}

#UserPassword {
	display:none;
}

div label {
  width:5px; /* or whatever size you want them */
}

div input
{
	font-size:18px;
	color:#999;
	width:200px;
	height:40px;
    -webkit-border-radius: 5px; //For Safari, etc.
    -moz-border-radius: 5px; //For Mozilla, etc.
    border-radius: 5px; //CSS3 Feature
	
}


</style>