<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'lst');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>


<!-- INSERT INTO `user`(`id`, `username`, `password`, `email`, `phone`, `name`) VALUES (1,'binazure','truong322','binazure@gmail.com','0899240332','Nguyen Truong') -->