<?php
   session_start();
   include 'constants.php';   
    if(!$conn){
        die("Kết nối thất bại, vui lòng kiểm tra lại máy chủ ...");
    }
   if(isset($_POST['submit'])){
        $email  =$_POST['Email'];

        $sql = "SELECT * from nguoidung where email='$email' ";
        $token=md5($_POST['Email']).rand(10,9999);
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {       
            $delele="UPDATE `nguoidung` SET `password` = '' WHERE email='$email'";     
            mysqli_query($conn, $delele);   
            $link = "<a href='http://localhost/baitaplon/forgot-password-nguoidung/FG-activation-nguoidung.php?key=".$email."&token=".$token."'>click vào đây để đổi mật khẩu!!!</a>";
            include "send_email.php";
            if(sendEmailForAccountActive($email, $link)){
                echo "vui lòng kiểm tra hộp thư của bạn để thực hiện đổi mật khẩu...";
            }else{
                $error= "xin lỗi,email chưa đc gửi đi. Vui lòng kiểm tra lại thông tin đăng kí tài khoản";
                header("location:signup_nguoidung.php?erroro=$error");
                 }
        mysqli_close($conn);
        }else{
            $error = "Email vừa nhập không tồn tại, vui lòng kiểm tra lại.";
            header("location:forgot-password.php?error=$error");
        }
    }else{
        header("location:login-nguoidung.php");
    }
?>
