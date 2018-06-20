<?php

	function postBaidu($url){
        $api = 'http://data.zz.baidu.com/urls?site=www.bilulanlv.com&token=6dQCh27Rfi9qCAP8';
        $ch = curl_init();
        $options =  array(
            CURLOPT_URL => $api,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => $url,
            CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
        );
        curl_setopt_array($ch, $options);
        $result = curl_exec($ch);
      	return $result;
    }
