<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
	<meta property="og:title" content="title" />
	<meta property="og:description" content="description" />
	<meta property="og:image" content="thumbnail_image" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="pics-label" content="text/html" />
    <title><?php echo $title_for_layout; ?> - <?php __('Croogo'); ?></title>
    <script src='http://connect.facebook.net/en_US/all.js'></script>
	<?php
		
        echo $this->Html->css(array(
            'reset',
            '960',
            '/ui-themes/smoothness/jquery-ui.css',
            'admin',
            'thickbox',
			'tabs',
			
			
        ));
        echo $this->Layout->js();
        echo $this->Html->script(array(
            'jquery/jquery.min',
            'jquery/jquery-ui.min',
            'jquery/jquery.slug',
            'jquery/jquery.uuid',
            'jquery/jquery.cookie',
            'jquery/jquery.hoverIntent.minified',
            'jquery/superfish',
            'jquery/supersubs',
            'jquery/jquery.tipsy',
            'jquery/jquery.elastic-1.6.1.js',
            'jquery/thickbox-compressed',
            'admin',
			
		
			
	
			
			//'gjs/tabs',
			//'gjs/mapjs'
        ));
        echo $scripts_for_layout;
    ?>
</head>

<body>

    <div id="wrapper">
        <?php echo $this->element('client/header'); ?>

        <div id="nav-container">
            <div class="container_16">
                <?php echo $this->element("client/navigation"); ?>
                 <?php echo $this->element("share"); ?>
            </div>
        
           		
        
        </div>

        <div id="main" class="container_16">
           <div class="grid_16">
                <div id="content">
                    
					<?php
                        echo $this->Layout->sessionFlash();
                        echo $content_for_layout;
                    ?>
                </div>
            </div>
            <div class="clear">&nbsp;</div>
        </div>
        
        <div class="push"></div>
    </div>

    <?php echo $this->element('client/footer'); ?>
    
    
    <div class="feedback-panel">
    <a class="feedback-tab">Feedback</a>
 
    <h3>Send Us Feedback</h3>
    <div id="form-wrap">
 	
    <form id="contactForm" action="http://erp.blabfeed.com/processForm.php" method="post">

   We need your help in making blabfeed the best possible.  Please submit comments and suggestions below.	

  <ul>

    <li>
      <label for="senderName">Your Name</label>
      <input type="text" name="senderName" id="senderName" placeholder="Please type your name"  maxlength="40" />
    </li>

    <li>
      <label for="senderEmail">Your Email Address</label>
      <input type="text" name="senderEmail" id="senderEmail" placeholder="Please type your email"  maxlength="50" />
    </li>

    <li>
      <label for="message" style="padding-top: .5em;">Your Message</label>
      <textarea name="message" id="message" placeholder="Please type your message" cols="80" rows="10" maxlength="10000"></textarea>
    </li>

  </ul>

  <div id="formButtons">
    <input type="submit" id="sendMessage" name="sendMessage" value="Send Email" />
    </div>

</form>
 	
    </div>    
	</div>
    </body>
</html>
<script type="text/javascript">
//$('.feedback-panel').animate({left:'0'},  300);

    var feedbackTab = {
 
        speed:300,
        containerWidth:$('.feedback-panel').outerWidth(),
        containerHeight:$('.feedback-panel').outerHeight(),
        tabWidth:$('.feedback-tab').outerWidth(),
 
        init:function(){
            $('.feedback-panel').css('height',feedbackTab.containerHeight + 'px');
 
            $('a.feedback-tab').click(function(event){
 
                if ($('.feedback-panel').hasClass('open')) {
                    $('.feedback-panel').animate({left:'-' + feedbackTab.containerWidth}, feedbackTab.speed)
                    .removeClass('open');
                } else {
                    $('.feedback-panel').animate({left:'0'},  feedbackTab.speed)
                    .addClass('open');
                }
                event.preventDefault();
            });
        }
    };
 
    
	feedbackTab.init();
 
    $("#sendMessage").click(function() {  
        var email = $("input#email").val();
        var message = $("textarea#message").val();
        var response_message = "Thank you for your comment!"
 
    
 		var contactForm = $('#contactForm');
 
        $.ajax( {
		  url: contactForm.attr( 'action' ) + "?ajax=true",
		  type: contactForm.attr( 'method' ),
		  data: contactForm.serialize(),
          success: function() {
			var beforemsg =  $('#form-wrap').html();
            $('#form-wrap').html("<div id='response-message'></div>"+$('#form-wrap').html());
            $('#response-message').html("<p>" + response_message +"</p>")
            .hide()
            .fadeIn(500)
            .animate({opacity: 1.0}, 1000)
			.fadeOut(500)
            .animate({opacity: 0.0}, 1000)
            .fadeIn(0, function(){
                $('.feedback-panel')
                .animate({left:'-' + (feedbackTab.containerWidth)}, (feedbackTab.speed))
                .removeClass('open');
				$('#form-wrap').html(beforemsg);
			 })
			 
			return false;
          }
		  
        });
        return false;
    });
	
	
    
    
    
</script>
