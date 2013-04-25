<div id="nav">
    <ul class="sf-menu">
        <li>
            <?php echo $this->Html->link(__('Ads', true), array('plugin' => null, 'controller' => 'ads', 'action' => 'index')); ?>
            <ul>
            	<li><?php echo $this->Html->link(__('Create', true), array('plugin' => null, 'controller' => 'uploads', 'action' => 'add')); ?></li>
                <li><?php echo $this->Html->link(__('My Inbox', true), array('plugin' => null, 'controller' => 'ads', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('My Outbox', true), array('plugin' => null, 'controller' => 'ads', 'action' => 'outbox')); ?></li>
                <li><?php echo $this->Html->link(__('Approved Ads', true), array('plugin' => null, 'controller' => 'ads', 'action' => 'approvedads')); ?></li>
                <li><?php echo $this->Html->link(__('Unapproved Ads', true), array('plugin' => null, 'controller' => 'ads', 'action' => 'unapprovedads')); ?></li>
                
            </ul>
        </li>

        <li>
            <?php echo $this->Html->link(__('Locations', true), array('plugin' => null, 'controller' => 'locations', 'action' => 'index')); ?>
            <ul>
            	<li><?php echo $this->Html->link(__('My Locations', true), array('plugin' => null, 'controller' => 'locations', 'action' => 'mylocations')); ?></li>
                <li><?php echo $this->Html->link(__('Find Near Me', true), array('plugin' => null, 'controller' => 'locations', 'action' => 'nearme')); ?></li>
                <li><?php echo $this->Html->link(__('Add', true), array('client'=>true, 'controller' => 'locations', 'action' => 'add')); ?></li>
                <li><?php echo $this->Html->link(__('Add Permissions', true), array('client'=>true, 'controller' => 'usersLocations', 'action' => 'add')); ?></li>
                <li><?php echo $this->Html->link(__('view Permissions', true), array('client'=>true, 'controller' => 'usersLocations', 'action' => 'index')); ?></li>
           
            </ul>
        </li>
        
        <li>
            <?php echo $this->Html->link(__('My Profile', true), array('plugin' => null, 'controller' => 'users', 'action' => 'index')); ?>
            <ul>
                <li><?php echo $this->Html->link(__('Edit', true), array('client'=>true, 'controller' => 'users', 'action' => 'edit', Configure::read('userinfo'))); ?></li>
           
            </ul>
        </li>
        <li>
            <?php echo $this->Html->link(__('Help', true), array('plugin' => null, 'controller' => 'users', 'action' => 'index')); ?>
            <ul>
                <li><?php echo $this->Html->link('FAQ', 'http://www.erp.blabfeed.com/faq'); ?></li>
           
            </ul>
        </li>

       
    </ul>
</div>