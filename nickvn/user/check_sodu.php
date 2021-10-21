<?php
require("../TMQ/function.php");
function locData($data){
	$text = html_entity_decode(trim(strip_tags($data)), ENT_QUOTES, 'UTF-8');
	$text=str_replace(" ","", $text);
	$text=str_replace("@","",$text);
	$text=str_replace("/","",$text);
	$text=str_replace("{","",$text);
	$text=str_replace("}","",$text);
	$text=str_replace("\\","",$text);
	$text=str_replace(":","",$text);
	$text=str_replace("\"","",$text);
	$text=str_replace("'","",$text);
	$text=str_replace("<","",$text);
	$text=str_replace(">","",$text);
	$text=str_replace("?","",$text);
	$text=str_replace(";","",$text);
	$text=str_replace(".","",$text);
	$text=str_replace(",","",$text);
	$text=str_replace("[","",$text);
	$text=str_replace("]","",$text);
	$text=str_replace("(","",$text);
	$text=str_replace(")","",$text);
	$text=str_replace("*","",$text);
	$text=str_replace("!","",$text);
	$text=str_replace("$","",$text);
	$text=str_replace("&","",$text);
	$text=str_replace("%","",$text);
	$text=str_replace("#","",$text);
	$text=str_replace("^","",$text);
	$text=str_replace("=","",$text);
	$text=str_replace("+","",$text);
	$text=str_replace("~","",$text);
	$text=str_replace("`","",$text);
	$text=str_replace("-","",$text);
	$text=str_replace("|","",$text);
	$text = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $text);
	$text = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $text);

	$text = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $text);

	$text = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $text);

	$text = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $text);
	$text = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $text);

	$text = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $text);
	$text = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $text);

	$text = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $text);
	$text = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $text);

	$text = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $text);
	$text = preg_replace("/(đ)/", 'd', $text);
	$text = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $text);
	$text = preg_replace("/(đ)/", 'd', $text);

	$text = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $text);
	$text = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $text);

	$text = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $text);
	$text = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $text);

	$text = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $text);
	$text = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $text);

	$text = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $text);
	$text = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $text);

	$text = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $text);
	$text = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $text);

	$text = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $text);
	$text = preg_replace("/(Đ)/", 'D', $text);

	$text = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $text);
	$text = preg_replace("/(Đ)/", 'D', $text);

	$text=strtolower($text);
	return $text;
}

$checksodu = locData($_GET['checksodu']);
$taikhoan = locData($_GET['taikhoan']);

if($checksodu == 'true'){
    $data = $db->query("SELECT * FROM TMQ_user WHERE uid='$taikhoan'")->fetch();
    if($data["id"] != null){
        echo '<span style="display: none;">[sodu]'.$data["cash"].'[/sodu]</span>';
    }else{
        echo '<span style="display: none;">[sodu]0[/sodu]</span>';
}}
?> 