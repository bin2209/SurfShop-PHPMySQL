<?php

include 'Functions.php';


// TIME_LEFT : OKE
// echo time_left(0,60);


// var_dump(auto_get('https://localhost/classes/test.php')) ;
// $xss = new Anti_xss;
//  $act = $xss->clean_up("<script>alert("TEST");</script>");
//  var_dump($act) ;

 $input = new Input;
 $return = $input->input_post(123);
 var_dump($return) ;
?>