Dear Admin,<br />
<br />
A user has just signed up for billing for a location.
<br />
Username: <?php echo $Location['User']['username'];?><br />
Location id: <?php echo $Location['Location']['id'];?><br />
Location Name: <?php echo $Location['Location']['name'];?><br />
Address: <?php echo $Location['Location']['address1'];?><br /><?php echo $Location['Location']['city'].', '.$Location['Location']['state'].' '.$Location['Location']['zip'];?><br />
# of Media Players :<?php echo $Location['Location']['qty'];?><br />