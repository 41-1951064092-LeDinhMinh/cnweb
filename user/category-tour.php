<!-- Trang lấy thông tin tour với mã tour được lấy từ trang chủ phần tour suggest -->
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
  <title>Tra cứu tour</title>
</head>

<body>
<?php
    include "partials/header.php";
    ?>
    <main>
        <?php 
            //Lấy ra mã tour từ phần gợi ý
            if(isset($_GET['category_id']))
            {
                $category_id = $_GET['category_id'];

                // Lấy ra tên tour
                $sql = "SELECT tenTour FROM tour WHERE maTour='$category_id'";

                $res = mysqli_query($conn, $sql);

                $row = mysqli_fetch_assoc($res);
                $category_title = $row['tenTour'];
            }
            else
            {
                //Không có thì trở về trang chủ
                header('location:'.SITEURL);
            }
        ?>


        <!-- thông tin lấy được từ phần suggest -->
        <section class="tour-search text-center pt-5">
            <div class="container mt-5">
                
                <h2>Tour Du Lịch : "<?php echo $category_title; ?>"</a></h2>

            </div>
        </section>
        <!-- kết thúc -->



        <!-- Bắt đầu phần thông tin tour -->
        <section class="tour-menu container mt-5">
            <h2 class="text-center">Tour Menu</h2>
            <div class="row">

                <?php 
                
                    //SQL lấy thông tin tour
                    $sql2 = "SELECT * FROM tour WHERE maTour='$category_id'";

                    $res2 = mysqli_query($conn, $sql2);

                    $count2 = mysqli_num_rows($res2);

                    //Kiểm tra xem tour có tồn tại
                    if($count2>0)
                    {
                        //tour is Available
                        while($row2=mysqli_fetch_assoc($res2))
                        {
                            $maTour = $row2['maTour'];
                            $tenTour = $row2['tenTour'];
                            $moTa = $row2['moTa'];
                            $hinhAnh = $row2['hinhAnh'];
                            $diemKhoiHanh = $row2['diemKhoiHanh'];
                            $diemKetThuc = $row2['diemKetThuc'];
                            $ngayKhoiHanh = $row2['ngayKhoiHanh'];
                            $ngayKetThuc = $row2['ngayKetThuc'];
                            $loaiHinh = $row2['loaiHinh'];
                            $first_date = strtotime($ngayKhoiHanh);
                            $second_date = strtotime($ngayKetThuc);
                            $datediff = abs($first_date - $second_date);
                            $day = floor($datediff / (60*60*24));
                            ?>
                            
                            <div class="tour-menu-box p-3 border border-success m-2 rounded">
                                <div class="row">
                                <div class="tour-menu-img col-md-4">
                                    <?php 
                                        if($hinhAnh=="")
                                        {
                                            //Nếu không có hình ảnh
                                            echo "<div class='error'>Image not Available.</div>";
                                        }
                                        else
                                        {
                                            //Có hình ảnh
                                            ?>
                                            <img src="<?php echo SITEURL; ?>assets/images/tours/<?php echo $hinhAnh; ?>" alt="" class="img-fluid" style="width:100%">
                                            <?php
                                        }
                                    ?>
                                    
                                </div>

                                <div class="tour-menu-desc col-md-8">
                                    <h4><?php echo $tenTour; ?></h4>
                                    <p>Mã: <?php echo $maTour; ?></p>
                                    <p><i class="bi bi-geo-alt me-3"></i><span class="text-success">Khởi Hành: <?php echo $diemKhoiHanh; ?></span> <span class="text-danger">-> Kết Thúc: <?php echo $diemKetThuc; ?></span></p>
                                    <p class="text-warning"><i class="bi bi-flag me-3"></i>Loại Hình: <?php echo $loaiHinh ?></p>
                                    <p><i class="bi bi-calendar3 me-3"></i>Bắt Đầu: <?php echo $ngayKhoiHanh ?><span>-> Kết Thúc: <?php echo $ngayKetThuc ?></span> </p>
                                    <p><i class="bi bi-clock me-3"></i>Thời Gian: <?php  echo $day.' ngày'?></p>
                                    <p class="tour-detail">
                                        Mô tả: 
                                        <?php echo $moTa; ?>
                                    </p>
                                    <br>

                                    <a href="<?php echo SITEURL; ?>user/bookTour.php?MaTour=<?php echo $maTour; ?>" class="btn btn-primary">Đặt Tour Ngay</a>
                                </div>
                            </div>
                            </div>

                            <?php
                        }
                    }
                    else
                    {
                        //Tour không tồn tại
                        echo "<div class='error'>Tour không tồn tại.</div>";
                    }
                    
                mysqli_close($conn);

                ?>
               

            </div>

        </section>
        <!-- Kết thúc -->


  </main>

  <?php
    include "partials/footer.php";
    ?>
</body>

</html>