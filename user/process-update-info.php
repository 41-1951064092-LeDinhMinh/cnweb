<?php
include '../constants.php';
?>
<?php
    // Trước khi cho người dùng xâm nhập vào bên trong
    // Phải kiểm tra THẺ LÀM VIỆC
    session_start();
    if(!isset($_SESSION['loginAccount'])){
        header("location:".SITEURL);
    }

    // Lấy ra mã người dùng và thông tin của các trường mà người dùng muốn sửa
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $text = $_POST['text'];
        $column_name = $_POST['column_name'];
    }
    
    // Thực hiện truy vấn cập nhật dữ liệu lên database
    $sql = "UPDATE nguoidung SET $column_name='$text' where maNguoiDung = '$id' ";
    echo $sql;

    $ketqua = mysqli_query($conn,$sql);
    

    mysqli_close($conn);

?>