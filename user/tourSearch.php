<!-- Tìm kiếm tour cỏ bản -->
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
  <title>Tìm Kiếm</title>
</head>

<body>
    <?php
    include "partials/header.php";
    ?>

  <main>
    <!-- Tour search start -->
    <section class="tour-search text-center mt-5 pt-5">
        <div class="container">
        <?php 

                //Get the Search Keyword
                // $search = $_POST['search'];
                $search = mysqli_real_escape_string($conn, $_POST['search1']);
            
            ?>


        <h2 class="text-center">Tour theo yêu cầu của bạn: <span>"
            <?php echo $search; ?>"
            </span></h2>

        </div>
    </section>
    <!--Tour search end -->



    <!-- Tour MEnu Section Starts Here -->
    <section class="tour-menu container mt-3">
        <h2 class="text-center">Tour Menu</h2>
        <div class="row">

            <?php 

                //SQL Query to Get tours based on search keyword
                $sql = "SELECT * FROM tour WHERE diemKhoiHanh LIKE '%$search%' OR diemKetThuc LIKE '%search%' OR tenTour LIKE '%$search%' OR loaiHinh like '%search%'";
                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //Check whether tours available of not
                if($count>0)
                {
                    //tours Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the details
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

                        <div class="tour-menu-box p-3 border border-success m-2 rounded">
                            <div class="row">
                                <div class="col-md-4 tour-menu-img">
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
                                        <img src="<?php echo SITEURL; ?>assets/images/tours/<?php echo $hinhAnh; ?>" alt="" class="img-fluid" style="width:100%">
                                        <?php
                                    }
                ?>
                                
                            </div>
                            <div class="col-md-8 tour-menu-desc">
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
                    //Tour Not Available
                    echo "<div class='error'>Hiện không có tour du lịch này.</div>";
                }


            
                mysqli_close($conn);
            ?>

        </div>

    </section>
    <!-- Tour Menu Section Ends Here -->



  </main>

  <?php
    include "partials/footer.php";
    ?>
</body>

</html>