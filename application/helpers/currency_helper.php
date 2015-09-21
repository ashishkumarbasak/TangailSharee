<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function currency_old($from_Currency,$to_Currency,$amount) {
    $amount = urlencode($amount);
    $from_Currency = urlencode($from_Currency);
    $to_Currency = urlencode($to_Currency);
    echo $url = "http://www.google.com/ig/calculator?hl=en&q=$amount$from_Currency=?$to_Currency";
    $ch = curl_init();
    $timeout = 0;
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch,  CURLOPT_USERAGENT , "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $rawdata = curl_exec($ch);
    curl_close($ch);
    $data = explode('"', $rawdata);
    $data = explode(' ', $data['3']);
    $var = $data['0'];
    return ceil(round($var,2));
}

function currency($from_currency,$to_currency,$amount) {
	($results = convertCurrency($from_currency,$to_currency,$amount));
	$regularExpression= '#\<span class=bld\>(.+?)\<\/span\>#s';
	preg_match($regularExpression, $results, $finalData);
	if(array_key_exists(1, $finalData)){
		$finalData[1] = str_replace(strtoupper($to_currency),"", $finalData[1]);
		$finalData[1] = str_replace(" ","",$finalData[1]);
		return ceil($finalData[1]);
	}else{
		return $amount;
	}
}

function convertCurrency($from,$to,$amount) {
	$url = "http://www.google.com/finance/converter?a=$amount&from=$from&to=$to";
	$request = curl_init();
	$timeOut = 0;
	curl_setopt ($request, CURLOPT_URL, $url);
	curl_setopt ($request, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($request, CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
	curl_setopt ($request, CURLOPT_CONNECTTIMEOUT, $timeOut);
	$response = curl_exec($request);
	curl_close($request);
	return $response;
}

?>
