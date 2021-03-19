<?php

$url = 'https://rest.nexmo.com/sms/json?api_key=073e226c&api_secret=vdxzGxlYM7JGq2Nh&to=6288222668778&from="OURCITRUS"&text="Hello+Test+Sms+dari+puji"';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

echo "<pre>";
echo $response;
echo "</pre>";