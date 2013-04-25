<script>

    function choose(value){
        if (window.opener) {
            window.opener.setValue(value);
            window.close();
        }
    }  
</script>
<div class="uploads index">
	<h2><?php __('Uploads');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th>Media</th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($uploads as $upload):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
    	<?php //$upload['Upload']['height'];$upload['Upload']['height']; ?>
		<td><?php echo $this->Html->image('http://dev.blabfeed.com/files/'.$upload['Upload']['name'] , array('height'=>150, 'width'=>150)); ?>&nbsp;</td>
		<td><?php echo $upload['Upload']['name']; ?>&nbsp;</td>
		<td><?php echo $upload['Upload']['type']; ?>&nbsp;</td>
		<td><?php echo $upload['Upload']['created']; ?>&nbsp;</td>
		<td class="actions">
            <?php echo $this->Html->link('Choose', "javascript:choose('".json_encode(array('id'=>$upload['Upload']['id'],'url'=>$upload['Upload']['name']))."')" ); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
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
</div>