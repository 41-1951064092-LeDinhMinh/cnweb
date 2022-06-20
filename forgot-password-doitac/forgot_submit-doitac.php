<?php
   session_start();
   include 'constants.php';   
    if(!$conn){
        die("Kết nối thất bại, vui lòng kiểm tra lại máy chủ ...");
    }
   if(isset($_POST['submit'])){
        $username  =$_POST['username'];
        $password  =$_POST['password'];
        $repassword=$_POST['repassword'];
        $pass_hash  = password_hash($password, PASSWORD_DEFAULT);
        $sql = "SELECT * from doitac where email='$username' ";
        $result = mysqli_query($conn, $sql); 
        if (mysqli_num_rows($result) == 1){ 
            $pass_old = mysqli_fetch_assoc($result)['password']; 
            if($pass_old==''){
                if($password == $repassword){
                    $_SESSION['forgotAccount'] = $username;
                    $sql_update_pass = "UPDATE doitac SET password='$pass_hash' WHERE email='$username' ";    
                    mysqli_query($conn, $sql_update_pass);
                    header("location:http://localhost/baitaplon/login/login-doitac.php");
                }else{
                    $error="Bạn nhập mật khẩu không trùng khớp!";
                    header("location:FG-activation-doitac.php?error=$error");
                } 
            }else{
                $error = "Sai email của tài khoản cần đổi mật khẩu";
                header("location:FG-activation-doitac.php?error=$error");
            }       
        }else{ 
            $error = "Tên đăng nhập không tồn tại, vui lòng kiểm tra lại!";
            header("location:FG-activation-nguoidung.php?error=$error");
        }
        mysqli_close($conn);
   }else{
       header("location:FG-activation-nguoidung.php");
   }
?>
    
    