Admin,<br />
<br />
An ad has been saved to the blabfeed network. Here's what we've got:<br />
<br />
Ad name: <?php echo $ad['Ad']['name'];?><br />
Ad type: <?php echo ($ad['Ad']['upload_id'] == 0 ? 'Text' : 'Media');?><br />
Ad Category: <?php echo $ad['Category']['name'];?><br />
Submitted locations:<br />
<?php foreach ($ad['Location'] as $location): ?><br />
Location Name: <?php echo $location['name'];?><br />
Address: <?php echo $location['address1'];?><br /><?php echo $$location['city'].', '.$location['state'].' '.$location['zip'];?><br />
Est. Reach: <?php echo $location['avgreachpermon'];?><br />
<br />
<? endforeach; ?>
<br />
View the Ad: <a href="http://erp.blabfeed.com/admin/ads/<?php echo $ad['Ad']['id']; ?>">here</a>.<br />
<br />
blab on, <br />
<br />
blabfeed team <br />
info@blabfeed.com<br />
www.blabfeed.com<br />
1.877.330.3575<br />