<?php
include'include.php';
$random2 = rand(100000,999999);
$sonhap2 = $_GET[sonhap];
$random162 = rand(1,6);
$random1622 = rand(1,6);
$random1632 = rand(1,6);

$chuoi2 = "$random2#$sonhap2:$random162:$random1622:$random1632";

$md5chuoi2 = md5($chuoi2);

$_SESSION["chuoi2"] = $chuoi2;
$_SESSION["md5chuoi2"] = $md5chuoi2;//người nhận

