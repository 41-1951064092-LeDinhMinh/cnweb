<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Đăng kí </title>
    <style>
        html {
            background-color: #0dcaf0;
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
                <form class="form-signin" action="signup_nguoidung" method="POST">
                    <h1 class="h3 mb-3 font-weight-normal text-center">Đăng kí người dùng</h1>
                    <div class="text-center">
                    <p class="mt-3 mb-3 text-muted text-center"><a href="signup_nguoidung.php">Đăng kí</a> </p>
                    </div>
                </form>
                <form class="form-signin" action="signup_doitac" method="POST">
                    <h1 class="h3 mb-3 font-weight-normal text-center">Đăng kí đối tác</h1>
                    <div class="text-center">
                    <p class="mt-3 mb-3 text-muted text-center"><a href="signup_doitac.php">Đăng kí</a> </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>