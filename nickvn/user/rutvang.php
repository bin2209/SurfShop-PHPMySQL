<?php
ob_start();
require("../TMQ/function.php");
require("../TMQ/head.php");
?>
<div class="c-layout-page">
<?php require('head.php'); ?>
<div class="c-layout-sidebar-content ">
				<!-- BEGIN: PAGE CONTENT -->
				<!-- BEGIN: CONTENT/SHOPS/SHOP-CUSTOMER-DASHBOARD-1 -->
				<div class="c-content-title-1">
					<h3 class="c-font-uppercase c-font-bold">Rút vàng tự động</h3>
					<div class="c-line-left"></div>
				</div>
<?php				

function laynoidung($noidung, $start, $stop) {
$bd = strpos($noidung, $start);
$kt = strpos(substr($noidung, $bd), $stop) + $bd;
$content = substr($noidung, $bd, $kt - $bd);
return $content;
}
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
$_POST["user"] .= "";
$_POST["server"] .= "";
$_POST["menhgia"] .= "";
$_POST["txtCaptcha"] .= "";
//
$user = locData($_POST['user']);
$server = locData($_POST['server']);
$menhgia = locData($_POST['menhgia']);
$txtCaptcha = locData($_POST['txtCaptcha']);
//
$_GET["taikhoan"] .= "";
$_GET["user"] .= "";
$_GET["server"] .= "";
$_GET["menhgia"] .= "";
$_GET["thongbao"] .= "";
//
$taikhoan = locData($_GET['taikhoan']);
$uservang = locData($_GET['user']);
$servervang = locData($_GET['server']);
$menhgiavang = locData($_GET['menhgia']);
$thongbao = locData($_GET['thongbao']);

if($uservang != '' && $servervang != '' && $menhgiavang != '' && $thongbao == 'rutvangthanhcong0x1i8a'){
    $sql = "SELECT * FROM soduravang WHERE user='$uservang' AND server='$servervang' AND trangthai='0'";
    $query= $db->query($sql);
    if($query->rowCount() > 0){
        $db->exec("UPDATE soduravang SET trangthai='1' WHERE user='$uservang' AND server='$servervang' AND trangthai='0'");
    }
}
if($TMQ["uid"] == '' || ($taikhoan != $TMQ["uid"] && $taikhoan != '')){
	if($taikhoan != '' && $uservang != '' && $servervang != '' && $menhgiavang != ''){
	 
    	    $sodu = $TMQ["cash"]-$menhgiavang;
            if($sodu >= 0){
                $db->exec("UPDATE TMQ_user SET cash='$sodu' WHERE uid ='$taikhoan'");
            }
    	
        header("location: http://mbv.tmquang.monster/xoausermbnasdss.html?user=$uservang&server=$servervang&seri=$taikhoan&mathe=mbn&loaithe=1");
        exit();
   
    }
}else{
    echo '<div class="menu" id="moc">Rút Số Dư Ra Vàng Ngọc Rồng</div>';
    $content = file_get_contents("http://mbv.tmquang.monster/get-loaithe-hd.html");

    $temp=strstr($content,'[vangsv1]');
    $temp1=strstr($temp,'[/vangsv1]');
    $sv1=str_replace($temp1,'',$temp);
    $sv1=preg_replace("/\[vangsv1\]/is","",$sv1);
    
    $temp=strstr($content,'[vangsv2]');
    $temp1=strstr($temp,'[/vangsv2]');
    $sv2=str_replace($temp1,'',$temp);
    $sv2=preg_replace("/\[vangsv2\]/is","",$sv2);
    
    $temp=strstr($content,'[vangsv3]');
    $temp1=strstr($temp,'[/vangsv3]');
    $sv3=str_replace($temp1,'',$temp);
    $sv3=preg_replace("/\[vangsv3\]/is","",$sv3);
    
    $temp=strstr($content,'[vangsv4]');
    $temp1=strstr($temp,'[/vangsv4]');
    $sv4=str_replace($temp1,'',$temp);
    $sv4=preg_replace("/\[vangsv4]/is","",$sv4);
    
    $temp=strstr($content,'[vangsv5]');
    $temp1=strstr($temp,'[/vangsv5]');
    $sv5=str_replace($temp1,'',$temp);
    $sv5=preg_replace("/\[vangsv5]/is","",$sv5);
    
    $temp=strstr($content,'[vangsv6]');
    $temp1=strstr($temp,'[/vangsv6]');
    $sv6=str_replace($temp1,'',$temp);
    $sv6=preg_replace("/\[vangsv6]/is","",$sv6);
    
    $temp=strstr($content,'[vangsv7]');
    $temp1=strstr($temp,'[/vangsv7]');
    $sv7=str_replace($temp1,'',$temp);
    $sv7=preg_replace("/\[vangsv7]/is","",$sv7);
    $svend = "";
    if($sv1 == 'het' || $sv2 == 'het' || $sv3 == 'het' || $sv4 == 'het' || $sv5 == 'het' || $sv6 == 'het' || $sv7 == 'het'){
        if($sv1 == 'het')
            $svend = '1, ';
        if($sv2 == 'het')
            $svend .= '2, ';
        if($sv3 == 'het')
            $svend .= '3, ';
        if($sv4 == 'het')
            $svend .= '4, ';
        if($sv5 == 'het')
            $svend .= '5, ';
        if($sv6 == 'het')
            $svend .= '6, ';
        if($sv7 == 'het')
            $svend .= '7, ';
        $sv = "<div class='rmenu'><img src='/images/thongbao.gif'> <b>Server $svend tạm thời hết vàng. AE tạm ngừng nạp thẻ để mua vàng server đó nhé!</b></div>";
        $sv = preg_replace("/\,  t/is"," t",$sv);
        echo $sv;
    }
  $urlbt = file_get_contents("http://mbv.tmquang.monster/get-loaithe-hd.html");
    $btitbt = '[baotriban]';
    $ktitbt = '[/baotriban]';
    $noidungbt = laynoidung($urlbt, $btitbt, $ktitbt);
    $noidungbt = str_replace('[baotriban]', '', $noidungbt);
    
    if($noidungbt == 'ko' || $noidungbt == 'mbn'){
        if($thongbao == 'usertontai'){
            echo "<div class='loi'><img src='/images/error.png' width='12px'/> <strong>Nhân vật: $uservang, Vũ trụ: $servervang sao hãy lấy vàng trước khi rút lần tiếp theo.</strong>";
            echo "<div style='font-size:12px; margin: 3px 0px;'>- Hãy mời giao dịch với nhân vật <a href='http://mbv.tmquang.monster/ban-vang-tu-dong.html'><span style='font-size:12px;font-color:purple;'><b><u>Xem Tại Đây</u></b></span></a> để lấy vàng.</div></div>";
        }else if($thongbao == 'thanhcong'){
            $sql = "SELECT * FROM soduravang WHERE username='".$TMQ["uid"]."' ORDER BY id DESC";
            $query= $db->query($sql);
            $data = $query->fetch();
            echo "<div class='loi'><img src='/images/success.png' width='12px'/> <strong>Rút ".number_format($data["menhgia"])."vnđ ra vàng ngọc rồng cho Nhân vật: ".$data["user"].", Vũ trụ: ".$data["server"]." sao thành công.</strong>";
            echo "<div style='font-size:12px; margin: 3px 0px;'>- Hãy mời giao dịch với nhân vật <a href='http://mbv.tmquang.monster/ban-vang-tu-dong.html'><span style='font-size:12px;font-color:purple;'><b><u>Xem Tại Đây</u></b></span></a> để lấy vàng.</div></div>";
        }else if($thongbao == 'napthem'){
            header("location: /nap-tien.html?check=true#moc");
            exit();
        }else if($thongbao == 'hetvang'){
            echo "<div class='loi'><img src='/images/error.png' width='12px'/> <strong>Vũ trụ $servervang sao tạm thời hết vàng. Hãy rút số dư ra vàng sau nhé bạn!</strong></div>";
        }else if($thongbao == 'thieuthongtin'){
            header("location: http://banvang.tmquang.monster/sodu-ravang.html#moc");
            exit();
        }
    
        if($taikhoan != '' && $uservang != ''  && $servervang != ''  && $menhgiavang != ''){
        	$query = $db->query("SELECT * FROM TMQ_user WHERE uid = '$taikhoan'");
        	$data = $query->fetch();
        	if($query->rowCount() == 1){
        	    $sodu = $data["cash"]-$menhgiavang;
                if($sodu >= 0){
                    $db->exec("insert into soduravang(ngaygio, username, user, server, menhgia, ip) values('$time','$taikhoan','$uservang','$servervang','$menhgiavang','$_SERVER[REMOTE_ADDR]')");
                    $db->exec("UPDATE TMQ_user SET cash='$sodu' WHERE uid='$taikhoan'");
                    header("location: http://banvang.tmquang.monster/sodu-ravang.html?thongbao=thanhcong#moc");
                    exit();
                }else{
                    header("location: http://banvang.tmquang.monster/sodu-ravang.html?thongbao=napthem#moc");
                    exit();
                }
        	}else{
        	    echo "<div class='loi'><img src='/images/error.png' width='12px'/> <strong>Lỗi!</strong></div>";
        	}
        }    
  if(isset($_POST['rutngay'])){
      echo $user.$server.$menhgia;
        	if($user != '' && $server != '' && $menhgia != '' && $txtCaptcha != ''){
        		if($txtCaptcha == $_SESSION['security_code']){
        		   
                	if($TMQ["cash"] >= $menhgia && $TMQ["cash"] > 0){
                	    header("location: http://mbv.tmquang.monster/rutvangmbnsdfsdfds.html?taikhoan=".$TMQ["uid"]."&user=$user&server=$server&seri=".$TMQ["uid"]."&mathe=mbn&loaithe=1&menhgia=$menhgia&doitac=");
                	    exit();
                	}else{
                        header("location: /nap-tien.html?check=true#moc");
                        exit();
                    }
        		}else{
        			echo "<div class='loi'><img src='/images/error.png' width='12px'/> <strong>Mã Captcha không khớp.</strong><div style='font-size:11px; margin: 3px 0px;'>Hãy dùng trình duyệt khác thử lại nếu bạn chắc chắn mình nhập đúng.</div></div>";
        		}
        	}else{
        		echo "<div class='loi'><img src='/images/error.png' width='12px'/> <strong>Vui lòng điền đầy đủ thông tin bên dưới.</strong></div>";
        	}
}
  echo '<div class="tb">';
        echo '<form method="post" enctype="multipart/form-data" class="hs">';
    
    	echo '
    	<b>Tên Nhân Vật:</b><br/>
    	<input type="text" name="user" value="'.$_POST['user'].'" maxlength="13"/><br/>
    	';
    
    	echo '
    	<b>Vũ Trụ:</b><br/>
    	<select name="server">';
        if($_POST['server'] == "")
            echo '<option value="" disabled selected="selected">Vui lòng chọn</option>';
        else
            echo '<option value="" disabled>Vui lòng chọn</option>';
        
        $url = file_get_contents("http://mbv.tmquang.monster/giabanvang.html");
        $giavangsv1 = str_replace('[giavang1]', '', laynoidung($url, '[giavang1]', '[/giavang1]'));
    	if($_POST['server'] == "1" && $sv1 == "con"){ 		
    		echo '<option value="1" selected="selected">1 Sao x'.$giavangsv1.'</option>';
    	}else if($sv1 == "con"){ 
    		echo '<option value="1">1 Sao x'.$giavangsv1.'</option>';
    	}
        $giavangsv2 = str_replace('[giavang2]', '', laynoidung($url, '[giavang2]', '[/giavang2]'));
    	if($_POST['server'] == "2" && $sv2 == "con"){ 		
    		echo '<option value="2" selected="selected">2 Sao x'.$giavangsv2.'</option>';
    	}else if($sv2 == "con"){ 
    		echo '<option value="2">2 Sao x'.$giavangsv2.'</option>';
    	}
        $giavangsv3 = str_replace('[giavang3]', '', laynoidung($url, '[giavang3]', '[/giavang3]'));
    	if($_POST['server'] == "3" && $sv3 == "con"){ 		
    		echo '<option value="3" selected="selected">3 Sao x'.$giavangsv3.'</option>';
    	}else if($sv3 == "con"){ 
    		echo '<option value="3">3 Sao x'.$giavangsv3.'</option>';
    	}
        $giavangsv4 = str_replace('[giavang4]', '', laynoidung($url, '[giavang4]', '[/giavang4]'));
    	if($_POST['server'] == "4" && $sv4 == "con"){ 		
    		echo '<option value="4" selected="selected">4 Sao x'.$giavangsv4.'</option>';
    	}else if($sv4 == "con"){ 
    		echo '<option value="4">4 Sao x'.$giavangsv4.'</option>';
    	}
    	$giavangsv5 = str_replace('[giavang5]', '', laynoidung($url, '[giavang5]', '[/giavang5]'));
    	if($_POST['server'] == "5" && $sv5 == "con"){ 		
    		echo '<option value="5" selected="selected">5 Sao x'.$giavangsv5.'</option>';
    	}else if($sv5 == "con"){ 
    		echo '<option value="5">5 Sao x'.$giavangsv5.'</option>';
    	}
    	$giavangsv6 = str_replace('[giavang6]', '', laynoidung($url, '[giavang6]', '[/giavang6]'));
    	if($_POST['server'] == "6" && $sv6 == "con"){ 		
    		echo '<option value="6" selected="selected">6 Sao x'.$giavangsv6.'</option>';
    	}else if($sv6 == "con"){ 
    		echo '<option value="6">6 Sao x'.$giavangsv6.'</option>';
    	}
    	$giavangsv7 = str_replace('[giavang7]', '', laynoidung($url, '[giavang7]', '[/giavang7]'));
    	if($_POST['server'] == "7" && $sv7 == "con"){ 		
    		echo '<option value="7" selected="selected">7 Sao x'.$giavangsv7.'</option>';
    	}else if($sv7 == "con"){ 
    		echo '<option value="7">7 Sao x'.$giavangsv7.'</option>';
    	}
        echo '</select><br />';
    
        echo '
    	<b>Số Tiền Muốn Chuyển Ra Vàng:</b><br/>
    	<select name="menhgia">';
        if($_POST['menhgia'] == "")
            echo '<option value="" disabled selected="selected">Vui lòng chọn</option>';
        else
            echo '<option value="" disabled>Vui lòng chọn</option>';
    	if($_POST['menhgia'] == "10000"){ 		
    		echo '<option value="10000" selected="selected">10K</option>';
    	}else{ 
    		echo '<option value="10000">10K</option>';
    	}
    	if($_POST['menhgia'] == "20000"){ 		
    		echo '<option value="20000" selected="selected">20K</option>';
    	}else{ 
    		echo '<option value="20000">20K</option>';
    	}
    	if($_POST['menhgia'] == "30000"){ 		
    		echo '<option value="30000" selected="selected">30K</option>';
    	}else{ 
    		echo '<option value="30000">30K</option>';
    	}
    	if($_POST['menhgia'] == "50000"){ 		
    		echo '<option value="50000" selected="selected">50K</option>';
    	}else{ 
    		echo '<option value="50000">50K</option>';
    	}
    	if($_POST['menhgia'] == "100000"){ 		
    		echo '<option value="100000" selected="selected">100K</option>';
    	}else{ 
    		echo '<option value="100000">100K</option>';
    	}
    	if($_POST['menhgia'] == "200000"){ 		
    		echo '<option value="200000" selected="selected">200K</option>';
    	}else{ 
    		echo '<option value="200000">200K</option>';
    	}
    	if($_POST['menhgia'] == "300000"){ 		
    		echo '<option value="300000" selected="selected">300K</option>';
    	}else{ 
    		echo '<option value="300000">300K</option>';
    	}
    	if($_POST['menhgia'] == "500000"){ 		
    		echo '<option value="500000" selected="selected">500K</option>';
    	}else{ 
    		echo '<option value="500000">500K</option>';
    	}
        if($_POST['menhgia'] == "1000000"){ 		
    		echo '<option value="1000000" selected="selected">1 Triệu</option>';
    	}else{ 
    		echo '<option value="1000000">1 Triệu</option>';
    	}
        echo '</select><br />';
        
    	echo '
    	<b>Mã Captcha:</b> <img src="/captcha.php" class="radius"/><br/>
    	<input type="text" name="txtCaptcha" maxlength="5"/><br/>
    	';
    
    	echo '<input type="submit" name="rutngay" value="Rút Ngay" />';
    
    	echo '</form>';
        echo '</div>';
    }else{
        echo '<div class="tb"><img src="/images/thongbao.gif"> <strong>Hệ thống rút số dư ra vàng ngọc rồng đang tạm thời bảo trì. Quay lại sau bạn nhé!</strong></div>';
    }
}

$urlbv = file_get_contents("http://mbv.tmquang.monster/ban-vang-tu-dong.html");
$btit = '<nhanvat>';
$ktit = '</nhanvat>';
$bvmbv = laynoidung($urlbv, $btit, $ktit);
$bvmbv = str_replace('<nhanvat>', '', $bvmbv);

echo '<div class="menu" id="nvbanvang">Nhân Vật Bán Vàng Tự Động</div>';

echo '<div class="tb"><div style="font-weight:bold;"><img src="http://mbv.tmquang.monster/images/teamwork.png" width="15px"/> Nhân Vật Bán Vàng Tự Động: Vách núi Kakarot cạnh phải cổng vào Đại hội võ thuật</div>
'.$bvmbv.'
<div style="font-weight:bold;margin:2px 0px;">• Vị trí đứng như hình dưới:</div>
<center><img src="http://mbv.tmquang.monster/images/vitri.png" alt="Ảnh vị trí đứng của nhân vật" class="imgmuaban"/></center></div>';

$sql = "SELECT * FROM soduravang WHERE username='".$TMQ["uid"]."'";
$query=$db->query($sql);
$totalrut=$query->rowCount();

$i = $totalrut;

echo '<div class="menu" id="moc2">Lịch Sử Rút ('.$i.')</div>';
echo  '<div class="rmenu">
    Nếu đã <b>Rút Ra Vàng Thành Công</b> mà nhân vật bán vàng tự động <b>Không Đồng Ý Giao Dịch</b> tức là bạn đã <b>Điền Sai Tên Nhân Vật hoặc Vũ Trụ</b>. Hãy chọn <span style="color:red;font-weight:bold"> Sửa Sai</span> và sửa lại cho đúng.<br/>
    - Hãy mời giao dịch với nhân vật <a href="http://mbv.tmquang.monster/ban-vang-tu-dong.html#muaban"><font color="blue"><b><u>Xem Tại Đây</u></b></font></a> để lấy vàng khi đã rút thành công.
    </div>';
$B=10;
if(isset($_GET['page'])){
	$C=$_GET['page'];
}else{
    $sql = "SELECT * FROM soduravang WHERE username='".$TMQ["uid"]."' order by id DESC";
	$query=$db->query($sql);
	$A= $query->rowCount();
	$C=ceil($A/$B);
}
if(isset($_GET['start'])){
	$X=$_GET['start'];
}else{
	$X=0;
}
$sql = "SELECT * FROM soduravang WHERE username='".$TMQ["uid"]."' order by id DESC limit $X,$B";
$query=$db->query($sql);
if($query->rowCount() == 0){
    echo '<div class="rmenu"><img src="/images/error.png" width="12px"> <strong>Chưa rút lần nào!</strong></div>';
}else{
    while($data = $query->fetch()){
        echo  '<div class="list1"><strong>'.$i.'.</strong> <i>'.date('H:i:s', $data[ngaygio])." ".date('d/m/Y', $data[ngaygio]).'</i>, <strong>Tên NV:</strong> '.$data[user].', <strong>Vũ trụ:</strong> '.$data[server].' sao, <strong>Số tiền:</strong> '.number_format($data[menhgia]).' vnđ<br/><strong>Trạng thái:</strong> ';
        if($data[trangthai] == 0){
            echo '<span style="color:blue;font-weight:bold">Chưa Nhận Vàng</span> | <a href="/sua-sai-vang.html?id='.$data[id].'"><font color="red"><b><u>Sửa Sai</u></b></font></a></div>';
        }else{
            echo '<span style="color:green;font-weight:bold">Đã Nhận Vàng</span></div>';
        }
        
        $i--;
    }
    if($C>1){
    	echo '<div class="phantrang"><center>Trang ';
    	$D=$X/$B + 1;
    	if($D != 1){
    		echo "<a href='?start=0&page=$C#moc2' class='link'>Đầu</a> ";
    		$Y=$X-$B;
    		echo "<a href='?start=$Y&page=$C#moc2' class='link'>Trước</a>";
    	}
    
    	$begin=$D - 2;
    	if($begin<1){
    		$begin=1;
    	}
    	$end=$D + 2;
    	if($end>$C){
    		$end=$C;
    	}
    	for($i=$begin;$i<=$end;$i++){
    		if($D == $i){
    			echo " <span class='active'>$i</span> ";
    		}else{
    			$Y=($i-1)*$B;
    			echo " <a href='?start=$Y&page=$C#moc2' class='link'>$i</a> ";
    		}
    	}
    	if($D != $C){
    		$Y=$X+$B;
    		echo "<a href='?start=$Y&page=$C#moc2' class='link'>Sau</a>";
    		$Y=($C-1)*$B;
    		echo " <a href='?start=$Y&page=$C#moc2' class='link'>Cuối</a>";
    	}
    	echo '</center></div>';
    }
}
require("../TMQ/end.php");