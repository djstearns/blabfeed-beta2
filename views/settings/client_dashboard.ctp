<div>
    <h2><?php echo $title_for_layout; ?></h2>
    <div  >
 	<table style="width:900px;" >
    <th> My Ads:</th>
    <th>My Locations: </th>
    <th>My Account: </th>
    <tr>
    <td class="tdborderright">
        <table>
        <th colspan="2">Local Ads:</th>
        <tr><td>Pending: </td><td><?php echo $this->Html->link($mylocaladspending, array('controller'=>'ads', 'action'=>'client_index')); ?></td></tr>
        <tr><td>Approved: </td><td><?php echo $this->Html->link($mylocaladsapproved,  array('controller'=>'ads', 'action'=>'client_outbox')); ?></td></tr>
        <tr><td>Est Reach:</td><td> <?php echo $mylocaladsestreach[0][0]['totreach']; ?></td></tr>
        </table>
        <br />
        <table>
        <th colspan="2">Network Ads:</th>
        <tr><td>Pending: </td><td><?php echo $this->Html->link($mynetworkadspending, array('controller'=>'ads', 'action'=>'client_index')); ?><br /></td></tr>
        <tr><td>Approved:</td><td><?php echo $this->Html->link($mynetworkadsapproved, array('controller'=>'ads', 'action'=>'client_outbox')); ?><br /></td></tr>
        <tr><td>Est Reach:</td><td> <?php echo $mynetworkadsestreach[0][0]['totreach']; ?><br /></td></tr>
        </table>
        <br />
        <table>
        <th>Total Reach:</td><td><?php echo $mylocaladsestreach[0][0]['totreach'] + $mynetworkadsestreach[0][0]['totreach'];?></th>
        </table>
            
         
    </td>
  
    <td class="tdborderright">
    	<table>
            <tr><td>Inactive Locations:<?php echo $this->Html->link($myinactivelocations,  array('controller'=>'locations', 'action'=>'client_mylocations')); ?></td></tr>
            <tr><td> Active Locations: <?php echo $this->Html->link($myactivelocations, array('controller'=>'locations', 'action'=>'client_mylocations')); ?></td></tr>
            <tr><td>Public Locations: <?php echo $this->Html->link($mypubliclocations,  array('controller'=>'locations', 'action'=>'client_mylocations'));?></td></tr>
            <tr><td> Total Est. Public Reach: <?php echo $totalestpublicreach[0][0]['totreach'];?></td></tr>
        </table>
        <br />
       
        <br />
        <table>
        <th colspan="2">Potential Monthy Income:</th>
        <?php $tot = $totalestpublicreach[0][0]['totreach']/1000 * 6.25 * .4; ?>
        <tr><td>With 1 Advertiser:</td><td>$<?php echo number_format($tot, 2, '.', '');?></td></tr>
        <tr><td>With 5 Advertisers:</td><td>$<?php echo number_format($tot * 5, 2, '.', '');?></td></tr>
        <tr><td>With 10 Advertisers:</td><td>$<?php echo number_format($tot * 10, 2, '.', '');?></td></tr>
        <tr><td>With 20 Advertisers:</td><td>$<?php echo number_format($tot * 20, 2, '.', '');?></td></tr>
        </table>
        
        
    </td>
   
    <td class="tdborderright">
    	<table>
            <tr><td>Balance:$  Billed Monthly</td></tr>
            <tr><td>Your Credits: $<?php if(isset($credit[0])){ echo $credit[0][0]['total'];}else{ echo '0';} ?></td></tr>
            <tr><td>Total ad income <br />received at all locations: </td></tr>
              
        </table>
          <br />
         *When balance reaches $100, we send<br />
          payment via PayPal or mail a check.<br /> 
         *Resets to $0 after we send payment <br />
             
    </td>
    </tr>
	</table>
	</div>
    <p align="center"><?php echo $this->Html->image('dashboard_01.png'); ?></p>
    <table>
    <tr><td><p align="center"><?php echo $this->Html->link($this->Html->image('create_ad_button.jpg'), array('controller'=>'uploads', 'action'=>'add'), array('escape'=>false)); ?></p></td><td><p align="center"><?php echo $this->Html->link($this->Html->image('add_a_location_button.jpg'), array('controller'=>'locations', 'action'=>'add'), array('escape'=>false)); ?></p></td></tr>
    </table>
<?php echo $this->Html->image('dashboard_03.jpg'); ?> 

<p><h2>Video Tutorials</h2>
<p align="center">
<iframe src="http://player.vimeo.com/video/57013559" width="400" height="375" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>

<iframe src="http://player.vimeo.com/video/57029008" width="400" height="375" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>

</div>

