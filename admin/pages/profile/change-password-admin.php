<?php
include "../../../config/constants.php";

if (isset($_POST['btn-edit-pass-admin'])) {
    $pass_old = $_POST['edit-admin-pass-old'];
    $sql_get_pass_old = "SELECT * FROM nhanvien Where username = '{$_SESSION['adminAccount']}'";
    $sqlPassOld = $conn->query($sql_get_pass_old)->fetch_assoc()['password'];

    if (password_verify($pass_old, $sqlPassOld)) {
        // Password and password repeat are checked by javascript, no need to check again
        $pass_new = password_hash($_POST['edit-admin-pass-new'], PASSWORD_DEFAULT);
        $sql_edit_admin = "UPDATE nhanvien SET password = '$pass_new' WHERE username = '{$_SESSION['adminAccount']}'";
        $edit_admin = $conn->query($sql_edit_admin);
        if ($edit_admin) {
            $_SESSION['editAdminPassSuccess'] = $_SESSION['adminAccount'];
            echo $_SESSION['editAdminPassSuccess'];
        }
    } else {
        $_SESSION['editAdminPassError'] = "Mật khẩu cũ không khớp";
    }

    header("location: index.php");
} else {
    header("location:" . SITEURL . "admin/");
}
