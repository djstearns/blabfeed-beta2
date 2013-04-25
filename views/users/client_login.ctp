<div class="users form">
	<script src="http://galaxy.mediasignage.com/WebService/install/DownloadUtils.js" language="javascript"></script>
	<script src="http://galaxy.mediasignage.com/WebService/install/AC_RunActiveContent.js" language="javascript"></script>

    <script language="JavaScript" type="text/javascript">
        var badgeDirectory = "http://galaxy.mediasignage.com/WebService/install/"
        var airApplicationImage = 'http://galaxy.mediasignage.com/WebService/install/AIRSudioInstall.png';
        var airApplicationArguments = 'f7bee07a7e79c8efdb961c4d30d20e10c66442110de03d6143304c04b5eb';
        var airApplicationURL = "http://galaxy.mediasignage.com/Code/Install/Air/CloudSignageStudio.air";
        var airApplicationName = "Air Studio";			
    </script>
	
    <!-- Noscript Block for users with JavaScript Disabled -->
	
		
    <?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login')));?>
        <fieldset>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
        ?>
        </fieldset>
    <?php
        echo $this->Html->link(__('Forgot password?', true), array(
            'admin' => false,
            'controller' => 'users',
            'action' => 'forgot',
        ), array(
            'class' => 'forgot',
        ));
        echo $this->Form->submit('Log In', array('class'=>'nofloat'));
		echo $this->Form->end();
    ?>
   
    <br />
    <center>
    	<script src="http://galaxy.mediasignage.com/WebService/install/InstallBadge.js" language="javascript"></script>	
    	<noscript>
		<table id="AIRDownloadMessageTable">
			<tr>
				<td>
				Download <a href="http://galaxy.mediasignage.com/Code/Install/Air/CloudSignageStudio.air">Studio</a> now.<br /><br />
				<span id="AIRDownloadMessageRuntime">
				This application requires the Adobe&#174;&nbsp;AIR&#8482; runtime to be installed for 
				<a href="http://get.adobe.com/air/thankyou/?installer=Adobe_AIR_4.0_for_MacOS_X">Mac OS</a> or 
				<a href="http://get.adobe.com/air/thankyou/?installer=Adobe_AIR_4.0_for_Win32">Windows</a>.</span>
				</td>
			</tr>
		</table>
        </noscript>
        </center>
</div>