<?php include('../constants.php'); ?>
<?php
    // Trước khi cho người dùng xâm nhập vào bên trong
    // Phải kiểm tra THẺ LÀM VIỆC
    session_start();
    if(!isset($_SESSION['loginAccount'])){
        header("location:".SITEURL);
    }
    // if(isset($_SESSION['partnerAccount'])){
    //     header("location:".SITEURL.'partner/index.php');
    // }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="../assets/css/userStyle.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <title>Trang chủ</title>
</head>

<body>
    <?php
    require "partials/header.php";
    ?>

    <main>
        <!-- Main page img -->
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../assets/images/tours/main.jpg" class="d-block w-100" alt="slider" style="height: 500px;">
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

                //Lấy ra 3 tour du lịch từ CSDL
                $sql1 = "SELECT distinct loaiHinh,maTour,hinhAnh FROM tour LIMIT 3";
                //Execute the Query
                $res1 = mysqli_query($conn, $sql1);
                $count1 = mysqli_num_rows($res1);

                if($count1>0)
                {
                    //CAtegories Available
                    while($row=mysqli_fetch_assoc($res1))
                    {
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
                    echo "<div class='error'>Cơ sở dữ liệu hiện chưa có tour du lịch nào</div>";
                }
            ?>
            </div>

            </section>
        </div>

        <!-- carousel Một vài tour đẹp gợi ý cho khách hàng-->
        <div class="container-fluid mt-5">
            <div class="row">
                <div id="carouselExampleCaptions" class="carousel slide mt-3" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
                    </div>
        
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src='../assets/images/tours/vinh-ha-long.jpg' class="d-block w-100 img-fluid" alt="Ha Noi Mien Bac" style="max-height: 500px;">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Vịnh Hạ Long</h5>
                                <p>Kỳ Quan Thiên Nhiên Thế Giới</p>
                            </div>
                        </div>
        
                        <div class="carousel-item">
                            <img src='../assets/images/tours/ho_chi_minh_city_skyline.jpg' class="d-block w-100" alt="Ho Chi Minh" style="max-height: 500px;">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Hồ Chí Minh</h5>
                                <p>Thành Phố Mang Tên Bác</p>
                            </div>
                        </div>
        
                        <div class="carousel-item">
                            <img src='../assets/images/tours/quang_truong_da_lat.jpg' class="d-block w-100" alt="Da Lat" style="max-height: 500px;">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Đà lạt</h5>
                                <p>Biểu Tượng Thành Phố Ngàn Hoa</p>
                            </div>
                        </div>
        
                        <div class="carousel-item">
                            <img src='../assets/images/tours/phong_nha_ke_bang.jpg' class="d-block w-100" alt="Phong Nha Ke Bang" style="max-height: 500px;">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Phong Nha Kẻ Bàng</h5>
                                <p>Vẻ Đẹp Hùng Vỹ</p>
                            </div>
                        </div>
        
                        <div class="carousel-item">
                            <img src='../assets/images/tours/sapa.jpg' class="d-block w-100" alt="Lao Cai" style="max-height: 500px;">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Sapa - Lào Cai</h5>
                                <p>Thành Phố Sương Mù</p>
                            </div>
                        </div>
        
                        <div class="carousel-item">
                            <img src='../assets/images/tours/phu_quoc.jpg' class="d-block w-100" alt="Phu Quoc" style="max-height: 500px;">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Phú Quốc</h5>
                                <p>Bãi Biển Xanh Thơ Mộng</p>
                            </div>
                        </div>
                    </div>
        
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Tìm kiếm tour cơ bản -->
        <section class="search-tour mt-5" id="search-tour"> 
            <div class="text-center search-form">
                <div class="normal-search text-center">
                    <form action="tourSearch.php" method="POST">
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
    
        <!-- Lấy ra 8 tour đầu tiên có trong cơ sở dữ liệu -->
        <section class="tour-menu mt-5">
            <div class="container">
                <h2 class="text-center pt-3">Các Tour hiện có</h2>
                <div class="row">
                    
                    <?php 
                
                //Getting tours from Database that are active 
                //SQL Query
                $sql = "SELECT tour.maTour,tour.tenTour,tour.moTa,tour.hinhAnh,tour.diemKhoiHanh,tour.diemKetThuc,
                tour.ngayKhoiHanh,tour.ngayKetThuc,tour.loaiHinh,doitac.maCongTy,doitac.tenCongTy,doitac.email
                 FROM tour,doitac where tour.tinhTrang='1' and tour.maCongTy = doitac.maCongTy LIMIT 8";
                
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
                        $maCongTy = $row['maCongTy'];
                        $tenCongTy = $row['tenCongTy'];
                        $email = $row['email'];
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
                                <p><i class="bi bi-geo-alt me-3"></i><span class="text-success">Khởi Hành: <?php echo $diemKhoiHanh; ?></span> <span class="text-danger">-> Kết Thúc: <?php echo $diemKetThuc; ?></span></p>
                                <p class="text-warning"><i class="bi bi-flag me-3"></i>Loại Hình: <?php echo $loaiHinh ?></p>
                                <p><i class="bi bi-calendar3 me-3"></i></i>Bắt Đầu: <?php echo $ngayKhoiHanh ?><span>-> Kết Thúc: <?php echo $ngayKetThuc ?></span> </p>
                                <p><i class="bi bi-clock me-3"></i>Thời Gian: <?php  echo $day.' ngày'?></p>
                                <p><i class="bi bi-building me-3"></i>Mã công ty: <?php echo $maCongTy ?></p>
                                <p><i class="bi bi-building me-3"></i>Tên công ty: <?php echo $tenCongTy ?></p>
                                <p><i class="bi bi-envelope me-3"></i>Email liên hệ: <?php echo $email ?></p>
                                
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
                <a href="categories.php" aria-expanded="false" data-toggle="collapse" class="btn text-primary">Xem Tất Cả</a>
            </p>
        </section>
        <!-- Kết thúc -->


        <script>
            $(document).ready(function () {
                $(".more-detail").click(function () {
                    $('.detail-search').show();
                    $(".more-detail").hide();
                    $(".submit").hide();
                    $(".normal-search").hide();
                });
                $(".more-detail-close").click(function () {
                    $('.detail-search').hide();
                    $(".more-detail").show();
                    $(".submit").show();
                    $(".normal-search").show();
                });
            });
        </script>
    </main>
    
    <?php
    include "partials/footer.php";
    ?>
</body>

</html>