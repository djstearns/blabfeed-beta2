<div class="users form">
    <h2><?php __('Edit User'); ?></h2>

  

    <?php echo $this->Form->create('User');?>
    <fieldset>
        <div class="tabs">
            <ul>
                <li><a href="#user-main"><?php __('Profile'); ?></a></li>
                <li><a href="#billing-main"><?php __('Billing'); ?></a></li>
                <?php echo $this->Layout->adminTabs(); ?>
            </ul>

            <div id="user-main">
            <?php
                echo $this->Form->input('id');
          
                echo $this->Form->input('username');
                echo $this->Form->input('name');
				    echo $this->Form->input('email');
					echo $this->Form->input('phone'); echo '&nbsp;'.$this->Html->image('tooltip.gif', array('title' => 'format: 999999999'));
            
            
             
            ?>
            </div>
             <div id="billing-main">
            	<table>
                
                <?php foreach($btcc as $cc): ?>
                <tr>
                <td>Name: <?php echo $cc['BraintreeCreditCard']['cardholder_name']; ?><br />
                	Type: <?php echo $cc['BraintreeCreditCard']['card_type']; ?><br />
                    Number: <?php echo $cc['BraintreeCreditCard']['masked_number']; ?><br />
                    Exp date: <?php echo date('m/Y',strtotime($cc['BraintreeCreditCard']['expiration_date'])); ?><br />
                    Default: <?php echo $cc['BraintreeCreditCard']['is_default']; ?><br />
                </td>
                <td>
                	<div class="actions"><ul><li><?php echo $this->Html->link('View Subscription(s)', array('action'=>'client_index', 'controller'=>'braintree_subscriptions', $cc['BraintreeCreditCard']['token'])); ?></li></ul></div>
                </td>
                </tr>
                <?php endforeach; ?>
                </table>
               <div class="actions"><ul><li><?php echo $this->Html->link('Add Credit Card', array('action'=>'client_addcc')); ?></li></ul></div>
                Your information is stored securely on a PCI compliant server with Braintree.
            </div>
       		
            <?php echo $this->Layout->adminTabs(); ?>
        </div>
    </fieldset>

    <div class="buttons">
    <?php
        echo $this->Form->end(__('Save', true));
        echo $this->Html->link(__('Cancel', true), array(
            'action' => 'index',
        ), array(
            'class' => 'cancel',
        ));
    ?>
    </div>
</div>