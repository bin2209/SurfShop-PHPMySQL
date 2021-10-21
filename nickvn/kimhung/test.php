<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://nick.vn/login');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "_token=1O6fKzum22DUnYotttygMzsq7CrUES4FIW6NiFOS&username=hungproh5n&password=d%E1%BA%A5dasa");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Authority: nick.vn';
$headers[] = 'Cache-Control: max-age=0';
$headers[] = 'Origin: https://nick.vn';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'Dnt: 1';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.62 Safari/537.36';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8';
$headers[] = 'Referer: https://nick.vn/login';
$headers[] = 'Accept-Encoding: gzip, deflate, br';
$headers[] = 'Accept-Language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5';
$headers[] = 'Cookie: __cfduid=d152287df19738278c75040057e7986d11594363093; noticeModal=1; XSRF-TOKEN=eyJpdiI6IkxvTTJ0aGpTUTBrNjNKUDEzdWVINXc9PSIsInZhbHVlIjoiY0FFMSt5cmt5ek1VajZVRklnWGlMYThCS2dFMWRrOEt3ZDVJWHhwMWl1Zkl6T0ExN2pmdHBMUWN5bmRvN2dDOSIsIm1hYyI6ImQ5MmRlY2RmYmU5NjIxZjA3NmViZWM0YWI3ZDk1NTBkMmFjZTA2N2U4OWE2MWQ1OTQzNzIyYTdiMTZjMGVhY2YifQ%3D%3D; nickvn_session=eyJpdiI6IllreFhVcWRyNXRrVVwvdzdhNGpoYUFRPT0iLCJ2YWx1ZSI6IktkRWJsajlGZHNIaFM1azRpUitCSkZjbndXbzJ5QnBwOEFCSEhUVHBWVXIrME1TS2REZ0U0Mm90OWlub243dHMiLCJtYWMiOiI5MDZhYzI3NzI1NjA3NjgxZjNkZDFlMTg2ZWZkZjJkYzc4MjZjNTA4OGE1YzMwNTUwZmI0OGUzODNlYzdhN2JlIn0%3D';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);