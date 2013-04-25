<!-- content starts
================================================== -->

  <?php
              echo $this->Layout->sessionFlash();
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
      <!--row starts-->
    <div class="row"> 
		<?php echo $this->Layout->promotednodes(); ?>
   	</div>
     <!--row ends-->
     <div class="spacer-30px"></div>
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
<!-- content ends
================================================== --> 
<!-- content ends
================================================== -->
