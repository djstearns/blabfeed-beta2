<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<!--<![endif]-->
	<title><?php echo $title_for_layout; ?> &raquo; <?php echo Configure::read('Site.title'); ?></title>
    <meta charset="utf-8">
	<?php
        echo $this->Layout->meta();
        echo $this->Layout->feed();
	?>
		<!--style sheet
<link rel="stylesheet" media="screen" href="css/bootstrap.css"/>
<link rel="stylesheet" media="screen" href="css/bootstrap-responsive.css"/>
<link rel="stylesheet" media="screen" href="css/style.css"/>-->
	<?php
        echo $this->Html->css(array(
            /*
			'reset',
            '960',
            'theme',
			*/
			'bootstrap',
			'prettyPhoto',
			'flexslider',
			'elastislide',
			'bootstrap-responsive',
			'style'
        ));
		?>
        <!--jquery libraries / others are at the bottom
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<script src="js/modernizr.js" type="text/javascript"></script>-->

    <!--elastislide carousel script starts
    <link rel="stylesheet" media="screen" href="css/elastislide.css"/>
    <script type="text/javascript" src="js/jquery.elastislide.js"></script>-->
    <?php
        echo $this->Html->script(array(
            /*
			'jquery/jquery.min',
            'jquery/jquery.hoverIntent.minified',
            'jquery/superfish',
            'jquery/supersubs',
            'theme',
			*/
			'gjs/jquery-1.7.1.min',
			'gjs/jquery.elastislide',
			'gjs/modernizr',
			'gjs/jquery.elastislide'
			
        ));
        
    ?>
<!--Fav and touch icons-->
<?php //echo $this->img(); ?>
<link rel="shortcut icon" href="img/icons/favicon.ico">
<link rel="apple-touch-icon" href="img/icons/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/icons/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/icons/apple-touch-icon-114x114.png">

<!--google web font-->
<link href='http://fonts.googleapis.com/css?family=Raleway:400,600,700' rel='stylesheet' type='text/css'>


<script type="text/javascript">
$(document).ready(function() {
$('#carousel').elastislide({
		imageW 		: 300,
		margin		: 20,
		border		: 0,
		easing		: 'easeInBack'
});
});
</script>
<!--elastislide carousel script ends-->
	<?php
        echo $this->Html->script(array(     
			'gjs/jquery.prettyPhoto',
        ));
       
    ?>
<!--prettyphoto scripts starts
<link rel="stylesheet" media="screen" href="css/prettyPhoto.css"/>
<script src="js/jquery.prettyPhoto.js" type="text/javascript"></script>-->
<script type="text/javascript">
$(document).ready(function() {	
		$('a[data-rel]').each(function() {
		$(this).attr('rel', $(this).data('rel'));
		});
		$("a[rel^='prettyPhoto[gallery1]']").prettyPhoto({
		animation_speed: 'fast',
		slideshow: 5000,
		autoplay_slideshow: false,
		opacity: 0.80,
		show_title: false,
		theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
		overlay_gallery: false,
		social_tools: false,
		changepicturecallback: function(){
		var $pp = $('.pp_default');
		if( parseInt( $pp.css('left') ) < 0 ){
		$pp.css('left', 0 );
		}
		}
		});	
});
</script>
<!--prettyphoto scripts ends-->
	<?php
        echo $this->Html->script(array(
			'gjs/jquery.flexslider-min',
        ));
    ?>
<!--flexslider scripts starts
<link rel="stylesheet" media="screen" href="css/flexslider.css"/>
<script src="js/jquery.flexslider-min.js" type="text/javascript"></script>-->
<script type="text/javascript"> 
// Slider with thumbnail
$(document).ready(function() {
if($(window).width() < 959)
{
		$('#slider').flexslider({
		directionNav: true,
		controlNav: false,
		});
}
else
{
		$('#thumb-slider').flexslider({
		animation: "slide",
		controlNav: false,
		animationLoop: false,
		slideshow: true,
		directionNav: false,
		controlNav: false,
		itemWidth: 180,
		itemMargin: 0,
		asNavFor: '#slider'
		});
		$('#slider').flexslider({
		animation: "slide",
		controlNav: false,
		directionNav: false,
		animationLoop: true,
		slideshow: true,
		sync: "#thumb-slider"
        });
}
});
</script>
<!--flexslider scripts ends-->

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php 	echo $this->Layout->js();
			echo $scripts_for_layout; 
	?>
</head>
<body>

<!-- header starts
================================================== -->
<section id="header" class="clearfix">
  <div class="container">
    <div class="row"> 
      
      <!--logo starts-->
      <div class="span4 logo"><?php echo $this->Layout->blocks('logoarea'); ?></div>
      <!--logo ends-->
      
      <div class="span8 clearfix"> 
        
        <!--social starts-->
        <?php echo $this->Layout->blocks('iconarea'); ?>
        <!--social ends--> 
        
        <!--menu starts-->
       
        <div id="smoothmenu" class="ddsmoothmenu">
         <?php echo $this->Layout->menu('main', array('dropdown' => true)); ?>
        </div>
        <!--menu ends--> 
        
      </div>
    </div>
  </div>
</section>
<!-- header ends
================================================== --> 

<!-- content starts
================================================== -->
<section id="content" class="clearfix"> 
  <?php
                //echo $this->Layout->sessionFlash();
                //echo $content_for_layout;
            ?>
  <!--slider-bg starts-->
  <div id="slider-bg">
    <div class="container">
      <div class="row content-top"> 
        
        <!--slides starts-->
        <div class="span12">
          <?php echo $this->Layout->blocks('mainslider'); ?>
        </div>
        
        <!--slides ends--> 
        
        <!--thumbnails starts-->
        <div class="span12">
         	<?php echo $this->Layout->blocks('thumbnails'); ?>
        </div>
        <!--thumbnails ends--> 
        
      </div>
    </div>
  </div>
  <!--slider-bg ends-->
  
  <div class="container"> 
    
    <!--features starts-->
    <div class="row">
      <?php echo $this->Layout->blocks('main3col'); ?>
    </div>
    <!--features ends--> 
    
    <!--spacer here-->
    <div class="spacer-40px"></div>
    
    <!--carousel starts-->
    <div class="row">
      <div class="span12"> 
        
        <!--icon and heading-->
        <?php echo $this->Layout->blocks('slider2'); ?>
       
      </div>
    </div>
    <!--carousel ends--> 
    
    <!--spacer here-->
    <div class="spacer-40px"></div>
    
    <!--row starts-->
    <div class="row"> 
		<?php echo $this->Layout->blocks('abovebox'); ?>
    </div>
    <!--row ends--> 
    
    <!--spacer here-->
    <div class="spacer-30px"></div>
    
    <!--box starts-->
    <div class="row">
      <?php echo $this->Layout->blocks('darkbox'); ?>
    </div>
    <!--box ends--> 
    
  </div>
</section>
<!-- content ends
================================================== --> 
<!-- content ends
================================================== -->

<!-- footer starts
================================================== -->
<footer id="footer" class="clearfix">
  <div class="container"> 
    
    <!--row starts-->
    <div class="row"> 
      <?php echo $this->Layout->blocks('leftupperbottom'); ?>
      
      <!--column two starts-->
      <?php echo $this->Layout->blocks('midupperbottom'); ?>
      <!--column two ends--> 
      
      <!--column three / twitter feed starts-->
        <?php echo $this->Layout->blocks('rightupperbottom'); ?>
      <!--column three / twitter feed ends--> 
      
    </div>
    <!--row ends--> 
    
    <!--spacer here-->
    <div class="spacer-30px"></div>
    
    <!--row starts-->
    <div class="row"> 
      
      <!--column one starts-->
      <div class="span4">
        <?php echo $this->Layout->blocks('leftbottom'); ?>
      </div>
      <!--column one ends--> 
      
      <!--column two starts-->
      <div class="span4">
         <?php echo $this->Layout->blocks('middlebottom'); ?>
      </div>
      <!--column two ends--> 
      
      <!--column three starts-->
       <div class="span4">
         <?php echo $this->Layout->blocks('rightbottom'); ?>
      </div>
      <!--column three ends--> 
      
    </div>
    <!--row ends--> 
    
  </div>
</footer>
<!-- footer ends
================================================== --> 

<!-- copyright starts
================================================== -->
<section id="copyright" class="clearfix">
  <div class="container">
    <div class="row">
      <div class="span12">
        <p> © Copyright 2012</p>
         <?php echo $this->Layout->menu('footer', array('tagAttributes' => array('class'=>'copyright-menu'))); ?>
      </div>
    </div>
  </div>
</section>
<!-- copyright ends
================================================== --> 

<!--other jqueries required--> 
	<?php
        echo $this->Html->script(array(
			'gjs/bootstrap',
			'gjs/ddsmoothmenu',
			'gjs/twitter',
			'gjs/jquery.easing.1.3',
			'gjs/custom'
        ));
    ?>
</body>
</html>