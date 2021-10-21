<?php
include'include.php';
$random = rand(100000,999999);
$sonhap = $_GET[sonhap];
$random16 = rand(1,6);
$random162 = rand(1,6);
$random163 = rand(1,6);

$chuoi = "$random#$sonhap:$random16:$random162:$random163";

$md5chuoi = md5($chuoi);

$_SESSION["chuoi"] = $chuoi;
$_SESSION["md5chuoi"] = $md5chuoi;//người nhận


