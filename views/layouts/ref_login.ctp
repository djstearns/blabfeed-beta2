<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo $title_for_layout; ?> - <?php __('Blabfeed'); ?></title>
    <?php
        echo $this->Html->css(array(
            'reset',
            '960',
            'admin',
        ));
        echo $scripts_for_layout;
    ?>
    <script type="text/javascript" src="http://www.blabfeed.com/javascripts/jquery-1.7.1.min.js"></script>
	
</head>

<body>

    <div id="wrapper" >
        <div id="header">
            <p id="backtosite">
            <?php echo $this->Html->link(__('Back to', true) . ' ' . Configure::read('Site.title'), '/'); ?>
            </p>
        </div>

        <div id="main" class="container_16">
           
            <?php
                echo $this->Layout->sessionFlash();
                echo $content_for_layout;
            ?>
           
        </div>

        <?php echo $this->element('admin/footer'); ?>

    </div>


    </body>
</html>