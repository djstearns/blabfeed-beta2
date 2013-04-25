<?php echo $user['User']['username'] ?>,

Boo-yah! Your location has been added to the blabfeed network. Here's what we've got:

Location Name: <?php echo $Location['Location']['name'];?>
Address: <?php echo $Location['Location']['address1'];?><?php echo $Location['Location']['city'].', '.$Location['Location']['state'].' '.$Location['Location']['zip'];?>
Est. Reach: <?php echo $Location['Location']['name'];?>
Status: <?php echo ($Location['Location']['active'] == 1 ? 'Active' : 'Not active'); echo ' ,'; echo ($Location['Location']['public'] == 1 ? 'Public' : 'Private'); ?>

-If you marked 'active' this means your screen is live and viewable (don't mark this unless that's true!) 
-If you marked 'public' anyone can see your location and submit ads to you for approval 

Edit your location <a href="http://erp.blabfeed.com/client/locations/edit/<?php echo $locid; ?>">here</a>.

Your feed URL: http://erp.blabfeed.com/ads/index.xml?id=<?php echo $locid; ?>

Call us toll-free at 1.877.330.3575 right now if you need a TV, media player, or if you need help configuring your blabfeed RSS on your existing media player. 

blab on, 

blabfeed team 
info@blabfeed.com
www.blabfeed.com
1.877.330.3575