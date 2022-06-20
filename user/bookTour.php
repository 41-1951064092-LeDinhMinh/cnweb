<!-- Trang đặt tour du lịch -->
<?php include('../constants.php'); ?>
<?php
    // Trước khi cho người dùng xâm nhập vào bên trong
    // Phải kiểm tra THẺ LÀM VIỆC
    if(!isset($_SESSION['loginAccount'])){
        header("location:".SITEURL);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="../assets/css/bookTour.css">
  <title>Đặt Tour</title>
</head>

<body>
    <?php
    require "partials/header.php";
    ?>

<?php 
ob_start();

    //Kiểm tra xem có nhận được mã tour từ giới thiệu tour
    if(isset($_GET['MaTour']))
    {
        //Lấy mã tour và thông tin của tour du lịch đã chọn
        $maTour = $_GET['MaTour'];

        //sql lấy thông tin của tour du lịch
        $sql = "SELECT tour.maTour,tour.tenTour,tour.moTa,tour.hinhAnh,tour.diemKhoiHanh,tour.diemKetThuc,
        tour.ngayKhoiHanh,tour.ngayKetThuc,tour.loaiHinh,doitac.maCongTy,doitac.tenCongTy,doitac.email
         FROM tour,doitac where tour.maCongTy = doitac.maCongTy and tour.maTour = '$maTour'";

        //Thực thi câu lệnh
        $res = mysqli_query($conn, $sql);

        //Đếm số bản ghi
        $count = mysqli_num_rows($res);
        //Kiểm tra xem bản ghi có tồn tại không
        if($count==1)
        {
            //Lấy dữ liệu từ database
            $row = mysqli_fetch_assoc($res);
            $tenTour = $row['tenTour'];
            $hinhAnh = $row['hinhAnh'];
            $ngayKhoiHanh = $row['ngayKhoiHanh'];
            $ngayKetThuc = $row['ngayKetThuc'];
            $diemKhoiHanh = $row['diemKhoiHanh'];
            $diemKetThuc = $row['diemKetThuc'];
            $loaiHinh = $row['loaiHinh'];
            $moTa = $row['moTa'];
            $maCongTy = $row['maCongTy'];
            $tenCongTy = $row['tenCongTy'];
            $email = $row['email'];
            $first_date = strtotime($ngayKhoiHanh);
            $second_date = strtotime($ngayKetThuc);
            $datediff = abs($first_date - $second_date);
            $day = floor($datediff / (60*60*24));     
        }
        else
        {
            //Chuyển hướng về trang chủ
            header('location:'.SITEURL);
        }

        // phần lấy giá của độ tuổi có mã là 1
        $sql1 = "SELECT gia,moTa FROM giatour WHERE maTour='$maTour' and doTuoi = 1";
        //Execute the Query
        $res1 = mysqli_query($conn, $sql1);
        if(mysqli_num_rows($res1)>0){
          while($row1 = mysqli_fetch_assoc($res1)){
            //Lấy mô tả và giá tuổi
            $tuoi1 = $row1['moTa'];
            $giaTuoi1 = $row1['gia'];
          }
        }else{
          $giaTuoi1 = "";
        }

        // phần lấy giá của độ tuổi có mã là 2
        $sql2 = "SELECT gia,moTa FROM giatour WHERE maTour='$maTour'and doTuoi = 2";
        //Execute the Query
        $res2 = mysqli_query($conn, $sql2);
        if(mysqli_num_rows($res2)>0){
          while($row2 = mysqli_fetch_assoc($res2)){
            //Lấy mô tả và giá tuổi
            $tuoi2 = $row2['moTa'];
            $giaTuoi2 = $row2['gia'];
          }
        }else{
          $giaTuoi2 = "";
        }

        // phần lấy giá của độ tuổi có mã là 3
        $sql3 = "SELECT gia,moTa FROM giatour WHERE maTour='$maTour' and doTuoi = 3";
        //Execute the Query
        $res3 = mysqli_query($conn, $sql3);
        if(mysqli_num_rows($res3)>0){
          //Count the rows
          while($row3 = mysqli_fetch_assoc($res3)){
            //Lấy mô tả và giá tuổi
            $tuoi3 = $row3['moTa'];
            $giaTuoi3 = $row3['gia'];
          }
        }else{
          $giaTuoi3 = "";
        }

    }
    else
    {
        //Chuyển hướng về trang chủ
        header('location:'.SITEURL);
    }
?>

<!-- Thông tin của tour đã chọn -->
<section class="Tour-info">
    <div class="container">
      <div class="row" style='padding-top: 70px'>
        <!-- Đặt tour -->
        <div class="col-md-8 border p-3 border-success rounded info-tour ">
          <h3>Thông Tin Tour</h3>
          <div class="tour-menu-img">
              <?php               
                  //Kiểm tra hình ảnh
                  if($hinhAnh=="")
                  {
                      //nếu không có
                      echo "<div class='error'>Image not Available.</div>";
                  }
                  else
                  {
                      //nếu có
              ?>
                  <img src="<?php echo SITEURL; ?>assets/images/tours/<?php echo $hinhAnh; ?>" alt="Tour-img" style="max-height: 400px;width:100%" class="img-fluid">
                  <?php
                    }
                  
              ?>
                  
          </div>
          <form method="POST" class="order">
          <!-- Chi tiết của tour và chọn thanh toán -->
          <div class="tour-menu-desc">
              <h4><?php echo $tenTour; ?></h4>
              <p>Mã: <?php echo $maTour; ?></p>
              <p class="text-warning"><i class="bi bi-flag me-3"></i>Loại Hình: <?php echo $loaiHinh ?></p>
              <p><i class="bi bi-geo-alt me-3"></i><span class="text-success">Khởi Hành: <?php echo $diemKhoiHanh; ?></span> <span class="text-danger">-> Kết Thúc: <?php echo $diemKetThuc; ?></span></p>
              <p><i class="bi bi-calendar3 me-3"></i>Bắt Đầu: <?php echo $ngayKhoiHanh ?><span>-> Kết Thúc: <?php echo $ngayKetThuc ?></span> </p>
              <p><i class="bi bi-clock me-3"></i>Thời Gian: <?php  echo $day.' ngày'?></p>
              <p><i class="bi bi-building me-3"></i>Mã công ty: <?php echo $maCongTy ?></p>
              <p><i class="bi bi-building me-3"></i>Tên công ty: <?php echo $tenCongTy ?></p>
              <p><i class="bi bi-envelope me-3"></i>Email liên hệ: <?php echo $email ?></p>
              <p>Thông tin về tour: <br> <?php echo $moTa; ?></p>
              <h4>Phương thức thanh toán</h4>
  
              <div class="d-flex ">
                <select class="form-select w-50" aria-label="Default select example" name="cast">
                  <option selected value ="Chuyển Khoản">Chuyển khoản</option>
                  <option value="Tiền Mặt">Tiền Mặt</option>
                </select>
              </div>
  
              <h4 class="mt-3">Số Lượng Người Đăng Kí</h4>                    
              <div class="tour-num-people d-flex  mt-3">
                <div class="order-label me-3"><?php echo $tuoi1 ?>
                  <?php
                    if($giaTuoi1==""){
                      echo "<input type='number' class='input' name='quantity1' id='quantity1' min='0' max='100' value ='0' disabled>";
                      echo '<br>';
                      echo "<p id='price1' name='price1'>".$giaTuoi1."</p>";
                    }
                    else{
                      echo "<input type='number' class='input' name='quantity1' id='quantity1' min='0' max='100' value ='0'>";
                      echo '<br>';
                      echo "<p id='price1' name='price1'>".$giaTuoi1."</p>";
                    }
                  ?>
                </div>
  
                <div class="order-label me-3"><?php echo $tuoi2 ?>
                  <?php
                    if($giaTuoi2==""){
                      echo "<input type='number' class='input' name='quantity2' id='quantity2' min='1' max='100' value ='0' disabled>";
                      echo '<br>';
                      echo "<p id='price2' name='price2'>".$giaTuoi2."</p>";
                    }
                    else{
                      echo "<input type='number' class='input' name='quantity2' id='quantity2' min='1' max='100' value ='0'>";
                      echo '<br>';
                      echo "<p id='price2' name='price2'>".$giaTuoi2."</p>";
                    }
                  ?>
                </div>
  
                <div class="order-label me-3"><?php echo $tuoi3 ?>
                  <?php
                    if($giaTuoi3==""){
                      echo "<input type='number' class='input' name='quantity3' id='quantity3' min='0' max='100' value ='0' disabled>";
                      echo '<br>';
                      echo "<p id='price3' name='price3'>".$giaTuoi3."</p>";
                    }
                    else{
                      echo "<input type='number' class='input' name='quantity3' id='quantity3' min='0' max='100' value ='0'>";
                      echo '<br>';
                      echo "<p id='price3' name='price3'>".$giaTuoi3."</p>";
  
                    }
                  ?>
                </div>
              </div>
  

              <p class="mt-3" id="price">Tổng Tiền: <span id="tour_price"></span></p>
                  
          </div>
  
          
  
      <input type="submit" name="submit" value="Xác nhận đặt tour" class="btn btn-primary mt-3">
    </form>
        </div>

        <!-- Hết đặt tour -->

        <!-- Thời tiết và quảng cáo -->
        <div class="col-md-4 weather-tour">
          <div id="weather">
              <input type="text" placeholder="Search..." class="input-search">
              <div class="content">
                <h1 class="name">
                  <span class="city"></span>
                  <span>,</span>
                  <span class="country"></span>
                </h1>

                <p class="time"></p>

                <div class="temperature">
                  <span class="value"></span>
                  <span><sup>o</sup>C</span>
                </div>

                <div class="short-desc"></div>

                <div class="more-desc mt-3 ms-3">
                  <div class="visibility pb-3">
                    <i class="bi bi-eye"></i>
                    <span></span>
                  </div>

                  <div class="wind pb-3">
                    <i class="bi bi-wind"></i>
                    <span></span>
                  </div>

                  <div class="cloud pb-3 me-3">
                    <i class="bi bi-cloud"></i>
                    <span></span>
                  </div>
              </div>
			    </div>
		    </div>
        <!-- Ket thuc thoi tiet -->


        </div>

      </div>
    </div>
</section>
<!-- Kết thúc phần thông tin tour -->

        <?php 

            //Kiểm tra xem nút đặt tour có được bấm không
            if(isset($_POST['submit']))
            {
                // Lấy thông tin từ form do khách hàng nhập

                if($giaTuoi1==""){
                  $giaTuoi1 = 0;
                }
                if($giaTuoi2==""){
                  $giaTuoi2 = 0;
                }
                if($giaTuoi3==""){
                  $giaTuoi3 = 0;
                }
                $quantity1 = $_POST['quantity1'];
                $quantity2 = $_POST['quantity2'];
                $quantity3 = $_POST['quantity3'];
                $soLuong = $quantity1+$quantity2+$quantity3;
                $hinhThucThanhToan = $_POST['cast'];
                $thanhtien1 = $quantity1*$giaTuoi1;
                $thanhtien2 = $quantity2*$giaTuoi2;
                $thanhtien3 = $quantity3*$giaTuoi3;
                
                $tongTien = $giaTuoi1* $quantity1 + $giaTuoi2* $quantity2+ $giaTuoi3* $quantity3; // total = price x qty 
                $maPhieuTour = 'PT'.rand(0000,9999);
                $ngayDat = date("Y-m-d h:i:sa"); 

                $tinhTrang = 0; 


                //Câu lệnh SQL lưu thông tin vào phiếu đăng kí
                $sql4 = "INSERT INTO phieudangkitour(maPhieuTour,maNguoiDung,soKhach,maTour,thoiGianDat,hinhThucThanhToan,tinhTrang,tongTien)
                 VALUES ('$maPhieuTour','{$_SESSION['loginAccount1']}','$soLuong','$maTour','$ngayDat','$hinhThucThanhToan','$tinhTrang','$tongTien')";
                //Execute the Query
                $res4 = mysqli_query($conn, $sql4);

                // insert into chitietgia
                if($quantity1>0){
                  $sql5 = "INSERT INTO chitietgia(maPhieuTour,maTour,doTuoi,soLuong,thanhTien)
                  VALUES ('$maPhieuTour','$maTour','1','$quantity1','$thanhtien1')";
                 //Execute the Query
                 $res5= mysqli_query($conn, $sql5);
                }

                // insert into chitietgia
                if($quantity2>0){
                  $sql6 = "INSERT INTO chitietgia(maPhieuTour,maTour,doTuoi,soLuong,thanhTien)
                  VALUES ('$maPhieuTour','$maTour','2','$quantity2','$thanhtien2')";
                 //Execute the Query
                 $res6 = mysqli_query($conn, $sql6);
                }

                // insert into chitietgia
                if($quantity3>0){
                  $sql7 = "INSERT INTO chitietgia(maPhieuTour,maTour,doTuoi,soLuong,thanhTien)
                  VALUES ('$maPhieuTour','$maTour','3','$quantity3','$thanhtien3')";
                 //Execute the Query
                 $res7 = mysqli_query($conn, $sql7);
                }


                //kiểm tra việc đặt tour được thực hiện thành công hay thất bại
                if($res4==true)
                {
                    //Nếu thành công
                    $_SESSION['order'] = "<div class='success text-center' style='color:green;font-size:30px'>Bạn đã hoàn thảnh thủ tục đặt Tour, xin vui lòng đợi xác nhận từ công ty</div>";
                    header("location:".SITEURL.'user/userInfo.php');

                }
                else
                {
                    //Nếu thất bại
                    $_SESSION['order'] = "<div class='error text-center' style='color:red;font-size:40px'>Đặt TOUR Thất Bại.</div>";
                    header("location:".SITEURL.'user/userInfo.php');
                }

            }
        mysqli_close($conn);
        
        ?>

    <?php
    include "partials/footer.php";
      ob_flush();
    ?>
    
  <script src="../assets/js/weather.js"></script>
  <script>
    // JS xử lý tổng tiền thanh toán
    $(document).ready(function(){

      $(".input").on('input', function(){
        var moneyString1 = $("#price1").text();
        var money1 = parseInt(moneyString1);
        var number1 = document.getElementById('quantity1').value;
        number1 = parseInt(number1);

        var moneyString2 = $("#price2").text();
        var money2 = parseInt(moneyString2);
        var number2 = document.getElementById('quantity2').value;
        number2 = parseInt(number2);

        var moneyString3 = $("#price3").text();
        var money3 = parseInt(moneyString3);
        var number3 = document.getElementById('quantity3').value;
        number3 = parseInt(number3);

        if(Number.isNaN(number1)){
          number1 = 0;
        }
        else if(Number.isNaN(number2)){
          number2 = 0;
        }
        else if(Number.isNaN(number3)){
          number3 = 0;
        }

        $("#tour_price").text(money1*number1+money2*number2+money3*number3);

      })
        
    });


  </script>
</body>

</html>