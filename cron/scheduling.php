<?php

$sUrl = "http://api.carwash.app/cron_api/scheduling";
$rCh = curl_init($sUrl); curl_setopt($rCh, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:11.0) Gecko Firefox/11.0");
curl_setopt($rCh, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($rCh, CURLOPT_NOBODY, 1);
curl_setopt($rCh, CURLOPT_CONNECTTIMEOUT, 0);
curl_setopt($rCh, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($rCh, CURLOPT_SSL_VERIFYHOST, false);
curl_exec($rCh); curl_close($rCh); 

?>