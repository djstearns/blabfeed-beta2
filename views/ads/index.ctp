<?php //echo '<rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/" xmlns:feedLoc="urn:Feeds:Location"><channel><title>Content Mix for videos</title><link>http://www.screenfeed.com/</link><description>Screenfeed Content Server</description><docs>http://www.rssboard.org/rss-specification</docs><generator>Screenfeed Content Server</generator><lastBuildDate>Wed, 02 Jan 2013 13:52:52 GMT</lastBuildDate><ttl>5</ttl>';
?>
<?php 
	echo '<items>';
	
	foreach ($ads as $ad) {
		if($ad['Upload']['type'] != 'video/mp4' && $ad['Upload']['type'] != 'video/mpg' && $ad['Upload']['type'] != 'video/mpeg' ){
			//test for pic
			if($ad['Ad']['upload_id'] != 0){
				echo '<item name="hey" resource="http://erp.blabfeed.com/files/'.$ad['Upload']['name'].'" ></item>';
				//echo'<item><title>'.$ad['Ad']['name'].'</title><guid isPermaLink="false">2467725</guid>			  <pubDate>Wed, 02 Jan 2013 13:48:47 GMT</pubDate>			  <enclosure length="0" type="'.$ad['Upload']['type'].'" url="http://erp.blabfeed.com/files/'.$ad['Upload']['name'].'" />	<media:content url="http://erp.blabfeed.com/files/'.$ad['Upload']['name'].'" type="'.$ad['Upload']['type'].'" medium="video" duration="20" height="1080" width="1920"><media:title type="plain">'.$ad['Ad']['name'].'</media:title><media:credit /><media:thumbnail url="http://erp.blabfeed.com/files/'.$ad['Upload']['name'].'" /></media:content></item>';
			}else{
				echo '<item name="hey" title="'.$ad['Ad']['messageheader'].'" body="'.$ad['Ad']['messagetxt'].'" contact="'.$ad['Ad']['messagecontact'].'" resource="http://erp.blabfeed.com/img/blank.jpg" qr="'.$this->GoogleChart->qr(array('chl'=>'http://'.$_SERVER['HTTP_HOST'] . $this->base . '/ads/hit/ad:'.$ad['Ad']['id'].'/loc:'.$thislocation)).'" ></item>';
				echo $this->Html->image($this->GoogleChart->qr(array('chl'=>'http://'.$_SERVER['HTTP_HOST'] . $this->base . '/ads/hit/ad:'.$ad['Ad']['id'].'/loc:'.$thislocation)));
			}
			//debug($ad);
			
		}else{
			//echo'<item><title>'.$ad['Ad']['name'].'</title><guid isPermaLink="false">2467725</guid>			  <pubDate>Wed, 02 Jan 2013 13:48:47 GMT</pubDate>			  <enclosure length="0" type="'.$ad['Upload']['type'].'" url="http://erp.blabfeed.com/files/'.$ad['Upload']['name'].'" />	<media:content url="http://erp.blabfeed.com/files/'.$ad['Upload']['name'].'" type="'.$ad['Upload']['type'].'" medium="video" duration="20" height="1080" width="1920"><media:title type="plain">'.$ad['Ad']['name'].'</media:title><media:credit /><media:thumbnail url="http://erp.blabfeed.com/files/'.$ad['Upload']['name'].'" /></media:content></item>';
			
		}
	}
	echo '</items>';
	//echo '</channel></rss>'; 
?>