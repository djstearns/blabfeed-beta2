<div id="nav">
    <ul class="sf-menu">
        <li>
            <?php echo $this->Html->link(__('Inventory', true), array('plugin' => null, 'controller' => 'devices', 'action' => 'index')); ?>
            <ul>
             	<li><?php echo $this->Html->link(__('View All', true), array('plugin' => null, 'controller' => 'device', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Add Device Type', true), array('plugin' => null, 'controller' => 'devicetypes', 'action' => 'add')); ?></li>
               
                
            </ul>
        </li>

        <li>
            <?php echo $this->Html->link(__('Orders', true), array('plugin' => null, 'controller' => 'orders', 'action' => 'index')); ?>
            <ul>
                <li><?php echo $this->Html->link(__('Add', true), array('employee'=>true, 'controller' => 'orders', 'action' => 'add')); ?></li>
           
            </ul>
        </li>
        
        <li>
            <?php echo $this->Html->link(__('My Profile', true), array('plugin' => null, 'controller' => 'users', 'action' => 'index')); ?>
            <ul>
                <li><?php echo $this->Html->link(__('Edit', true), array('client'=>true, 'controller' => 'users', 'action' => 'edit', 2)); ?></li>
           
            </ul>
        </li>

       
    </ul>
</div>