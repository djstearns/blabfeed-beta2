
<script type="text/javascript">
$( "#radio" ).buttonset();
</script>
<div>
	<div align="center">
    
                
         	<?php echo $this->Html->image('congrats.png'); ?>
        <br />
        <br />
     </div>
     <div id="radio">
    
        <label><b>Select one:</b></label><br />
         
        <input id="radio" type="radio"  name="r" value="0" checked="checked"> <label>No, I don't have a media player.</label><br />
		<input id="radio" type="radio"  name="r" value="1" /> <label>Yes, I already have a media player.</label>
   
       
       <div style="margin-top:30px;">
       
                   <div id="getplayer">
                   
                   <table><tr><td>
                   	<?php echo $this->Html->image('freemediaplayer.jpg', array('width'=>'616', 'height'=>'395')); ?>
                   </td><td>
                   		<b>Your Order:</b>
                   		 <?php
						 echo $this->Form->create('Location');?>
                        <fieldset>
                        <br />
                        <b>Your new location:</b>
                    	<br />
                        <?php 
							$total = $price;
							echo $ad['Location']['name'].': $'.$price.'/mo<br />';
						?><br />
                        
                        <b>Want more than one display?</b><br />
                        Add more media players
                        
						<?php
                            echo $this->Form->input('id', array('value'=>$ad['Location']['id'], 'type'=>'hidden'));
							echo $this->Form->input('qty', array('value'=>'1', 'label'=>'Number of players'));
                        ?>
                         <div id="totalamt" style="display:none;">
                   			<?php echo $price; ?>
                   		</div>
                        
                        <?php 
							echo $this->Form->input('total', array('value'=>$total, 'type'=>'hidden'));
							echo $this->Form->input('pricer', array('value'=>$total,  'type'=>'hidden'));
						 ?>
                        </fieldset>
                        <a href="#" id="updatebilling">Update total</a>
                        <br />
                        
                		<br />
                        <b>Order summary:</b>
                        <hr />
                    <br />
                    <b>Total: <div id="displaytot" style="float:right;">$<?php echo $total; ?></div></b>
                    </td></tr></table> 
                    <div align="right">
        
        
                    <?php echo $this->Form->end('Submit');?>   
                    </div>
                   </div>
                        
                    <div id="haveplayer" style="display:none;">
                    	<div align="center">
                    		
                            <div id="url" style="cursor: pointer; position:absolute; margin-top:180px; margin-left:300px;">
                            	http://erp.blabfeed.com/ads/index.xml?id=<?php echo $ad['Location']['id']; ?>
                            </div>
                            <div>
                            	<?php echo $this->Html->image('haveplayer.png', array('width'=>'616', 'height'=>'395')); ?>
                            </div>
                        </div>
                    	
                        
                        
                        
                        
                   		
                   </div>
				  
                	
         </div>    
    	
        <!--<table>
        	<tr>
            	<td>
                	Shipping
                </td>
            </tr>
        </table>
        -->
    </div>
</div>

<script type="text/javascript">

	$("input:radio[name=r]").click(function(){
		
		if($(this).val()==0){
			$("#getplayer").show();
			$("#haveplayer").hide();
		}else{
			$("#haveplayer").show();
			$("#getplayer").hide();
		}
		
	});
	
	$("#url").click(function(){
		var url = $(this).html();
		alert('Copied to clipboard');
		window.clipboardData.setData('Text',url);
	});
	
	$("#LocationQty").change(function(){
		var qty = $("#LocationQty").val();
		var tot = $("#LocationPricer").val();
		var newtot = parseInt(qty)*parseInt(tot);
		$("#LocationTotal").val(newtot);
		$("#displaytot").html('$'+newtot);
		
		
	});
	
</script>