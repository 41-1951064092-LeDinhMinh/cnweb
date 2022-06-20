<?php
include "../../../config/constants.php";

if(isset($_POST['btn-add-admin'])){
    $id = $_POST['add-admin-id'];
    $name = $_POST['add-admin-name'];
    $username = $_POST['add-admin-username'];
    $birthday = $_POST['add-admin-birthday'];
    $gender = $_POST['add-admin-gender'];
    $phone = $_POST['add-admin-phone'];
    $email = $_POST['add-admin-email'];

    //
    $pass = $_POST['add-admin-pass']; // Password and password repeat are checked by javascript, no need to check again
    $pass_repeat = $_POST['add-admin-pass-repeat']; 
    $pass_hash = password_hash($pass, PASSWORD_DEFAULT); 

    //
    $sql_insert_admin = "INSERT INTO nhanvien VALUES (NULL, '$id', '$name', NULL, '$birthday', '$gender', '$phone', '$email', '$username', '$pass_hash', '1');";
    $insert_admin = $conn->query($sql_insert_admin);
    //
    if($insert_admin){
        $_SESSION['addAdminSuccess'] = $id;
    }


    header("location: add-admin.php");

}
else {
    header("location:" . SITEURL . "admin/");
}

?>
