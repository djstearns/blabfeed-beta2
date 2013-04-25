<?php
class GoogleChartHelper extends AppHelper {
    var $helpers = array('Html');

    var $apiUrl = 'https://chart.googleapis.com/chart';
    var $cacheDir = 'img/google_chart';

    function _getQueryString($queryParams) {
        return implode('&', $queryParams);
    }

    function _getBaseName($queryParams) {
        $queryString = $this->_getQueryString($queryParams);
        return md5($queryString);
    }

    function _getFullPath($queryParams){
        $baseName = $this->_getBaseName($queryParams);
        return IMAGES . $this->cacheDir . DS . $baseName;
    }

    function _imageExists($queryParams) {
        $fullPath = $this->_getFullPath($queryParams);
        return file_exists($fullPath);
    }

    function _cacheImage($queryParams) {
        App::import('Core', 'HttpSocket');
        $HttpSocket = new HttpSocket();
        $queryString = $this->_getQueryString($queryParams);
        $result = $HttpSocket->get($this->apiUrl, $queryString);

        $fullPath = $this->_getFullPath($queryParams);

        $fp = @fopen($fullPath.'.png', 'wb');
		
        @fwrite($fp, $result);
        return @fclose($fp);
    }

    /**
     * Requests for a generated image of a QR code from the Google Chart Tools API
     * @param array $options['chl'] Contains the string to be embedded in the QR code. See http://code.google.com/apis/chart/ for more parameters
     * @return string Markup displaying the QR code
     */
    function qr($options = array()){
        $str = '';

        $defaults = array(
            'chof' => 'png',
            'cht' => 'qr',
            'chs' => '150x150',
            'chl' => 'Hello world!',
            'choe' => 'UTF-8',
            'chld' => 'L|4'
        );

        $options = array_merge($defaults, $options);

        $queryParams = array();
        foreach ($options as $key => $value) {
            $queryParams[] = $key . '=' . urlencode($value);
        }
		
        if (!$this->_imageExists($queryParams)) {
			
            $this->_cacheImage($queryParams);
        }

		$url =  $this->cacheDir . DS . $this->_getBaseName($queryParams);
		//debug($url);
		//$str = $this->Html->image('http://'.$_SERVER['HTTP_HOST'] . $this->base . DS. $url);
       $str = 'http://'.$_SERVER['HTTP_HOST'] . $this->base . DS. 'img/'. $url.'.png';
		return $this->output($str);
    }
}
?>