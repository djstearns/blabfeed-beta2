<?php echo $ad['User']['username'] ?>,

Boo-yah! Your Ad has been saved to the blabfeed network. Here's what we've got:

Ad name: <?php echo $ad['Ad']['name'];?>
Ad type: <?php echo ($ad['Ad']['upload_id'] == 0 ? 'Text' : 'Media');?>
Ad Category: <?php echo $ad['Category']['name'];?>
Your locations:
<?php foreach ($ad['Location'] as $location): ?>
Location Name: <?php echo $location['name'];?>
Address: <?php echo $location['address1'];?><?php echo $location['city'].', '.$location['state'].' '.$location['zip'];?>
Est. Reach: <?php echo $location['avgreachpermon'];?>

<? endforeach; ?>

View your Ad in your outbox: <a href="http://erp.blabfeed.com/client/ads/outbox/">here</a>.

Call us toll-free at 1.877.330.3575 right now if you need a TV, media player, or if you need help configuring your blabfeed RSS on your existing media player. 

blab on, 

blabfeed team 
info@blabfeed.com
www.blabfeed.com
1.877.330.3575