<?php

$mysqli = new mysqli("localhost","iapvanlongtk_kimhung365","iapvanlongtk_kimhung365","iapvanlongtk_kimhung365");
$mysqli -> set_charset("utf8");
ob_start('ob_gzhandler');
date_default_timezone_set('Asia/Ho_Chi_Minh');


$cookie = 'sb=mjQcX4xGo70nhj8hqMJCzW4j; datr=mjQcX4cWFbh-8Yj2mzrcMf5E; locale=vi_VN; c_user=100027893116616; xs=46%3A636DNqLNFzxopg%3A2%3A1595685853%3A9563%3A6177; fr=16AuSDbRoPSKllSzp.AWUXqUyrtioBh_ulQp0l1u1BTjg.BfHDSa.LZ.AAA.0.0.BfHDvd.AWXTBRd8; spin=r.1002419886_b.trunk_t.1595685855_s.1_v.2_; act=1595687998515%2F2; wd=1365x974; presence=EDvF3EtimeF1595688094EuserFA21B27893116616A2EstateFDt3F_5bDiFA2user_3a1B29721840454A2ErF1EoF1EfF5CAcDiFA2user_3a1B43554519358A2EoF2EfF3C_5dElm3FA2user_3a1B29721840454A2Eutc3F1595687998318G595687998605CEchF_7bCC'; /// nhập cookie của bạn.
if(isset($_GET[save])) {
    $code =$_POST[msg];
       $data0 =$mysqli->query("SELECT * FROM bot WHERE `msg` = '".$code."'  ")->fetch_assoc();
if(!$data0) {
      $mysqli->query("INSERT INTO `bot` SET  `msg` ='".$_POST[msg]."',`text` = '".$_POST[text]."' ");
      echo '<code>Thêm thành công</code>';
} else {
    echo'<code>Thêm thất bại, đã tồn tại câu này rùi</code>';
}
    return false;
}
//////HTML/////
if(isset($_GET[add])) {
    echo'<!DOCTYPE html><html><head><title>BOT REPLLY</title><style>* {box-sizing: border-box;}input[type=text], select, textarea {width: 100%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;resize: vertical;}label {padding: 12px 12px 12px 0;display: inline-block;}input[type=submit] {background-color: #4CAF50;color: white;padding: 12px 20px;border: none;border-radius: 4px;cursor: pointer;float: right;}input[type=submit]:hover {background-color: #45a049;}.container {border-radius: 5px;background-color: #f2f2f2;padding: 20px;}.col-25 {float: left;width: 25%;margin-top: 6px;}.col-75 {float: left;width: 75%;margin-top: 6px;}.row:after {content: "";display: table;clear: both;}@media screen and (max-width: 600px) {.col-25, .col-75,input[type=submit] {width: 100%;margin-top: 0;}}</style><script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script></head><body><h2>Thêm câu trả lời cho BOT</h2><p>Vui lòng thêm câu hỏi có văn hóa, lịch sự lễ phép.</p><div class="container"><div> <div class="row"><div class="col-25"><label for="subject">Câu hỏi</label></div><div class="col-75"><textarea id="msg" name="msg" placeholder="Vd: bạn ăn cơm chưa ?" style="height:200px"></textarea></div></div><div class="row"><div class="col-25"> <label for="subject">Câu trả lời</label></div><div class="col-75"><textarea id="text" name="text" placeholder="Vd: Ăn cái lon dcmm" style="height:200px"></textarea></div></div><div class="row"><button onclick="save()">Lưu lại</button></div><div id="result">Văn hóa tí nhá :v @1 - để get ng dùng</div></div></div></body></html>';
?><script>function save() {$.ajax({url : '?save',type : 'POST',data : {msg : $('#msg').val(), text : $('#text').val() },success : function(result){$('#result').html(result);}});$('#text').val('');$('#msg').val('');}</script><?PHP
return false;
}


///////////

$url = curl("https://mbasic.facebook.com/messages/?folder=unread&refid=11",$cookie);
$get = explode('<table class="bp bq br bs bt bu bv bw bx">',$url);
if(count($get)) { // check sms ///
foreach($get as $value)
{
$data1=explode('<table class="bp bq br bs bt bu bv bw bx">',$value);
$get2 = explode('</table>',$data1[0]);
$code = $get2[2];
preg_match('#<a href="(.+?)">#s',$code,$data_id);
$id = explode("&",explode('tid=',$data_id[1])[1])[0];
if(explode(".",$id)[1] == "c") {
preg_match('#">(.+?)</span>#s',$code,$check);

foreach(explode('<span class=',$check[1]) as $st=>$data)
{
    if($st ==1) {
 $noidung= explode(">",$data)[1];
 
    }
}

$getlink = curl('https://mbasic.facebook.com/messages/read/?tid='.$id.'&refid=11#fua',$cookie);
$ten = explode("</span>",explode('<span class="bk">',$getlink)[1])[0];

$form = explode("</form>",explode('<form method="post"',$getlink)[1])[0];
$fb_dtsg = explode('"', explode('type="hidden" name="fb_dtsg" value="', $form)[1])[0];
$jazoest = explode('"', explode('type="hidden" name="jazoest" value="', $form)[1])[0];
$tids = explode('"', explode('type="hidden" name="tids" value="', $form)[1])[0];
$wwwupp = explode('"', explode('type="hidden" name="wwwupp" value="', $form)[1])[0];
$referrer = explode('"', explode('type="hidden" name="referrer" value="', $form)[1])[0];
$ctype = explode('"', explode('type="hidden" name="ctype" value="', $form)[1])[0];
$cver = explode('"', explode('type="hidden" name="cver" value="', $form)[1])[0];
$csid = explode('"', explode('type="hidden" name="csid" value="', $form)[1])[0];
$send = 'Gửi';
if($noidung == "hotro" or $noidung =="HOTRO" or $noidung =="Hotro" or $noidung == "HoTro") {
        $body = 'Xin chào anh/chị. Mình là BOT Chát được cài đặt bởi Hùng Kay. Rất vui được chát giao lưu với bạn. Bạn có bất kì câu hỏi gì, hoặc muốn trò chuyện nhắn tin với mình thì cứ nhắn lại xuống dưới nhé.
          Yêu bạn.';
    }
    elseif($noidung == ''){
        $body='Cú Pháp Tin Nhắn Không Hợp Lệ. Để Biết Thêm Chi Tiết Cậu Hãy Chat HOTRO Để Xem Thêm Nha.';
    }
    else {
    $bot = $mysqli->query("SELECT * FROM `bot` WHERE `msg` like '%$noidung%'")->fetch_assoc();
    if($bot[id] <=0) {
        $body = 'BOT Hùng : Huhu, Hùng chưa dạy tớ câu hỏi này. Để biết thêm chi tiết cậu hãy chát HOTRO để xem thêm nha.';
    } else {
        $body = $bot[text];
    }
    }
    $mysqli->query("INSERT INTO `lichsu` SET  `tenho` ='".$ten."',`tenban` = '".$noidung."' ");

    $uid = explode(']', explode('type="hidden" name="ids[', $form)[1])[0];
    $body = str_replace('@', $ten  ,$body);
echo post_data('https://mbasic.facebook.com/messages/send/?icm=1&refid=12','fb_dtsg='.$fb_dtsg.'&jazoest='.$jazoest.'&body='.$body.'&send='.$send.'&tids='.$tids.'&wwwupp='.$wwwupp.'&ids['.$uid.']='.$uid.'&referrer='.$referrer.'&ctype='.$ctype.'&cver='.$cver.'&csid='.$csid.'',$cookie);
}

}
}
function curl($url,$cookie)
{
    $ch = @curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    $head[] = "Connection: keep-alive";
    $head[] = "Keep-Alive: 300";
    $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
    $head[] = "Accept-Language: en-us,en;q=0.5";
    curl_setopt($ch, CURLOPT_USERAGENT, 'Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14');
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Expect:'
    ));
    $page = curl_exec($ch);
    curl_close($ch);
    return $page;
} 

function post_data($site,$data,$cookie){
    $datapost = curl_init();
    $headers = array("Expect:");
    curl_setopt($datapost, CURLOPT_URL, $site);
    curl_setopt($datapost, CURLOPT_TIMEOUT, 40000);
    curl_setopt($datapost, CURLOPT_HEADER, TRUE);
    curl_setopt($datapost, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($datapost, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36');
    curl_setopt($datapost, CURLOPT_POST, TRUE);
    curl_setopt($datapost, CURLOPT_POSTFIELDS, $data);
    curl_setopt($datapost, CURLOPT_COOKIE,$cookie);
    ob_start();
    return curl_exec ($datapost);
    ob_end_clean();
    curl_close ($datapost);
    unset($datapost); 
}  
    






?>