Your Order:

<div>
	<div>
    	<table>
        	<tr>
            	<td>
                	Your Ad:<br />
                    
                    <?php if($ad['Ad']['upload_id']!=0){
							echo $this->Html->image($ad['Upload']['name'], array('height'=>'200', 'width'=>'200'));
					}else{
							echo $ad['Ad']['messagetxt'];
					}?>
                    
                </td>
                <td>
                	Your locations:
                    <br />
                    
                    <?php
						$total = 0;
						foreach($ad['Location'] as $location){
							echo $location['name'].': $13.00<br />';
							$total = $total + 13;
						}
					?>
                    
                    <br />
                    <?php echo $this->Html->link('Edit Locations', array('controller'=>'ads', 'action'=>'editloc', $ad['Ad']['id'])); ?>
                </td>
                <td>
                	Order summary:
                    <br />
                    <b>Total: <?php echo '$'.$total.'.00'; ?></b>
                </td>
            </tr>
        </table>
        <!--<table>
        	<tr>
            	<td>
                	Shipping
                </td>
            </tr>
        </table>
        -->
    </div>
<?php

echo $this->Html->link('Submit', array('action'=>'client_charge'));
?>
</div>