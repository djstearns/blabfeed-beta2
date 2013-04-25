<div class="users form">
    <h2><?php __('Login'); ?></h2>
    <?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login')));?>
        <!--<fieldset>-->
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
        ?>
        <!--</fieldset>-->
    <?php echo $this->Form->end('Submit');?>
    <?php echo $this->Html->link('Click here to sign in!', 'http://erp.blabfeed.com/client', array('target'=>'_blank')); ?>
    <?php echo $this->Html->image('checkemail.png', array('width'=>317, 'height'=>340)); ?>
</div>