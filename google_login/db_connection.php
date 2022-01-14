<?php
$db_connection = mysqli_connect("localhost","lstsurfc_lstsurf","ttruong322","lstsurfc_lstsurf");
if(mysqli_connect_errno()){
    echo "Connection Failed".mysqli_connect_error();
    exit;
}