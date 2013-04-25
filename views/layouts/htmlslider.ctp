<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	 
    <?php
        echo $this->Html->script(array(
            
  			'slider/js-image-slider',
    
			
        ));
        echo $this->Html->css(array(
		'slider/generic',
		'slider/js-image-slider'
		));
    ?>

<link rel="shortcut icon" href="/favicon.ico">


<!--flexslider scripts ends-->

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php 	echo $this->Layout->js();
			echo $scripts_for_layout; 
	?>
</head>
<body>

    <div id="sliderFrame">
        <div id="ribbon"></div>
        <div id="slider">

<?php
                //echo $this->Layout->sessionFlash();
                echo $content_for_layout;
  ?>


		</div>
        <div id="htmlcaption" style="display: none;">
            
        </div>
    </div>

<!-- content starts
================================================== -->

  
</body>
</html>