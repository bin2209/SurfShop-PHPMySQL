<?php
include'index.php';
include'index2.php';

if($_SESSION["md5chuoi"] == $_SESSION["md5chuoi2"]){
    echo $_SESSION["chuoi"];
}else{
    echo 'ERROR';
}
echo'<br>';
 echo $_SESSION["chuoi"];
 echo'<br>';
 echo $_SESSION["md5chuoi"];
 echo'<br>';
 echo $_SESSION["chuoi2"];
 echo'<br>';
  echo $_SESSION["md5chuoi2"];