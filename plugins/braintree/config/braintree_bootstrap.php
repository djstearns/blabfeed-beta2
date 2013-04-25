<?php
//BE CAREFUL THIS WILL BREAK THE HOME PAGES.
/**
 * Configuration
 */
   /* Configure::write('Braintree.actions', array(
        'Nodes/admin_add' => array(
            array(
                'elements' => 'NodeBody',
            ),
        ),
        'Nodes/admin_edit' => array(
            array(
                'elements' => 'NodeBody',
            ),
        ),
        'Translate/admin_edit' => array(
            array(
                'elements' => 'NodeBody',
            ),
        ),
		'Blocks/admin_edit' => array(
            array(
                'elements' => 'BlockBody',
            ),
        ),
		'Blocks/admin_add' => array(
            array(
                'elements' => 'BlockBody',
            ),
        )
    ));
*/
/**
 * Hook helper
 */
    
	/*foreach (Configure::read('Braintree.actions') AS $action => $settings) {
        $actionE = explode('/', $action);
        Croogo::hookHelper($actionE['0'], 'Braintree.Braintree');
    }
    Croogo::hookHelper('Braintree', 'Braintree.Braintree');
*/
?>