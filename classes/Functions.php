<?php
//set default guest
 // GUEST MODE 


 if (!isset($_SESSION['ipv4'])){
    $_SESSION['login'] = false;
    $_SESSION['ipv4'] = getIPAddress();
    $_SESSION['avatar'] = '../assets/img/default-user.png';
 }

function getIPAddress(){  
    // Chỉ được dùng 1 lần trong quá trình tạo lập GUEST | $_SESSION['ipv4']
    // Tạo nhiều lần sẽ tạo thành nhiều IP khác nhau
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
    // return '42.116.105.112, 172.70.142.124';
}  



function get_item_bag($email,$conn){
    $stmt = $conn->prepare("SELECT email, item_id FROM bag WHERE email=?");
    $stmt->execute([$email]);
    if ($stmt->rowCount() === 1) {
        $bag =	$stmt->fetch();
        $bag_item = $bag['item_id'];
        if ($bag['item_id']==''){
            return '0';
        }
    }else{
        return '0';
    }
    $array_bag_item = explode(',',$bag_item);
    return count($array_bag_item);
}



// Hàm điều hướng trang
class Redirect {
    public function __construct($url = null) {
        if ($url)
        {
            echo '<script>location.href="'.$url.'";</script>';
        }
    }
}

// Hàm| Chỉnh sửa giá thêm dấu chấm -> string
function s_PriceFormat($price){
    return number_format($price);
}

function time_stamp($time){
    $periods = array("giây", "phút", "giờ", "ngày", "tuần", "tháng", "năm", "thập kỉ");
    $lengths = array("60","60","24","7","4.35","12","10");
    $now = time();
    $difference = $now - $time;
    $tense = "trước";
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
       $difference /= $lengths[$j];
    }
   $difference = round($difference);
   return "Cách đây $difference $periods[$j]";
}

//bọc dữ liệu 
function nht_boc($var){
$dulieu = htmlentities(strip_tags($var), ENT_QUOTES, 'UTF-8');
return $dulieu;    
}

// func time ago
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'năm',
        'm' => 'tháng',
        'w' => 'tuần',
        'd' => 'ngày',
        'h' => 'giờ',
        'i' => 'phút',
        's' => 'giây',
    );
    
    
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' trước' : 'vừa xong';
}
// time left

function time_left($from, $to = '') {
if (empty($to))
$to = time();
$diff = (int) abs($to - $from);
if ($diff <= 60) {
$since = sprintf('Còn vài giây');
} elseif ($diff <= 3600) {
$mins = round($diff / 60);
if ($mins <= 1) {
$mins = 1;
}
/* translators: min=minute */
$since = sprintf('Còn %s phút', $mins);
} else if (($diff <= 86400) && ($diff > 3600)) {
$hours = round($diff / 3600);
if ($hours <= 1) {
$hours = 1;
}
$since = sprintf('Còn %s giờ', $hours);
} elseif ($diff >= 86400) {
$days = round($diff / 86400);
if ($days <= 1) {
$days = 1;
}
$since = sprintf('Còn %s ngày', $days);
}
return $since;
}

function auto_get($url){
    $data = curl_init();
    curl_setopt($data, CURLOPT_HEADER, false);
    curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($data, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($data, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($data, CURLOPT_CONNECTTIMEOUT, 3);
    curl_setopt($data, CURLOPT_TIMEOUT, 3);
    curl_setopt($data, CURLOPT_HTTPHEADER, array('Accept: application/json'));
    curl_setopt($data, CURLOPT_URL, $url);
    $res = curl_exec($data);
    curl_close($data);
    return $res;
}

function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }

    return false;
}
function text($string, $separator = ', '){
    $vals = explode($separator, $string);
    foreach($vals as $key => $val) {
        $vals[$key] = strtolower(trim($val));
    }
    return array_diff($vals, array(""));
}

// Chống xss
class Anti_xss {
      public function clean_up($text) {
      return htmlentities(strip_tags($text), ENT_QUOTES, 'UTF-8');
      }
} 

// Truyền vào
class Input {
    public function input_get($key) {
	return isset($_GET[$key]) ? $_GET[$key] : false; 
    }
    public function input_post($key) {
	return isset($_POST[$key]) ? $_POST[$key] : false; 
    }

}


// lấy thông tin rank và khung 
class Info {

        public function nice_number($n) {
            // first strip any formatting;
            $n = (0+str_replace(",", "", $n));
    
            // is this a number?
            if (!is_numeric($n)) return false;
    
            // now filter it;
            if ($n > 1000000000000) return round(($n/1000000000000), 2).' nghìn tỉ';
            elseif ($n > 1000000000) return round(($n/1000000000), 2).' tỉ';
            elseif ($n > 1000000) return round(($n/1000000), 2).' triệu';
            elseif ($n > 1000) return round(($n/1000), 2).' nghìn';
    
            return number_format($n);
        }
    
        public function get_post($id) {
            $post = glob($_SERVER["DOCUMENT_ROOT"]."/assets/files/post/".$id.".*");
            if ($avatar) {
                $arr = explode("/", $post[0]);
                $last = array_pop($arr);
                return "assets/files/post/".$last;
            } else {
                return get_thumb($id);
            }
        }
    
        public function get_thumb($id) {
        $index = glob($_SERVER["DOCUMENT_ROOT"]."/assets/files/thumb/".$id.".*");
        if ($index) {
            $arr = explode("/", $index[0]);
            $last = array_pop($arr);
            return "assets/files/thumb/".$last;
        } else {
                return "assets/images/banner.jpg";
        }
        }
    
      public function get_string_frame($frame) {
      switch ($frame) {
        case 0:
            $str = "Không Khung";
            break;
        case 1:
            $str = "Khung Bạc";
            break;
        case 2:
            $str = "Khung Vàng";
            break;
        case 3:
            $str = "Khung Bạch Kim";
            break;
        case 4:
            $str = "Khung Kim Cương";
            break;
        case 5:
            $str = "Khung Cao Thủ";
            break;
        case 6:
            $str = "Khung Thách Đấu";
            break;
        default:
            $str = "Chưa Xác Định";
            break;
    }
    return $str;
}

    public function get_icon_rank($rank)
    {
    switch ($rank) {
        case 0:
            $name = "provisional.png";
            break;
        case 2:
        case 3:
        case 4:
        case 5:
        case 6:
            $name = "bronze.png";
            break;
        case 7:
        case 8:
        case 9:
        case 10:
        case 11:
            $name = "silver.png";
            break;
        case 12:
        case 13:
        case 14:
        case 15:
        case 16:
            $name = "gold.png";
            break;
        case 17:
        case 18:
        case 19:
        case 20:
        case 21:
            $name = "platinum.png";
            break;
        case 22:
        case 23:
        case 24:
        case 25:
        case 26:
            $name = "diamond.png";
            break;
        case 27:
            $name = "master.png";
            break;
        case 28:
            $name = "challenger.png";
            break;
    }
    $link = "/assets/img/icon/";
    return $link.$name;
}
}

//get url
$link = $_SERVER["REQUEST_URI"]; 
//phân trang web
function phantrang($url, $start, $total, $kmess,$xep_status) {
    if($xep_status!=''){
        $xep_status='&order='.$xep_status;
    }

    $out[] = '<div class="row-pagination"><ul class="pagination">';
    $neighbors = 2;
    if ($start >= $total) $start = max(0, $total - (($total % $kmess) == 0 ? $kmess : ($total % $kmess)));
    else $start = max(0, (int)$start - ((int)$start % (int)$kmess));
    $base_link = '<li><a class="pagenav" href="?page=%d' .$xep_status.'">%s</a></li>';

    $out[] = $start == 0 ? '' : sprintf($base_link, $start / $kmess, '«');
    if ($start > $kmess * $neighbors) $out[] = sprintf($base_link, 1, '1');
    if ($start > $kmess * ($neighbors + 1)) $out[] = '<li><a>...</a></li>';
    for ($nCont = $neighbors;$nCont >= 1;$nCont--) if ($start >= $kmess * $nCont) {
        $tmpStart = $start - $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    $out[] = '<li class="active"><a>' . ($start / $kmess + 1) . '</a></li>';
    $tmpMaxPages = (int)(($total - 1) / $kmess) * $kmess;
    for ($nCont = 1;$nCont <= $neighbors;$nCont++) if ($start + $kmess * $nCont <= $tmpMaxPages) {
        $tmpStart = $start + $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    if ($start + $kmess * ($neighbors + 1) < $tmpMaxPages) $out[] = '<li><a>...</a></li>';
    if ($start + $kmess * $neighbors < $tmpMaxPages) $out[] = sprintf($base_link, $tmpMaxPages / $kmess + 1, $tmpMaxPages / $kmess + 1);
    if ($start + $kmess < $total) {
        $display_page = ($start + $kmess) > $total ? $total : ($start / $kmess + 2);
        $out[] = sprintf($base_link, $display_page, '»');
    }
    $out[] = '</ul></div>';
    return implode('', $out);
}


//xóa dấu tiếng việt
function xoa_dau ($str){
 
$unicode = array(
 
'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
 
'd'=>'đ',
 
'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
 
'i'=>'í|ì|ỉ|ĩ|ị',
 
'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
 
'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
 
'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
 
'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
 
'D'=>'Đ',
 
'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
 
'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
 
'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
 
'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
 
'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
 
);
 
foreach($unicode as $nonUnicode=>$uni){
 
$str = preg_replace("/($uni)/i", $nonUnicode, $str);
 
}
$str = str_replace(' ','-',$str);
 
return $str;
 
}



?>