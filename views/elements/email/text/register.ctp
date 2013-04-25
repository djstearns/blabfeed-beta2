Welcome to Blabfeed!

<?php echo sprintf(__('Hey %s', true), $user['User']['username']); ?>,



Thank you for joining the blabfeed network.  To activate your account please verify your email address by clicking the link below: <br /><br />
<?php
    $url = Router::url(array(
        'controller' => 'users',
        'action' => 'activate',
        $user['User']['username'],
        $user['User']['activation_key'],
    ), true);
?>
<?php echo $this->Html->link('Click here to activate your account', 'http://erp.blabfeed.com/users/activate/'.$user['User']['username'].'/'.$user['User']['activation_key']); ?>


Link doesn't work? Copy the following link to your browser address bar:
http://erp.blabfeed.com/users/activate/<?php echo $user['User']['username']; ?>/<?php echo $user['User']['activation_key']; ?>


Below is your login information. Make sure to keep this safe.

Your username: <?php echo $user['User']['username']; ?>
Your email address: <?php echo $user['User']['email']; ?>


Get on board today!
The Blabfeed Team

http://blabfeed.com/ 

6708 Pine St. MH 303-blab
Omaha, NE 68108