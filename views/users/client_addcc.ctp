<?php

echo $this->element(
		'credit_cards/vault_form',
		array(
			'plugin' => 'braintree',
			'braintree_merchant_id' => 'b2j6h9by5vknfhvv', // the merchant ID you want to use
			'braintree_customer_id' => $braintree_customer_id,
			'billing_postal_code_auth'=>true,
			'verify_credit_card' => true, // do you want to verify credit cards before accepting them? (costs more, but makes life easier)
			'foreign_model' => 'User', // A model in your app that you want to associate the Braintree vault record with
			'foreign_id' => rand(0,99999) // A foreign_id in your app that you want to associate the Braintree vault record with
		)
	); 
?>