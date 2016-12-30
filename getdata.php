<?php
/**
 * Created by PhpStorm.
 * User: mycapital
 * Date: 2016/12/16
 * Time: 15:06
 */

require __DIR__ . '/vendor/autoload.php';

use Curl\Curl;

$curl = new Curl();
$curl->get('http://gaotie.huochepiao.com/gaotiezhan/');

$response = $curl->response;
if(! mb_check_encoding($response, 'utf-8')) {
    $response = mb_convert_encoding($response,'UTF-8','gbk');
}

use Sunra\PhpSimple\HtmlDomParser;
$dom = HtmlDomParser::str_get_html($response);
$origin_stations = $dom->find(".STYLE3");
foreach ($origin_stations as $l_station){
    $url = $l_station->attr['href'];
    $station = implode("",$l_station->nodes[0]->_);
    $j = 0;
}
