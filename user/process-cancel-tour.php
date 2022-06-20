<!-- File xử lý hủy tour -->
<?php
include '../constants.php';
?>
<?php
    // Trước khi cho người dùng xâm nhập vào bên trong
    // Phải kiểm tra THẺ LÀM VIỆC
    if(!isset($_SESSION['loginAccount'])){
        header("location:".SITEURL);
    }

    $maPhieuTour = $_GET['MaPhieuTour'];

    // Bước 02: Thực hiện truy vấn

    // Xóa phiếu tour thì phải xóa cả chi tiết giá kèm theo vì có ràng buộc

    $sql = "DELETE FROM chitietgia WHERE maPhieuTour = '$maPhieuTour'";
    $res = mysqli_query($conn, $sql);

    $sql1 = "DELETE FROM phieudangkitour WHERE maPhieuTour = '$maPhieuTour'";
    $res1 = mysqli_query($conn, $sql1);

    if($res1==true)
    {
        //Nếu xóa thành công
        $_SESSION['canceled'] = "<div class='success text-center' style='color:green;font-size:40px'>Chúc mừng bạn hủy Tour thành công</div>";
        header("location:".SITEURL.'user/userInfo.php');
    }

    // Bước 03: Đóng kết nối
    mysqli_close($conn);
?>