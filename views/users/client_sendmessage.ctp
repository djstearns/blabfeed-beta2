<div class="messages form">
    <?php echo $this->Form->create('User');?>
    <fieldset>
    <?php //debug($this->data); ?>
    <?php
       
	   
        echo $this->Form->input('message.CC_email');
        echo $this->Form->input('message.title');
        echo $this->Form->input('message.body', array('type'=>'text'));
        //echo $this->Form->input('message.phone');
        //echo $this->Form->input('message.address');
    ?>
    </fieldset>

    <div class="buttons">
    <?php
        echo $this->Form->end(__('Send', true));
 
    ?>
    </div>
</div>