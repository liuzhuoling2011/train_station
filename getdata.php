<?php
/**
 * Created by PhpStorm.
 * User: mycapital
 * Date: 2016/12/16
 * Time: 15:06
 */

require __DIR__ . '/vendor/autoload.php';
use Curl\Curl;

function get_dom($response){
    if(! mb_check_encoding($response, 'utf-8')) {
        $response = mb_convert_encoding($response,'UTF-8','gbk');
    }
    $dom = Sunra\PhpSimple\HtmlDomParser::str_get_html($response);
    return $dom;
}

$curl = new Curl();
$curl->get('http://gaotie.huochepiao.com/gaotiezhan/');

$dom = get_dom($curl->response);
$origin_stations = $dom->find(".STYLE3");
foreach ($origin_stations as $l_station){
    $url = "http://gaotie.huochepiao.com".$l_station->attr['href'];
    $station = implode("",$l_station->nodes[0]->_);
    $STATION[] = array("url"=>$url, "station"=>$station);
    $curl->get($url);
    $l_dom = get_dom($curl->response);
    $table = $l_dom->find("table");
    $j = 0;
}
