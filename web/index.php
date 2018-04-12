<?php


function getUrlContent($url){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt($ch, CURLOPT_TIMEOUT, 5);
  $data = curl_exec($ch);
  $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);
  return ($httpcode>=200 && $httpcode<300) ? $data : false;
}

echo "hello world<br/>";
printf("golang1 says: %s<br/>\n", getUrlContent("http://golang1"));
printf("golang2 says: %s<br/>\n", getUrlContent("http://golang2"));
$es=json_decode(getUrlContent("http://elasticsearch:9200/_cluster/health"), true);
printf("Elasticsearch number of nodes: %s<br/>\n", $es['number_of_nodes']);
?>
