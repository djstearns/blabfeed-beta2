<script src="//platform.linkedin.com/in.js" type="text/javascript"></script>

<?php $user = $this->requestAction('users/view'); ?>
<div style="float:right;">
<li style="float:left; list-style: none;">
	<span style="color:#FFF;"><b>Refer a friend, get a $25 credit: </b></span>
</li>

<li class="iconlist">  
	<div id="url" title="Get $50 in free credit for signing up at blabfeed.com with this link: http://dev.blabfeed.com/users/addref/<?php echo $user['User']['id']; ?>" id="url"><span style="color:#FFF;"></span></div>
</li>


<li class="iconlist"> 
<?php echo $this->Html->link('', 'mailto:?body='.rawurlencode('Create a free account now at blabfeed.com and get $50 in free advertising! Limited-time offer, check it out here: 
').'http://dev.blabfeed.com/users/addref/'.$user['User']['id'].'&subject='.rawurlencode('I think blabfeed would be great for you'), array('escape' => false, 'class'=>'icon-mail')); ?>
</li>


<li class="iconlist"> 
	<?php echo $this->Html->link('', 'http://twitter.com/share?text='.urlencode('Create a free account now at blabfeed.com and get $50 in free advertising! Limited-time offer, check it out here: ').'&url=http://dev.blabfeed.com/users/addref/'.$user['User']['id'].'',  array('escape' => false, 'class'=>'icon-twitter')); ?>
</li>
			

<li class="iconlist">
	
	<?php $fburl = 'http://www.facebook.com/sharer.php?s=100&p[url]='.rawurlencode('http://dev.blabfeed.com/users/addref/'.$user['User']['id']).'&p[summary]='.rawurlencode('Create an account FREE at blabfeed.com and get $50 in advertising credit.  Hurry, limited-time offer.').'&p[title]='.rawurlencode('Get $50 in FREE Advertising').'&p[images][0]='.rawurlencode('http://dev.blabfeed.com/img/blabfeedfb.png'); ?>
	
	<?php echo $this->Html->link('', 
								'javascript:window.open("'.$fburl.'", "facebook_share", "height=320, width=640, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no");'
								, 
								
								array('class'=>'icon-facebook')
								
								); ?>
	
	
<p id='msg'></p>
</li>


<li class="iconlist"> 
	<script type="IN/Share" data-url="http://dev.blabfeed.com/users/addref/1"></script>	
</li>
</div>	
<script type="text/javascript">
	FB.init({appId: "444372982277794", status: true, cookie: true});

      function postToFeed() {

        // calling the API ...
        var obj = {
          method: 'feed',
          redirect_uri: 'http://dev.blabfeed.com/client',
          link: 'http://dev.blabfeed.com/users/addref/<?php echo $user['User']['id']; ?>',
          picture: 'http://fbrell.com/f8.jpg',
          name: 'Name of Blabfeed',
          caption: 'Blabfeed Share on Facebook caption',
          description: 'Blabfeed Share on Facebook descr. '
        };

        function callback(response) {
          document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
        }

        FB.ui(obj, callback);
      }

	$("#url").click(function(){
		var url = $(this).attr("title");
		window.clipboardData.setData('Text',url);
	});
	
</script>
<style type="text/css">
.icon-mail{

  background:url('http://erp.blabfeed.com/img/share_sprite.png') no-repeat;
  background-position: 0 -32px;
  float:left;
  display:block;
  width:32px;
  height:32px;
 
}

.icon-twitter{

  background:url('http://erp.blabfeed.com/img/share_sprite.png') no-repeat;
  background-position: 0 -96px;
  float:left;
  display:block;
  width:32px;
  height:32px;
  

}

.icon-facebook{

  background:url('http://erp.blabfeed.com/img/share_sprite.png') no-repeat 0 0 ;
  background-position: 0 -64px;
  float:left;
  display:block;
   width:32px;
  height:32px;
  
}

.iconlist{
	float:left; 
	height:32px; 
	list-style: none;
	margin-left:5px;
}
</style>

