<?php
require 'db_connection.php';


include 'config.php';

if(isset($_GET['code'])){

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    if(!isset($token["error"])){
        $client->setAccessToken($token['access_token']);

        // getting profile information
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();

        // Storing data into database
        $id = mysqli_real_escape_string($db_connection, $google_account_info->id);
        $full_name = mysqli_real_escape_string($db_connection, trim($google_account_info->name));
        $email = mysqli_real_escape_string($db_connection, $google_account_info->email);
        $profile_pic = mysqli_real_escape_string($db_connection, $google_account_info->picture);

        $sql = "SELECT * FROM `user` WHERE `google_id`='$id'";
        // checking user already exists or not
        $get_user = mysqli_query($db_connection, $sql);

        if(mysqli_num_rows($get_user) > 0){
            // Đã đăng ký trước - > Tiến hành đăng nhập
            @session_start();
            $_SESSION['google'] = 'google';
             // LẤY DATA TỪ DB
            while($row = $get_user->fetch_assoc()) {
                $user_id =  $row["id"]; 
                $_SESSION['user_id'] = $row["id"]; 
                $_SESSION['user_email'] = $email;
                $_SESSION['password'] = $row["password"];
                $_SESSION['login_id'] = $row["id"]; 
                $_SESSION['type'] = $row["type"]; 
                $_SESSION['avatar'] = $row["avatar"]; 
                $_SESSION['name'] = $row["name"]; 

                // XÁC THỰC EMAIL TỰ ĐỘNG 
                if ($row["xacthuc"]==NULL){
                      mysqli_query($db_connection, "UPDATE `user` SET `xacthuc`= 1 WHERE `id`='$user_id'");
                }
            }

            header('Location: ../account');
            exit;
        }
        else{
            // Đăng ký - không tạo mật khẩu tự động
            header('Location: ../login.php?signup-error=Google Account - Enter new password &name='.$full_name.'&email='.$email.'&profile_pic='.$profile_pic.'&google_id='.$id.'');

            exit;
        }
    }
    else{
        header('Location: ../login');
        exit;
    }
}
?>

