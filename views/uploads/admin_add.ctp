 
 <script>
    $(function() {
        $( document ).tooltip();
    });
    </script>
    <div class="uploads form">
<?php echo $this->Form->create('Upload', array('type'=>'file'));?>
	<fieldset>
 		<legend><h3>Step 1: Upload your media</h3></legend>
	<?php
		echo $this->Form->input('Ad.name', array('label'=>'Name your ad packet', 'title'=>'test tooltip','div'=>false)); echo '&nbsp;'.$this->Html->image('cake_logo.png', array('title' => 'Give your ad packet a short descriptive name to ensure chances of approval.'));
		echo '<br />';
		echo $this->Form->input('name', array('label'=>'File Alias','div'=>false)); echo '&nbsp;'.$this->Html->image('cake_logo.png', array('title' => 'You can give your file name an alias in case the actual file name is not descriptive enough.'));
		echo '<br />';
		?>
        <div class="tabs">
                <ul>
                	<li><a href="#Emails-tab"><span><?php __('Emails'); ?></span></a></li>
                    <li><a href="#Businesses-tab"><span><?php __('Businesses'); ?></span></a></li>
                	
                    <?php echo $this->Layout->adminTabs(); ?>
                </ul>
         
        		<div id="Emails-tab" style="width:870px; height:400px;  border:thin;">
					<?
                    echo $this->Form->input('file', array('type'=>'file'));
                    echo $this->Form->input('Upload.user_id', array('type'=>'hidden', 'value'=>$user,'div'=>false));
                    echo $this->Form->input('Ad.user_id', array('type'=>'hidden', 'value'=>$user));
                    ?>
            	</div>
                <div id="Businesses-tab" style="width:870px; height:400px;  border:thin;">
					<?
                    echo $this->Form->input('file', array('type'=>'file'));
                    echo $this->Form->input('Upload.user_id', array('type'=>'hidden', 'value'=>$user,'div'=>false));
                    echo $this->Form->input('Ad.user_id', array('type'=>'hidden', 'value'=>$user));
                    ?>
            	</div>
            
        </div>
            
        
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<!--<div class="actions">
	<h3></h3>
	<ul>
		<li><?php //echo $this->Html->link(__('List Uploads', true), array('action' => 'index'));?></li>
		<li><?php //echo $this->Html->link(__('List Ads', true), array('controller' => 'ads', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Ad', true), array('controller' => 'ads', 'action' => 'add')); ?> </li>
	</ul>
</div>-->