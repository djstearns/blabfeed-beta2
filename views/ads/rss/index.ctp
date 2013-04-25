<?php 
echo $this->set('documentData', array(
    'xmlns:dc' => 'http://purl.org/dc/elements/1.1/'));

$this->set('channelData', array(
    'title' => __("Most recent ads", true),
    'link' => $this->Html->url('/', true),
    'description' => __("Most recent Ads", true),
    'language' => 'en-us'));
	//debug($ads);
	foreach ($ads as $ad) {
    // You should import Sanitize
		if($ad['Upload']['type'] != 'video/mp4' && $ad['Upload']['type'] != 'video/mpg' && $ad['Upload']['type'] != 'video/mpeg' ){
			//test for pic
			if($ad['Ad']['upload_id'] != 0){

				$postLink = str_replace(' ', '%20', 'http://erp.blabfeed.com/files/'.$ad['Upload']['name']);
				$bodyText = '';
			}else{
				
				// This is the part where we clean the body text for output as the description
				// of the rss item, this needs to have only text to make sure the feed validates
				$bodyText = $ad['Ad']['messageheader'].' '.$ad['Ad']['messagetxt'].' '.$ad['Ad']['messagecontact'];
				$bodyText = preg_replace('=\(.*?\)=is', '', $bodyText);
				$bodyText = $this->Text->stripLinks($bodyText);
				$bodyText = Sanitize::stripAll($bodyText);
				$bodyText = $this->Text->truncate($bodyText, 400, array(
					'ending' => '...',
					'exact'  => true,
					'html'   => true,
				));
				$postLink = 'http://erp.blabfeed.com/ads/'.$ad['Ad']['id'];
			}
		}else{
			$bodyText = '';
			
		}
		
				$postTime = strtotime($ad['Ad']['created']);
			echo	$this->Rss->item(array(), array(
				'title' => $ad['Ad']['name'],
				'link' => $postLink,
				'guid' => array('url' => $postLink, 'isPermaLink' => 'true'),
				'description' =>  $bodyText,
				'pubDate' => $postTime ));
	}
?>