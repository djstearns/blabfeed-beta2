<script>
$(function() {
	$( "#accordion" ).accordion();
});
</script>
<?php //debug($braintreeSubscriptions); ?>
	<h2><?php __('Subscriptions');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
		
			<th><?php echo $this->Paginator->sort('amount');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			
	
			
	</tr>
    </table>
  <div id="accordion">
  	<h3>
  	
	<?php
	$i = 0;
	foreach ($braintreeSubscriptions as $braintreeSubscription):
	
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
    <table>
	<tr<?php echo $class;?>>
		<td><?php echo $braintreeSubscription['BraintreeSubscription']['model']; ?>&nbsp;</td>
		
		<td><?php echo $braintreeSubscription['BraintreeSubscription']['amount']; ?>&nbsp;</td>
		<td><?php echo $braintreeSubscription['BraintreeSubscription']['status']; ?>&nbsp;</td>
		<td><?php echo $braintreeSubscription['BraintreeSubscription']['created']; ?>&nbsp;</td>
		
		
	</tr>
    </table>
    </h3>
    	<div>
        	
        	<?php echo $this->Html->link(__('View', true), array('action' => 'view', $braintreeSubscription['BraintreeSubscription']['id'])); ?>
			<?php echo $this->Html->link(__('Edit billing day', true), array('action' => 'edit', $braintreeSubscription['BraintreeSubscription']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $braintreeSubscription['BraintreeSubscription']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $braintreeSubscription['BraintreeSubscription']['id'])); ?>
            
            
            	<?php if(count($braintreeSubscription['BraintreeTransaction'])>0):?>
               <table>
					<?php foreach($braintreeSubscription['BraintreeTransaction'] as $trans): ?>
                   
                    <tr>    
                        <td><?php echo $trans['id']; ?>&nbsp;</td>
                        <td><?php echo $trans['amount']; ?>&nbsp;</td>
                        <td><?php echo $trans['status']; ?>&nbsp;</td>
                        <td><?php echo $trans['created']; ?>&nbsp;</td>
                    </tr>
                    <?php endforeach; ?>
                    </table>
                 <? endif; ?>
        </div>
<?php endforeach; ?>
	
    </div>
	<p>
    
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>