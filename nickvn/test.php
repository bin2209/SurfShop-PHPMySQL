<?php
$phanqua = array('89' => '100', '111' => '0', '250' => '0', '500' => '0', '3000' => '0', '5000' => '0', '12000' => '0', '25000' => '0');

$mangphanqua = array();
foreach ($phanqua as $phanqua=>$value)
{
    $mangphanqua = array_merge($mangphanqua, array_fill(0, $value, $phanqua));
}

$kc = $mangphanqua[array_rand($mangphanqua)];
echo $kc;