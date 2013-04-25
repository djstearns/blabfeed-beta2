Dear Admin,<br />
<br />
A user wants to add a location and may or may not pay for it yet...
<br />
User id: <?php echo $Location['User']['id']; ?><br />
Location Name: <?php echo $Location['Location']['name'];?><br />
Address: <?php echo $Location['Location']['address1'];?><br /><?php echo $Location['Location']['city'].', '.$Location['Location']['state'].' '.$Location['Location']['zip'];?><br />