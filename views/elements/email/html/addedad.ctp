<?php echo $ad['User']['username'] ?>,<br />
<br />
Boo-yah! Your Ad has been saved to the blabfeed network. Here's what we've got:<br />
<br />
Ad name: <?php echo $ad['Ad']['name'];?><br />
Ad type: <?php echo ($ad['Ad']['upload_id'] == 0 ? 'Text' : 'Media');?><br />
Ad Category: <?php echo $ad['Category']['name'];?><br />
Your locations:<br />
<?php foreach ($ad['Location'] as $location): ?><br />
Location Name: <?php echo $location['name'];?><br />
Address: <?php echo $location['address1'];?><br /><?php echo $location['city'].', '.$location['state'].' '.$location['zip'];?><br />
Est. Reach: <?php echo $location['avgreachpermon'];?><br />
<br />
<? endforeach; ?>
<br />
View your Ad in your outbox: <a href="http://erp.blabfeed.com/client/ads/outbox/">here</a>.<br />
<br />
Call us toll-free at 1.877.330.3575 right now if you need a TV, media player, or if you need help configuring your blabfeed RSS on your existing media player. <br />
<br />
blab on, <br />
<br />
blabfeed team <br />
info@blabfeed.com<br />
www.blabfeed.com<br />
1.877.330.3575<br />