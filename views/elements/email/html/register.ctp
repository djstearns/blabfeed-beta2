<p><b>Welcome to Blabfeed!</b></p>

<?php echo sprintf(__('Hey %s', true), $user['User']['username']); ?>,
<br />
<br />
<br />
Thank you for joining the Blabfeed network.  To activate your account please verify your email address by clicking the link below: <br /><br />
<?php
    $url = Router::url(array(
        'controller' => 'users',
        'action' => 'activate',
        $user['User']['username'],
        $user['User']['activation_key'],
    ), true);
    //echo sprintf(__('Please click this link to activate your account: %s', true), $url);
	
?>
<b><?php echo $this->Html->link('Click here to activate your account', 'http://erp.blabfeed.com/users/activate/'.$user['User']['username'].'/'.$user['User']['activation_key']); ?>
</b>
<br />
<br />
Link doesn't work? Copy the following link to your browser address bar:<br />
http://erp.blabfeed.com/users/activate/<?php echo $user['User']['username']; ?>/<?php echo $user['User']['activation_key']; ?>
<br />
<br />
Below is your login information. Make sure to keep this safe.<br />
<br />
Your username: <b><?php echo $user['User']['username']; ?></b><br />
Your email address: <b><?php echo $user['User']['email']; ?></b><br />
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