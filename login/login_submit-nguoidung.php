<?php
   include '../constants.php';   
    if(!$conn){
        die("Kết nối thất bại, vui lòng kiểm tra lại máy chủ ...");
    }
   if(isset($_POST['submit'])){
       $email  =$_POST['Email'];
       $password  =$_POST['PassWord'];

       $sql = "SELECT * from nguoidung where email='$email' OR soDienThoai='$email'";
       $result = mysqli_query($conn, $sql);

   
    if (mysqli_num_rows($result) == 1) {       
       $raw=mysqli_fetch_assoc($result);
       $raw_password=$raw['password'];
       $raw_tinhTrang=$raw['tinhTrang'];
       $raw_manguoidung=$raw['maNguoiDung'];
        if (password_verify($password, $raw_password)==1) { 
          $_SESSION['loginAccount'] = $email;
          $_SESSION['loginAccount1']=$raw_manguoidung;
          if($raw_tinhTrang == '1'){
            header("location:".SITEURL.'user/user.php');
          }else
           if($raw_tinhTrang == '0'){
              $error = "Tài khoản chưa đc kích hoạt";
              header("location:login-nguoidung.php?error=$error");
            }
          else if($raw_tinhTrang == '2'){
              $error = "Tài khoản đã bị vô hiệu hóa";
              header("location:login-nguoidung.php?error=$error");
            } 
        } else { 
          $error = "Mật khẩu sai. Vui lòng nhập lại!";
          header("location:login-nguoidung.php?error=$error");
        }
      } else { 
        $error = "Thông tin tài khoản hoặc mật khẩu bạn nhập không chính xác!";
        header("location:login-nguoidung.php?error=$error" );
      }
      mysqli_close($conn);
   }else{
       header("location:login-nguoidung.php");
   }
?>
 