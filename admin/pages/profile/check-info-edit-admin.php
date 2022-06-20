<?php
include "../../../config/constants.php";
// Check info admin before edit

if (isset($_POST['accName'])) { // Check admin account name
    $sql = "SELECT * FROM nhanvien WHERE username = '{$_POST['accName']}'";
    $result = $conn->query($sql);
    $accName = $result->fetch_assoc()['username'];

    if ($accName == $_SESSION['adminAccount']) { // Check new account name and current account name
        echo "this";
    } else {
        echo $accName;
    }
} elseif (isset($_POST['phone'])) { // Check phone number
    // Get current phone number
    $sql_get_current_info = "SELECT * FROM nhanvien Where username = '{$_SESSION['adminAccount']}'";
    $current_phone = $conn->query($sql_get_current_info)->fetch_assoc()['soDienThoai'];
    //
    $sql = "SELECT * FROM nhanvien WHERE soDienThoai = '{$_POST['phone']}'";
    $result = $conn->query($sql);
    $phone =  $result->fetch_assoc()['soDienThoai'];
    if ($phone == $current_phone) { // Phone number is exists
        echo "this";
    } else {
        echo $phone;
    }
} elseif (isset($_POST['email'])) { // Check email
    // Get current email address
    $sql_get_current_info = "SELECT * FROM nhanvien Where username = '{$_SESSION['adminAccount']}'";
    $current_email = $conn->query($sql_get_current_info)->fetch_assoc()['email'];
    //
    $sql = "SELECT * FROM nhanvien WHERE email = '{$_POST['email']}'";
    $result = $conn->query($sql);
    $email = $result->fetch_assoc()['email'];
    if ($email == $current_email) { // Email address number is exists
        echo "this";
    } else {
        echo $email;
    }
} else {
    header("location:" . SITEURL . "admin/");
}
