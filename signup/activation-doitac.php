<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Account Activation by Email Verification using PHP</title>
    <!-- CSS -->
    <style>
        html {
            background-color: #0dcaf0;
            
        }
        .card {
            background-image: url(https://tuyendung.hahalolo.com/wp-content/uploads/2018/04/Logo-Hahalolo-Final.png);
            background-size: 120px;
            background-repeat: no-repeat;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<section class="100%" style="background-color: #0dcaf0;">
    <?php
if($_GET['key'] && $_GET['token'])
    {
        require "constants.php";
        $email = $_GET['key'];
        $token = $_GET['token'];
        $query = mysqli_query($conn,
        "SELECT * FROM `doitac` WHERE `linkXacMinhEmail`='".$token."' and `email`='".$email."';"
    );
    $d = date('Y-m-d H:i:s');
        if (mysqli_num_rows($query) > 0) {
        $row= mysqli_fetch_array($query);
            if($row['thoiGianXacMinhEmail'] == NULL){
                mysqli_query($conn,"UPDATE doitac set thoiGianXacMinhEmail ='" . $d . "',TinhTrang=1 WHERE Email='" . $email . "'");
                $msg = "Chúng tôi sẽ không bao giờ chia sẻ email của bạn với bất kỳ ai khác .";
            }else{
                $msg = "Xác minh tài khoản thành công,bạn có thể đăng nhập ngay bây giờ";
        }
    } else {
        $msg = "Email này chưa được đăng ký với chúng tôi.";
    }
}
else{
    $msg = "Nguy hiểm! Có điều gì đó không ổn.";
}
?>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header text-center">
                Kích hoạt tài khoản :
            </div>
            <div class="card-body text-center">
                <p>
                    <?php echo $msg; ?>
                </p>
            </div>
            <p class="mt-3 mb-3 text-muted text-center"><a href="http://localhost/baitaplon/login/login-doitac.php">Đăng nhập</a> </p>
        </div>
    </div>
</session>
</body>

</html>