<?php
include "../../../config/constants.php";
// Check info partner before edit
if (isset($_POST['phone'])) { // Check phone number
    // Get current phone number
    $sql_get_current_info = "SELECT * FROM doitac Where maCongTy = '{$_SESSION['partnerAccount']}'";
    $current_phone = $conn->query($sql_get_current_info)->fetch_assoc()['soDienThoai'];
    //
    $sql = "SELECT * FROM doitac WHERE soDienThoai = '{$_POST['phone']}'";
    $result = $conn->query($sql);
    $phone =  $result->fetch_assoc()['soDienThoai'];
    if ($phone == $current_phone) {  // Phone number is exists
        echo "this";
    } else {
        echo $phone;
    }
} elseif (isset($_POST['email'])) { // Check email
    // Get current email address
    $sql_get_current_info = "SELECT * FROM doitac Where maCongTy = '{$_SESSION['partnerAccount']}'";
    $current_email = $conn->query($sql_get_current_info)->fetch_assoc()['email'];
    //
    $sql = "SELECT * FROM doitac WHERE email = '{$_POST['email']}'";
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
