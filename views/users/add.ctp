<div class="users form">
    <h2>Create your free account!<?php //echo $title_for_layout; ?></h2>
    <?php echo $this->Form->create('User');?>
        <fieldset>
        <?php
            echo $this->Form->input('username');
			echo $this->Form->input('email');
            echo $this->Form->input('password', array('value' => ''));
			echo $this->Form->input('phone');
            //echo $this->Form->input('name');
            //echo $this->Form->input('website');
        ?>
        </fieldset>
    <?php echo $this->Form->end(array('label'=>'Sign up!'));?>
    <?php echo $this->Html->link('Sign in', 'http://erp.blabfeed.com/client', array('target'=>'_blank'));?>
</div>