<?php include('constants.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="assets/css/userStyle.css">
  <title>Trang chủ</title>
</head>

<body>
  <!-- navbar -->
  <div class="container-fluid">
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light bg-light main-navbar">
          <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="assets/images/tours/logo.png" alt="logo" class='img-fluid' style='max-width:90px;max-height:40px'></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Đăng nhập</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="login/login-nguoidung.php">Khách hàng</a></li>
                        <li><a class="dropdown-item" href="login/login-doitac.php">Đối tác</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="signup/signup.php" tabindex="-1" aria-disabled="true">Đăng kí</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
    </div>
  </div>

  <main>
        <!-- Main page img -->
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/images/tours/main.jpg" class="d-block w-100" alt="slider" style="height: 500px;">
                </div>
                <div class="carousel-banner">
                    <h1>Tìm điểm du lịch tại Việt Nam</h1>
                    <span>Việt Nam nơi có nhiều danh lam thắng cảnh trải khắp tổ quốc</span>
                </div>
            </div>
        </div>

        <!-- Tour suggest -->
        <div class="container">
            <section class="pt-5" id="tourType">
                <div class="suggest">
                    <p class="text-uppercase text-center">Đề Xuất</p>
                    <h2 class="text-uppercase text-center">Các điểm đến của chúng tôi</h2>
                </div>
                <div class="row">
                <?php 

                //Create SQL Query to Display CAtegories from Database
                $sql1 = "SELECT distinct loaiHinh,maTour,hinhAnh FROM tour LIMIT 3";
                //Execute the Query
                $res1 = mysqli_query($conn, $sql1);
                //Count rows to check whether the category is available or not
                $count1 = mysqli_num_rows($res1);

                if($count1>0)
                {
                    //CAtegories Available
                    while($row=mysqli_fetch_assoc($res1))
                    {
                        //Get the Values like id, title, image_name
                        $maTour = $row['maTour'];
                        $loaiHinh = $row['loaiHinh'];
                        $hinhAnh = $row['hinhAnh'];
                        ?>
                        
                        <div class="col-lg-4 col-md-6 col-sm-12 mt-3 position-relative">
                            <a href="<?php echo SITEURL; ?>user/category-tour.php?category_id=<?php echo $maTour; ?> ">
                            <?php 
                                    //Check whether Image is available or not
                                    if($hinhAnh=="")
                                    {
                                        //Display MEssage
                                        echo "<div class='error'>Image not Available</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>assets/images/tours/<?php echo $hinhAnh; ?>" class="img-fluid" style="height:350px">
                                        <?php
                                    }
                                ?>
                                

                                <h3 class="text-light position-absolute text-center p-1 border border-primary rounded bg-dark" style="z-index:1;bottom:25px;transform: translateX(-50%);left:50%"><?php echo $loaiHinh ?></h3>
                            </a>
                            </div>
                        

                        <?php
                    }
                }
                else
                {
                    //Categories not Available
                    echo "<div class='error'>Category not Added.</div>";
                }
            ?>
            </div>

            </section>
        </div>

    
        
        <!-- Search tour -->
        <section class="search-tour mt-5" id="search-tour" style="height:250px"> 
            <div class="text-center search-form">
                <div class="normal-search text-center">
                    <form action="user/tourSearch.php" method="POST">
                        <h3>Tìm kiếm điểm du lịch</h3>
                        <input class='mt-3' type="search1" name="search1" placeholder="Nhập tìm kiếm" style="width:300px">
                        <button type="submit" name="submit" class="btn btn-primary submit">Tìm kiếm</button>
                    </form>
                    <button class='more-detail btn btn-success'>Tìm kiếm nâng cao</button>
                </div>

                <div class="detail-search text-center" style='display:none'>
                    <form action="tourSearchDetail.php" method ="POST">
                        <h3>Tìm kiếm điểm du lịch</h3>
                        Khởi hành: <input class='mt-3' type="month" name="month" placeholder="Khởi hành trong tháng" style="width:300px" required>
                        <input class='mt-3' type="text" name="search2" placeholder="Điểm khởi hành" style="width:300px" required>
                        <input class='mt-3' type="text" name="search3" placeholder="Điểm đến" style="width:300px" required>
                        <input class='mt-3' type="text" name="search4" placeholder="Chủ đề" style="width:300px">
                        <br>
                        <button type="submit1" name="submit1" class="btn btn-primary submit1 mt-3">Tìm kiếm</button>
                    </form>
                    <button class='more-detail-close btn btn-success'>Thu gọn</button>
                </div>   
            </div>
        </section>
    
        <!-- Tour MEnu Section Starts Here -->
        <section class="tour-menu mt-5">
            <div class="container">
                <h2 class="text-center pt-3">Các Tour hiện có</h2>
                <div class="row">
                    
                    <?php 
                
                //Getting tours from Database that are active and featured
                //SQL Query
                $sql = "SELECT * FROM Tour LIMIT 6";
                
                //Execute the Query
                $res = mysqli_query($conn, $sql);
                
                //Count Rows
                $count = mysqli_num_rows($res);
                
                //CHeck whether tour available or not
                if($count>0)
                {
                    //tour Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get all the values
                        $maTour = $row['maTour'];
                        $tenTour = $row['tenTour'];
                        $moTa = $row['moTa'];
                        $hinhAnh = $row['hinhAnh'];
                        $diemKhoiHanh = $row['diemKhoiHanh'];
                        $diemKetThuc = $row['diemKetThuc'];
                        $ngayKhoiHanh = $row['ngayKhoiHanh'];
                        $ngayKetThuc = $row['ngayKetThuc'];
                        $loaiHinh = $row['loaiHinh'];
                        $first_date = strtotime($ngayKhoiHanh);
                        $second_date = strtotime($ngayKetThuc);
                        $datediff = abs($first_date - $second_date);
                        $day = floor($datediff / (60*60*24));

                        ?>
                        <div class="tour-menu-box p-3 m-3 border border-success rounded col-md-5 ">
                            <div class="row">
                                <div class="tour-menu-box-img">
                                    <?php 
                                    //Check whether image available or not
                                    if($hinhAnh=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>assets/images/tours/<?php echo $hinhAnh; ?>" alt="" class="img-fluid w-100" style="height: 250px">
                                        <?php
                                    }
                ?>
                                
                            </div>
                            <div class="tour-menu-box-desc text-center mt-3">
                                <h4><?php echo $tenTour; ?></h4>
                                <p>Mã: <?php echo $maTour; ?></p>
                                <p><i class="bi bi-geo-alt me-3"></i>Khởi Hành: <?php echo $diemKhoiHanh; ?> <span>-> Kết Thúc: <?php echo $diemKetThuc; ?></span></p>
                                <p><i class="bi bi-calendar3 me-3"></i></i>Bắt Đầu: <?php echo $ngayKhoiHanh ?><span>-> Kết Thúc: <?php echo $ngayKetThuc ?></span> </p>
                                <p><i class="bi bi-clock me-3"></i>Thời Gian: <?php  echo $day.' ngày'?></p>
                                <p><i class="bi bi-flag me-3"></i>Loại Hình: <?php echo $loaiHinh ?></p>
                                
                                <a href="<?php echo SITEURL; ?>user/bookTour.php?MaTour=<?php echo $maTour; ?>" class="btn btn-primary">Xem thêm chi tiết</a>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                    }
                }else
                {
                    //Tour Not Available 
                    echo "<div class='error'>Tour not available.</div>";
                }
                
                mysqli_close($conn);
                
                ?>
                </div>
                
            </div>
            
            <p class="text-center mt-3">
                <a href="user/categories.php" aria-expanded="false" data-toggle="collapse" class="btn text-primary">Xem Tất Cả</a>
            </p>
        </section>
        <!-- Tour Menu Section Ends Here -->
    </main>

  <footer>
    <div class="col-md text-center text-muted bg-light mt-3">
      &copy;Nhom 2 12/2021
      <h4>ConTact</h4>
      <div class="col-md text-center text-muted bg-light">
          <a href="">Dương Văn Công</a>
          <a href="">Lê Công Minh</a>
          <a href="">Lê Đình Minh</a>
      </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>

</html>