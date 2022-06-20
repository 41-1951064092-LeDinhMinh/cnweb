<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>signup</title>
    <style>
        html {
            background-color: #0dcaf0;
            
        }
        .login-form-container {
            background-image: url(https://tuyendung.hahalolo.com/wp-content/uploads/2018/04/Logo-Hahalolo-Final.png);
            background-size: 120px;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
    <section class="100%" style="background-color: #0dcaf0;">
    <div class="container-fluid login-page" >
        <div class="row"> 
        <div class="col-md-6 login-left">
                <div class="description-container">
                    <div class="description">
                        <b>
                            <span>Bạn thích</span>
                            <br>
                        </b>
                        
                        <h3>
                            <span>đi du lịch?</span>
                            <br>
                        </h3>

                        <b>
                            <span>Bạn muốn tìm hiểu thông tin về những điểm đến ?</span>
                            <br>
                        </b>

                        <span>
                            "chỉ với vài thao tác, hãy nhanh chóng đăng kí để trải
                            <br>
                        </span> 

                        <span>
                            nghiệm và cảm nhận các tiện ích tuyệt vời của chúng tôi."
                        </span> 
                    </div>
                </div>
            </div>

            <div class="col-md-6 login-form-container">
                <form class="form-signin" action="process-register-nguoidung.php" method="POST">
                    <h1 class="h3 mb-3 font-weight-normal text-center">Đăng Kí</h1>

                    <label for="inputUser" class="sr-only">Tên người dùng</label>
                    <input type="text" id="inputUser" name="HoTen" class="form-control" placeholder="Họ và tên" required autofocus>

                    <label for="inputNgaySinh" class="sr-only">Ngày sinh</label>
                    <input type="date" id="inputNgaysinh" name="NgaySinh" class="form-control" placeholder="Ngày sinh" required autofocus>

                    <label for="inputGioiTinh" class="sr-only">GioiTinh</label>
                    <input type="text" id="inputGioiTinh" name="GioiTinh" class="form-control" placeholder="Giới tính" required autofocus>

                    <label for="inputPhone" class="sr-only">Số điện thoại</label>
                    <input type="tel" id="inputPhone" name="phone" class="form-control" placeholder="Số điện thoại" required autofocus>                    

                    <label for="inputEmail" class="sr-only">Email người dùng </label>
                    <input type="email" id="inputEmail" name="Email" class="form-control" placeholder="nhập Email người dùng" required autofocus>

                    <label for="inputDiaChi" class="sr-only mt-3">Địa chỉ</label>
                    <input type="text" id="inputDiaChi" name="DiaChi" class="form-control" placeholder="Địa chỉ người dùng" required>

                    <label for="inputCMT" class="sr-only mt-3">Số chứng minh thư hoặc số căn cước công dân</label>
                    <input type="text" id="inputCMT" name="CMT" class="form-control" placeholder="cmt hoặc cccd" required>

                    <label for="inputPassword" class="sr-only mt-3">Mật khẩu</label>
                    <input type="password" id="inputPassword" name="PassWord" class="form-control" placeholder="Nhập mật khẩu" required>

                    <label for="inputRetypePassword" class="sr-only mt-3">Nhập lại mật khẩu</label>
                    <input type="password" id="inputRetypePassword" name="RePassWord" class="form-control" placeholder="Nhập lại mật khẩu" required>

                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                    <?php
                       if(isset($_GET['error'])){
                           echo "<h5 style='color:red'> {$_GET['error']}</h5>";
                        }
                    
                    ?>
                    <div class="text-center">
                        <button class="btn btn-primary btn-block " type="submit" name="btnRegister" >Đăng ký</button>
                    </div>
                    <p class="mt-3 mb-3 text-muted text-center">Đã có tài khoản? <a href="http://localhost/baitaplon/login/login-nguoidung.php">Đăng Nhập</a> </p>
                </form>
            </div>
        </div>
    </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>