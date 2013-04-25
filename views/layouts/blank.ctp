<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	 
    <?php
        echo $this->Html->script(array(
           ' jquery/jquery.min',
		  'http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js'
			/*
            'jquery/jquery.hoverIntent.minified',
            'jquery/superfish',
            'jquery/supersubs',
            'theme',
			*/

			
        ));
        
 
	
       
    ?>

<!--flexslider scripts ends-->

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php 	echo $this->Layout->js();
			echo $scripts_for_layout; 
	?>
</head>
<body>




  <?php
                echo $this->Layout->sessionFlash();
                echo $content_for_layout;
  ?>

</body>
</html>
