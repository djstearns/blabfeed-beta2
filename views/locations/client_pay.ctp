Your Order:

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
						//debug($ad);
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

if($ad['User']['subscription'] !=1){
echo $this->element(
	'credit_cards/vault_form',
	array(
		'plugin' => 'braintree',
		'braintree_merchant_id' => 'b2j6h9by5vknfhvv', // the merchant ID you want to use
		'braintree_customer_id' => $braintree_customer_id,
		'billing_postal_code_auth'=>true,
		'verify_credit_card' => true, // do you want to verify credit cards before accepting them? (costs more, but makes life easier)
		'foreign_model' => 'Location', // A model in your app that you want to associate the Braintree vault record with
		'foreign_id' => $ad['Location']['id'] // A foreign_id in your app that you want to associate the Braintree vault record with
	)
);
}else{
	echo '<div align="right">';
	echo $this->Html->link('Submit', array('action'=>'client_activate', $ad['Ad']['id']), array('class'=>'bigbutton', 'type'=>'button'));
	echo '</div>';
} 
?>
</div>