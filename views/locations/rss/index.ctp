<?php
debug($locations);
$this->set('documentData', array(
    'xmlns:dc' => 'http://purl.org/dc/elements/1.1/'));

$this->set('channelData', array(
    'title' => __("Most Recent Posts", true),
    'link' => $this->Html->url('/', true),
    'description' => __("Most recent posts.", true),
    'language' => 'en-us'));
	
	
	foreach ($locations as $location) {
    $postTime = strtotime($location['Location']['created']);

    $postLink = array(
        'controller' => 'ads',
        'action' => 'view',
        $post['Ads']['id']);
    // You should import Sanitize
    App::import('Sanitize');
    // This is the part where we clean the body text for output as the description
    // of the rss item, this needs to have only text to make sure the feed validates
    $bodyText = preg_replace('=\(.*?\)=is', '', $ad['Ad']['body']);
    $bodyText = $this->Text->stripLinks($bodyText);
    $bodyText = Sanitize::stripAll($bodyText);
    $bodyText = $this->Text->truncate($bodyText, 400, array(
        'ending' => '...',
        'exact'  => true,
        'html'   => true,
    ));

    echo  $this->Rss->item(array(), array(
		
        'title' => $ad['Ad']['title'],
        'link' => $postLink,
        'guid' => array('url' => $postLink, 'isPermaLink' => 'false'),
        'description' =>  $bodyText,
        //'dc:creator' => $ad['Ad']['author'],
        'pubDate' => $ad['Ad']['created']));
}


?>