<?php
$xmlfile = './baidusitemap.xml';
$xml = simplexml_load_file($xmlfile);
$locs = [];
foreach ($xml->url as $child) {
  array_push($locs,$child->loc->__toString());
}
$api = 'http://data.zz.baidu.com/urls?site=www.laev.club&token=Q1kGGTUzo1gBzmfL';
$ch = curl_init();
$options =  array(
    CURLOPT_URL => $api,
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => implode("\n", $locs),
    CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
);
curl_setopt_array($ch, $options);
$result = curl_exec($ch);
//echo $result;
print_r($result);
?>