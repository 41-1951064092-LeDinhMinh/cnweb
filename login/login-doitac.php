

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Đăng nhập</title>
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
    <div class="container-fluid login-page">
        <div class="row"><div class="col-md-6 login-left">
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
                            "chỉ với vài thao tác, hãy nhanh chóng đăng nhập để trải
                            <br>
                        </span> 

                        <span>
                            nghiệm và cảm nhận các tiện ích tuyệt vời của chúng tôi."
                        </span> 
                    </div>
                </div>
            </div>
            <div class="col-md-3 login-form-container">
                <form class="form-signin" action="login_submit-doitac.php" method="POST">
                    <h1 class="h3 mb-3 font-weight-normal text-center">Đăng nhập</h1>
                    <label for="inputEmail" class="sr-only">Email người dùng </label>
                    <input type="text" id="inputEmail" name="Email" class="form-control" placeholder="Email hoặc sđt" required autofocus>
                    <label for="inputPassword" class="sr-only mt-3">Mật khẩu</label>
                    <input type="password" id="inputPassword" name="PassWord" class="form-control" placeholder="Mật khẩu" required>
                    
                    <?php
                       if(isset($_GET['error'])){
                           echo "<h5 style='color:red'> {$_GET['error']}</h5>";
                        }
                    
                    ?>
                    <div class="text-center">
                        <button class="mt-3 mb-3 btn btn-primary btn-block " type="submit" name="submit" >Đăng nhập</button>
                    </div>
                    <p class="mt-3 mb-3 text-muted text-center"> <a href="http://localhost/baitaplon/forgot-password-doitac/forgot-password.php?">Quên mật khẩu ?</a> </p>
                    <p class="mt-3 mb-3 text-muted text-center">Đã chưa có tài khoản? <a href="http://localhost/baitaplon/signup/signup_doitac.php">Đăng ký</a> </p>
                </form>
            </div>
        </div>
    </div>
</section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>