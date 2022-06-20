      

<?php
    if(!isset($_POST['btnRegister2'])){
        header("location:signup_doitac.php");
    }
    $tencongty = $_POST["TenCongTy"];
    $phone = $_POST["phone"];
    $email = $_POST["Email"];
    $diachi = $_POST["DiaChi"];
    $password = $_POST["PassWord"];
    $repassword = $_POST["RePassWord"];
    $pass_hash = password_hash($password, PASSWORD_DEFAULT);

    require "constants.php";
    $sql01="SELECT * FROM doitac WHERE email='$email'  OR soDienThoai='$phone'";
    $result01=mysqli_query($conn,$sql01);
    if(mysqli_num_rows($result01)>0){
        $error="Email hoặc số điện thoại đã được đăng kí trước đó !";
        header("location:signup_doitac.php?error=$error");
    }else{
        $token=md5($_POST['Email']).rand(10,9999);
        $sql02 = "INSERT INTO doitac(tenCongTy,soDienThoai,email,linkXacMinhEmail,diaChi,password) 
        VALUES ('$tencongty','$phone','$email','$token','$diachi','$pass_hash')";
        mysqli_query($conn, $sql02);
        $sql_getuid = "SELECT * from doitac where soDienThoai='$phone'";
        $res_getuid = mysqli_query($conn, $sql_getuid);
        if(mysqli_num_rows($res_getuid) == 1){
            $uid              = mysqli_fetch_assoc($res_getuid)['id'];
            $uname            = "DT".$uid."N".rand(0000,9999);
            $sql_update_uname = "UPDATE doitac SET maCongTy='$uname' WHERE id='$uid'";
            mysqli_query($conn, $sql_update_uname);
        }
        $link = "<a href='http://localhost/baitaplon/signup/activation-doitac.php?key=".$email."&token=".$token."'>click vào đây để kích hoạt</a>";
        include "send_email.php";
        if(sendEmailForAccountActive($email, $link)){
            echo "vui lòng kiểm tra hộp thư của bạn để kích hoạt tài khoản đăng nhập...";
        }else{
            $errpr= "xin lỗi,email chưa đc gửi đi. Vui lòng kiểm tra lại thông tin đăng kí tài khoản";
            header("location:signup_nguoidung.php?erroro=$error");
        }
    }

?>