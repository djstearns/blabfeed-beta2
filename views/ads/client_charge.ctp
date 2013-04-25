Your Order:
<?php debug($this->data); ?>
<div>
	<div>
    	<table>
        	<tr>
            	<td>
                	Your Ad:<br />
                    <?php echo $this->Html->image('/files/'.$ad['Upload']['name']); ?>
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

?>
</div>