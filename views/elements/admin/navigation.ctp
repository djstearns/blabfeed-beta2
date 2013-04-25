<div id="nav">
    <ul class="sf-menu">
        <li>
            <?php echo $this->Html->link(__('Content', true), array('plugin' => null, 'controller' => 'nodes', 'action' => 'index')); ?>
            <ul>
                <li><?php echo $this->Html->link(__('List', true), array('plugin' => null, 'controller' => 'nodes', 'action' => 'index')); ?></li>
                <li>
                    <?php echo $this->Html->link(__('Create', true), array('plugin' => null, 'controller' => 'nodes', 'action' => 'create')); ?>
                    <ul>
                        <?php foreach ($types_for_admin_layout AS $t) { ?>
                        <li><?php echo $this->Html->link($t['Type']['title'], array('plugin' => null, 'controller' => 'nodes', 'action' => 'add', $t['Type']['alias'])); ?></li>
                        <?php } ?>
                    </ul>
                </li>
                <li><?php echo $this->Html->link(__('Content types', true), array('plugin' => null, 'controller' => 'types', 'action' => 'index')); ?></li>
                <li>
                    <?php echo $this->Html->link(__('Taxonomy', true), array('plugin' => null, 'controller' => 'vocabularies', 'action' => 'index')); ?>
                    <ul>
                        <li><?php echo $this->Html->link(__('List', true), array('plugin' => null, 'controller' => 'vocabularies', 'action' => 'index')); ?></li>
                        <li><?php echo $this->Html->link(__('Add new', true), array('plugin' => null, 'controller' => 'vocabularies', 'action' => 'add'), array('class' => 'separator')); ?></li>
                        <?php foreach ($vocabularies_for_admin_layout AS $v) { ?>
                        <li><?php echo $this->Html->link($v['Vocabulary']['title'], array('plugin' => null, 'controller' => 'terms', 'action' => 'index', $v['Vocabulary']['id'])); ?></li>
                        <?php } ?>
                    </ul>
                </li>
                <li>
                    <?php echo $this->Html->link(__('Comments', true), array('plugin' => null, 'controller' => 'comments', 'action' => 'index')); ?>
                    <ul>
                        <li><?php echo $this->Html->link(__('Published', true), array('plugin' => null, 'controller' => 'comments', 'action' => 'index', 'filter' => 'status:1;')); ?></li>
                        <li><?php echo $this->Html->link(__('Approval', true), array('plugin' => null, 'controller' => 'comments', 'action' => 'index', 'filter' => 'status:0;')); ?></li>
                    </ul>
                </li>
            </ul>
        </li>

        <li>
            <?php echo $this->Html->link(__('Menus', true), array('plugin' => null, 'controller' => 'menus', 'action' => 'index')); ?>
            <ul>
                <li><?php echo $this->Html->link(__('Menus', true), array('plugin' => null, 'controller' => 'menus', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Add new', true), array('plugin' => null, 'controller' => 'menus', 'action' => 'add'), array('class' => 'separator')); ?></li>
                <?php foreach ($menus_for_admin_layout AS $m) { ?>
                <li><?php echo $this->Html->link($m['Menu']['title'], array('plugin' => null, 'controller' => 'links', 'action' => 'index', $m['Menu']['id'])); ?></li>
                <?php } ?>
            </ul>
        </li>

        <li>
            <?php echo $this->Html->link(__('Blocks', true), array('plugin' => null, 'controller' => 'blocks', 'action' => 'index')); ?>
            <ul>
                <li><?php echo $this->Html->link(__('Blocks', true), array('plugin' => null, 'controller' => 'blocks', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Regions', true), array('plugin' => null, 'controller' => 'regions', 'action' => 'index')); ?></li>
            </ul>
        </li>

        <li>
            <?php echo $this->Html->link(__('Extensions', true), array('plugin' => 'extensions', 'controller' => 'extensions_plugins', 'action' => 'index')); ?>
            <ul>
                <li><?php echo $this->Html->link(__('Themes', true), array('plugin' => 'extensions', 'controller' => 'extensions_themes', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Locales', true), array('plugin' => 'extensions', 'controller' => 'extensions_locales', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Plugins', true), array('plugin' => 'extensions', 'controller' => 'extensions_plugins', 'action' => 'index'), array('class' => Configure::read('Admin.menus') ? 'separator' : '', 'escape' => false)); ?></li>
                <?php
                if (Configure::read('Admin.menus')) {
                    foreach (array_keys(Configure::read('Admin.menus')) AS $p) {
                        echo '<li>';
                        echo $this->element('admin_menu', array('plugin' => $p));
                        echo '</li>';
                    }
                }
                ?>
            </ul>
        </li>

        <li>
            <?php echo $this->Html->link(__('Media', true), array('plugin' => null, 'controller' => 'attachments', 'action' => 'index')); ?>
            <ul>
                <li><?php echo $this->Html->link(__('Attachments', true), array('plugin' => null, 'controller' => 'attachments', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('File Manager', true), array('plugin' => null, 'controller' => 'filemanager', 'action' => 'index')); ?></li>
            </ul>
        </li>

        <li>
            <?php echo $this->Html->link(__('Contacts', true), array('plugin' => null, 'controller' => 'contacts', 'action' => 'index')); ?>
            <ul>
                <li><?php echo $this->Html->link(__('Contacts', true), array('plugin' => null, 'controller' => 'contacts', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Messages', true), array('plugin' => null, 'controller' => 'messages', 'action' => 'index')); ?></li>
            </ul>
        </li>

        <li>
            <?php echo $this->Html->link(__('Users', true), array('plugin' => null, 'controller' => 'users', 'action' => 'index')); ?>
            <ul>
                <li><?php echo $this->Html->link(__('Users', true), array('plugin' => null, 'controller' => 'users', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Roles', true), array('plugin' => null, 'controller' => 'roles', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Permissions', true), array('plugin' => 'acl', 'controller' => 'acl_permissions', 'action' => 'index')); ?></li>
            </ul>
        </li>

        <li>
            <?php echo $this->Html->link(__('Settings', true), array('plugin' => null, 'controller' => 'settings', 'action' => 'prefix', 'Site')); ?>
            <ul>
                <li><?php echo $this->Html->link(__('Site', true), array('plugin' => null, 'controller' => 'settings', 'action' => 'prefix', 'Site')); ?></li>
                <li><?php echo $this->Html->link(__('Meta', true), array('plugin' => null, 'controller' => 'settings', 'action' => 'prefix', 'Meta')); ?></li>
                <li><?php echo $this->Html->link(__('Reading', true), array('plugin' => null, 'controller' => 'settings', 'action' => 'prefix', 'Reading')); ?></li>
                <li><?php echo $this->Html->link(__('Writing', true), array('plugin' => null, 'controller' => 'settings', 'action' => 'prefix', 'Writing')); ?></li>
                <li><?php echo $this->Html->link(__('Comment', true), array('plugin' => null, 'controller' => 'settings', 'action' => 'prefix', 'Comment')); ?></li>
                <li><?php echo $this->Html->link(__('Service', true), array('plugin' => null, 'controller' => 'settings', 'action' => 'prefix', 'Service')); ?></li>
                <li><?php echo $this->Html->link(__('Languages', true), array('plugin' => null, 'controller' => 'languages', 'action' => 'index')); ?></li>
            </ul>
        </li>
        <li>
            <?php echo $this->Html->link('Navigation', array('label'=>'Navigation')); ?>
            <ul>
                <li><?php echo $this->Html->link(__('Ads', true), array('plugin' => null, 'controller' => 'ads', 'action' => 'index')); ?>
                	<ul>
                    	<li><?php echo $this->Html->link(__('Ads', true), array('plugin' => null, 'controller' => 'ads', 'action' => 'index')); ?>
                            <ul>
                                <li><?php echo $this->Html->link(__('Add New', true), array('plugin' => null, 'controller' => 'ads', 'action' => 'add')); ?></li>
                                <li><?php echo $this->Html->link(__('List', true), array('plugin' => null, 'controller' => 'ads', 'action' => 'index')); ?></li>
                            </ul>
                        </li>
                    	<li><?php echo $this->Html->link(__('Impressions', true), array('plugin' => null, 'controller' => 'impressions', 'action' => 'index')); ?>
                            <ul>
                                <li><?php echo $this->Html->link(__('Add New', true), array('plugin' => null, 'controller' => 'impressions', 'action' => 'add')); ?></li>
                                <li><?php echo $this->Html->link(__('List', true), array('plugin' => null, 'controller' => 'impressions', 'action' => 'index')); ?></li>
                            </ul>
                        </li>
                        <li><?php echo $this->Html->link(__('Locations', true), array('plugin' => null, 'controller' => 'locations', 'action' => 'index')); ?>
                            <ul>
                                <li><?php echo $this->Html->link(__('Add New', true), array('plugin' => null, 'controller' => 'locations', 'action' => 'add')); ?></li>
                                <li><?php echo $this->Html->link(__('List', true), array('plugin' => null, 'controller' => 'locations', 'action' => 'index')); ?></li>
                            </ul>
                        </li>
                        <li><?php echo $this->Html->link(__('Categories', true), array('plugin' => null, 'controller' => 'languages', 'action' => 'index')); ?>
                            <ul>
                                <li><?php echo $this->Html->link(__('Add New', true), array('plugin' => null, 'controller' => 'categories', 'action' => 'add')); ?></li>
                                <li><?php echo $this->Html->link(__('List', true), array('plugin' => null, 'controller' => 'categories', 'action' => 'index')); ?></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><?php echo $this->Html->link(__('Devices', true), array('plugin' => null, 'controller' => 'devices', 'action' => 'index')); ?>
                	<ul>
                    	<li><?php echo $this->Html->link(__('Devices', true), array('plugin' => null, 'controller' => 'devices', 'action' => 'index')); ?>
                            <ul>
                                <li><?php echo $this->Html->link(__('Add New', true), array('plugin' => null, 'controller' => 'devices', 'action' => 'add')); ?></li>
                                <li><?php echo $this->Html->link(__('List', true), array('plugin' => null, 'controller' => 'devices', 'action' => 'index')); ?></li>
                            </ul>
                        </li>
                    	<li><?php echo $this->Html->link(__('Orders', true), array('plugin' => null, 'controller' => 'orders', 'action' => 'index')); ?>
                            <ul>
                                <li><?php echo $this->Html->link(__('Add New', true), array('plugin' => null, 'controller' => 'orders', 'action' => 'add')); ?></li>
                                <li><?php echo $this->Html->link(__('List', true), array('plugin' => null, 'controller' => 'orders', 'action' => 'index')); ?></li>
                            </ul>
                      	</li>
                        <li><?php echo $this->Html->link(__('Device Types', true), array('plugin' => null, 'controller' => 'devicetypes', 'action' => 'index')); ?>
                            <ul>
                                <li><?php echo $this->Html->link(__('Add New', true), array('plugin' => null, 'controller' => 'devicetypes', 'action' => 'add')); ?></li>
                                <li><?php echo $this->Html->link(__('List', true), array('plugin' => null, 'controller' => 'devicetypes', 'action' => 'index')); ?></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><?php echo $this->Html->link('Billing', array('label'=>'Billing')); ?>
                    <ul>
                        <li><?php echo $this->Html->link(__('Credit cards', true), array('plugin' => null, 'controller' => 'braintree_credit_cards', 'action' => 'index')); ?>
                            <ul>
                                <li><?php echo $this->Html->link(__('List', true), array('plugin' => null, 'controller' => 'braintree_credit_cards', 'action' => 'index')); ?></li>
                            </ul>
                        </li>
                        <li><?php echo $this->Html->link('Subscriptions', array('label'=>'Subscriptions')); ?>
                            <ul>
                                <li><?php echo $this->Html->link(__('Add New', true), array('plugin' => null, 'controller' => 'subscriptions', 'action' => 'add')); ?></li>
                                <li><?php echo $this->Html->link(__('List', true), array('plugin' => null, 'controller' => 'subscriptions', 'action' => 'index')); ?></li>
                            </ul>
                        </li>
                        <li><?php echo $this->Html->link('Transactions', array('label'=>'Transactions')); ?>
                            <ul>
                                <li><?php echo $this->Html->link(__('List', true), array('plugin' => null, 'controller' => 'transactions', 'action' => 'index')); ?></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><?php echo $this->Html->link(__('Users', true), array('plugin' => null, 'controller' => 'users', 'action' => 'index')); ?>
                	<ul>
                    	<li><?php echo $this->Html->link(__('Contracts', true), array('plugin' => null, 'controller' => 'contracts', 'action' => 'index')); ?>
                        	<ul>
                            	<li><?php echo $this->Html->link(__('Add New', true), array('plugin' => null, 'controller' => 'contracts', 'action' => 'add')); ?></li>
                                <li><?php echo $this->Html->link(__('List', true), array('plugin' => null, 'controller' => 'contracts', 'action' => 'index')); ?></li>
                            </ul>
                        </li>
                    	
                        
                        <li><?php echo $this->Html->link(__('Credits', true), array('plugin' => null, 'controller' => 'credits', 'action' => 'index')); ?>
                        	<ul>
                            	<li><?php echo $this->Html->link(__('Add New', true), array('plugin' => null, 'controller' => 'credits', 'action' => 'add')); ?></li>
                                <li><?php echo $this->Html->link(__('List', true), array('plugin' => null, 'controller' => 'credits', 'action' => 'index')); ?></li>
                            </ul>
                        </li>
                        <li><?php echo $this->Html->link(__('Coupon Codes', true), array('plugin' => null, 'controller' => 'couponcodes', 'action' => 'index')); ?>
                        	<ul>
                            	<li><?php echo $this->Html->link(__('Add New', true), array('plugin' => null, 'controller' => 'couponcodes', 'action' => 'add')); ?></li>
                                <li><?php echo $this->Html->link(__('List', true), array('plugin' => null, 'controller' => 'couponcodes', 'action' => 'index')); ?></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</div>