<div class="braintreeSubscriptions form">
<?php echo $this->Form->create('BraintreeSubscription');?>
	<fieldset>
 		<legend><?php __('Client Edit Braintree Subscription'); ?></legend>
	<?php echo $this->Form->input('id'); ?>
	<?php echo 'Amount: $'.$subscription['BraintreeSubscription']['amount'];?><br />
	<?php echo $this->Form->input('billingDayOfMonth');?><br />
	<?php echo 'Subscription start: '.$subscription['BraintreeSubscription']['billingPeriodStartDate'];?><br />
	<?php echo 'Trial Period: '.$subscription['BraintreeSubscription']['trialPeriod'];?><br />
	<?php echo 'Paid Through: '.$subscription['BraintreeSubscription']['paidThroughDate'];?><br />
	<?php echo 'Status: '.$subscription['BraintreeSubscription']['status'];?><br />
	
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>