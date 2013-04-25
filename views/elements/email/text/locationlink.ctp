<p><b>You have been granted access to a location!</b></p>

<?php echo sprintf(__('Hey %s', true), $user['User']['username']); ?>,
<br />
<br />
<br />
Thank you for joining the Blabfeed network.  To activate your account please verify your email address by clicking the link below: <br /><br />
<?php
    $url = Router::url(array(
	 'client'=>true,
        'controller' => 'usersLocation',
        'action' => 'activate',
        $code
    ), true);
    //echo sprintf(__('Please click this link to activate your account: %s', true), $url);
	
?>
<b><?php echo $this->Html->link('Click here to activate your account', 'http://erp.blabfeed.com/client/usersLocation/activate/'.$code); ?>
</b>
<br />
<br />
Get on board today!<br />
The Blabfeed Team<br />
<br />
http://blabfeed.com/ 
<br />
6708 Pine St. MH 303-blab<br />
Omaha, NE 68108<br />
<?php echo $this->Html->image('img/blabfeed_web copy.png'); ?>