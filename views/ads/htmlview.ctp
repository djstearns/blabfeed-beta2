<div id="slideshow">
   <?php
	foreach($ads as $ad):
?>
<div>
<?php 
	if($ad['Ad']['messageheader'] != ''){
		echo $ad['Ad']['messageheader'];
		echo $ad['Ad']['messagetxt']; 
		echo $ad['Ad']['messagecontact']; 
		 if($ad['Ad']['qrcodeurl']!=''){
			echo $this->Html->image($this->GoogleChart->qr(array('chl'=>'http://'.$_SERVER['HTTP_HOST'] . $this->base . '/ads/hit/ad:'.$ad['Ad']['id'].'/loc:'.$thislocation)), array('width'=>$width, 'height'=>$height));
		 }
	}else{
		if($ad['Ad']['imgurl'] != ''){
			echo $this->Html->image($ad['Ad']['imgurl']);
		}else{
			echo $this->Html->image($ad['Upload']['file']);
		}
	}
 ?>
</div>
<?php endforeach; ?>
</div>

<style type="text/css">
#slideshow { 
   
    position: relative; 
  
    padding: 10px; 
}

#slideshow > div { 
    position: absolute; 
    top: 10px; 
    left: 10px; 
    right: 10px; 
    bottom: 10px; 
}
</style>
<script type="text/javascript">
$("#slideshow > div:gt(0)").hide();

setInterval(function() { 
  $('#slideshow > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
},  10000);
//in thousandths of a second.
</script>



