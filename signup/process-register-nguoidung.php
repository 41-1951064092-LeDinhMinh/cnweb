<?php
    if(!isset($_POST['btnRegister'])){
        header("location:signup_nguoidung.php");
    }
    $hoten      = $_POST["HoTen"];
    $ngaysinh   = $_POST["NgaySinh"];
    $gioitinh   = $_POST["GioiTinh"];
    $phone      = $_POST["phone"];
    $email      = $_POST["Email"];
    $diachi     = $_POST["DiaChi"];
    $cmt        = $_POST["CMT"];
    $password   = $_POST["PassWord"];
    $repassword = $_POST["RePassWord"];
    $pass_hash  = password_hash($password, PASSWORD_DEFAULT);

    require "constants.php";
    $sql01="SELECT * FROM nguoidung WHERE email='$email'  OR soDienThoai='$phone' OR soCMT='$cmt'";
    $result01=mysqli_query($conn,$sql01);
    if(mysqli_num_rows($result01)>0){
        $error="Email hoặc số điện thoại  hoặc CMT đã được đăng kí trước đó !";
        header("location:signup_nguoidung.php?error=$error");
    }else{
        $token=md5($_POST['Email']).rand(10,9999);
        if($password==$repassword){
            $sql02 = "INSERT INTO nguoidung(hoVaTen,ngaySinh,gioiTinh,soDienThoai,email,linkXacMinhEmail,diaChi,soCMT,PassWord)
            VALUES('$hoten','$ngaysinh','$gioitinh','$phone','$email','$token','$diachi','$cmt','$pass_hash')";
            $resuly02=mysqli_query($conn, $sql02);
            $sql_getuid = "SELECT * from nguoidung where soDienThoai='$phone'";
            $res_getuid = mysqli_query($conn, $sql_getuid);
            if(mysqli_num_rows($res_getuid) == 1){
                $uid              = mysqli_fetch_assoc($res_getuid)['id'];
                $uname            = "KH".$uid."N".rand(0000,9999);
                $sql_update_uname = "UPDATE nguoidung SET maNguoiDung='$uname' WHERE id='$uid'";
                mysqli_query($conn, $sql_update_uname);
            }
            $link = "<a href='http://localhost/baitaplon/signup/activation-nguoidung.php?key=".$email."&token=".$token."'>click vào đây để kích hoạt</a>";
            include "send_email.php";
            if(sendEmailForAccountActive($email, $link)){
                echo "vui lòng kiểm tra hộp thư của bạn để kích hoạt tài khoản đăng nhập...";
            }else{
                $error= "xin lỗi,email chưa đc gửi đi. Vui lòng kiểm tra lại thông tin đăng kí tài khoản";
                header("location:signup_nguoidung.php?erroro=$error");
                 }       
        }else{
            $error="nhập lại mật khẩu không trùng khớp";
            header("location:signup_nguoidung.php?error=$error");
        }
    }

?>