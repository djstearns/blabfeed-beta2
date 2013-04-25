<?php echo $user['User']['username'] ?>,<br />
<br />
Boo-yah! Your location has been added to the blabfeed network. Here's what we've got:<br />
<br />
Location Name: <?php echo $Location['Location']['name'];?><br />
Address: <?php echo $Location['Location']['address1'];?><br /><?php echo $Location['Location']['city'].', '.$Location['Location']['state'].' '.$Location['Location']['zip'];?><br />
Est. Reach: <?php echo $Location['Location']['name'];?><br />
Status: <?php echo ($Location['Location']['active'] == 1 ? 'Active' : 'Not active'); echo ' ,'; echo ($Location['Location']['public'] == 1 ? 'Public' : 'Private'); ?>
<br />
-If you marked 'active' this means your screen is live and viewable (don't mark this unless that's true!) <br />
-If you marked 'public' anyone can see your location and submit ads to you for approval <br />
<br />
Edit your location <a href="http://erp.blabfeed.com/client/locations/edit/<?php echo $locid; ?>">here</a>.<br />
<br />
Your feed URL: http://erp.blabfeed.com/ads/index.xml?id=<?php echo $locid; ?><br />
<br />
Call us toll-free at 1.877.330.3575 right now if you need a TV, media player, or if you need help configuring your blabfeed RSS on your existing media player. <br />
<br />
blab on, <br />
<br />
blabfeed team <br />
info@blabfeed.com<br />
www.blabfeed.com<br />
1.877.330.3575<br />