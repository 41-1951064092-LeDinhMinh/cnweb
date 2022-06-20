<?php
include "../../../config/constants.php";

if (isset($_POST['btn-edit-pass-partner'])) {
    $pass_old = $_POST['edit-partner-pass-old'];
    $sql_get_pass_old = "SELECT * FROM doitac Where maCongTy = '{$_SESSION['partnerAccount']}'";
    $sqlPassOld = $conn->query($sql_get_pass_old)->fetch_assoc()['password'];

    if (password_verify($pass_old, $sqlPassOld)) {
        // Password and password repeat are checked by javascript, no need to check again
        $pass_new = password_hash($_POST['edit-partner-pass-new'], PASSWORD_DEFAULT);
        $sql_edit_partner = "UPDATE doitac SET password = '$pass_new' WHERE maCongTy = '{$_SESSION['partnerAccount']}'";
        $edit_partner = $conn->query($sql_edit_partner);
        if ($edit_partner) {
            $_SESSION['editPartnerPassSuccess'] = $_SESSION['partnerAccount'];
        }
    } else {
        $_SESSION['editPartnerPassError'] = "Mật khẩu cũ không khớp";
    }

    header("location: index.php");
} else {
    header("location:" . SITEURL . "partner/");
}
