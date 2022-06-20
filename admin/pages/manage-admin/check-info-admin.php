<?php
include "../../../config/constants.php";
// Check info admin before create
if(isset($_POST['id'])){ // Check id
    $sql = "SELECT * FROM nhanvien WHERE maNhanVien = '{$_POST['id']}'";
    $result = $conn->query($sql);
    echo $result->fetch_assoc()['maNhanVien'];
}
elseif(isset($_POST['accName'])){ // Check admin account name
    $sql = "SELECT * FROM nhanvien WHERE username = '{$_POST['accName']}'";
    $result = $conn->query($sql);
    echo $result->fetch_assoc()['username'];
}
elseif(isset($_POST['phone'])){ // Check phone number
    $sql = "SELECT * FROM nhanvien WHERE soDienThoai = '{$_POST['phone']}'";
    $result = $conn->query($sql);
    echo $result->fetch_assoc()['soDienThoai'];
}
elseif(isset($_POST['email'])){// Check email
    $sql = "SELECT * FROM nhanvien WHERE email = '{$_POST['email']}'";
    $result = $conn->query($sql);
    echo $result->fetch_assoc()['email'];
}
else{
    header("location:" . SITEURL . "admin/");
}
?>