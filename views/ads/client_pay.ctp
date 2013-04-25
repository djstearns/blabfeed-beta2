Your Order:

<div>
	<div>
    	You will not be billed until your ad has been approved by a location owner.
    	<br />
        
    	<table>
        	<tr>
            	<td>
       
                	Your Ad:<br />
                    
                    <?php if($ad['Ad']['upload_id']!=0){
							echo $this->Html->image('/files/'.$ad['Upload']['name'], array('height'=>'200', 'width'=>'200'));
					}else{
							echo $ad['Ad']['messageheader'].'<br />';
							echo $ad['Ad']['messagetxt'].'<br />';
							echo $ad['Ad']['messagecontact'].'<br />';
					}?>
                    
                </td>
                <td>
                	Your locations:
                    <br />
                    
                    <?php
						$total = 0;
						foreach($ad['Location'] as $location){
							if($location['user_id']!=$userid){
								$camt = number_format(($location['avgreachpermon']/1000)*6.25,2,'.','');
							}else{
								$camt = 0;
							}
							
							echo $location['name'].': $'.$camt.'<br />';
							$total = $total + $camt;
						}
					?>
                    
                    <br />
                    <?php echo $this->Html->link('Edit Locations', array('controller'=>'ads', 'action'=>'editloc', $ad['Ad']['id'])); ?>
                </td>
                <td>
                	Order summary:
                    
                   
                    <br />
                    <b>* FREE for 30 days, then:</b> <?php echo '$'.$total; ?></b><br />
                    
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
//debug($ad);
/*
if($ad['User']['subscription'] !=1){
	
	
	echo $this->element(
		'credit_cards/vault_form',
		array(
			'plugin' => 'braintree',
			'braintree_merchant_id' => 'b2j6h9by5vknfhvv', // the merchant ID you want to use
			'braintree_customer_id' => $braintree_customer_id,
			'billing_postal_code_auth'=>true,
			'verify_credit_card' => true, // do you want to verify credit cards before accepting them? (costs more, but makes life easier)
			'foreign_model' => 'Ad', // A model in your app that you want to associate the Braintree vault record with
			'foreign_id' => $ad['Ad']['id'] // A foreign_id in your app that you want to associate the Braintree vault record with
		)
	); 
}else{
	*/
	echo '<div align="right" class="actions" style="margin-top:15px;">';
	
	echo $this->Html->link('Submit', array('action'=>'client_activate', $ad['Ad']['id']), array('class'=>'bigbutton', 'type'=>'button'));
	
	echo '</div>';
	/*
}
	*/
?>

</div>