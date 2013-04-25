Your Order:
<?php debug($ad); ?>
<div>
	<div>
    	<table>
        	<tr>
            	<td>
                    
                </td>
                <td>
                	Your locations:
                    <br />
                    
                    <?php
						$total = 0;
						
							echo $ad['Location']['name'].': $'.$price.'/mo<br />';
							
					?>
                
                </td>
                <td>
                	Order summary:
                    <br />
                    <b>Total: <?php echo '$'.$price; ?></b>
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