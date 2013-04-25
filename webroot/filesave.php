<?php
/*
 * filesave.php
 * To be used with ext-server_opensave.js for SVG-edit
 *
 * Licensed under the MIT License
 *
 * Copyright(c) 2010 Alexis Deveria
 *
 */
 //echo $_POST['output_png'];
if(!isset($_POST['output_svg']) && !isset($_POST['output_png'])) {
	//die('post fail');
}

$file = '';

$suffix = isset($_POST['output_svg'])?'.svg':'.png';

if(isset($_POST['filename']) && strlen($_POST['filename']) > 0) {
	$file = $_POST['filename'] . $suffix;
} else {
	$file = 'image' . $suffix;
}

if($suffix == '.svg') {
	$mime = 'image/svg+xml';
	$contents = rawurldecode($_POST['output_svg']);
} else {
	//echo 'test';
	$mime = 'image/png';
	$contents = $_POST['output_png'];
	$pos = (strpos($contents, 'base64,') + 7);
	//$contents = base64_decode(substr($contents, $pos));
	
	
	
	$ha = substr($contents, $pos);
	$chunk = '1024';
	$chrpos = 0;
	$str = '';
	while($chrpos < strlen($ha)){
		//echo 'decode: '.$strpos.' to '.$chunk+$strpos;
		
		$str = $str.base64_decode(substr($ha, $chrpos, $chrpos+$chunk));
		//echo $str;
		$chrpos += $chunk;
	
	}
	$contents = $str;
	
	
	//echo $contents;
	//$contents = $_POST['theimage'];
	//$contents = base64_decode(substr($contents,strpos($contents,",")+1));
}

 header("Cache-Control: public");
 header("Content-Description: File Transfer");
 header("Content-Disposition: attachment; filename=" . $file);
 header("Content-Type: " .  $mime);
 header("Content-Transfer-Encoding: binary");
echo $contents;
 //echo phpinfo();
 //echo print_r($_POST);
 /*if (!empty($_POST['content']) && is_array($_POST['content']))
{
    $content = '';
    foreach ($_POST['content'] as $part)
    {
        $content .= $part;
    }
    $content = base64_decode(substr($content,strpos($content,",")+1));
	//echo phpinfo();
}
 */
 //$contents = base64_decode(substr($_POST['content'],strpos($_POST['content'],",")+1));
//saves file to server only works with small files...?

//file_put_contents('wow.png', $content);
/*
define('DIR_PATH', '');
$fp = fopen(DIR_PATH . $file, 'wb');
fwrite($fp, $contents);
fclose($fp);
 */
?>