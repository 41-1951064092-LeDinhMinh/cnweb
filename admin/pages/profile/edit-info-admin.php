<?php
include "../../../config/constants.php";


if(isset($_POST['btn-edit-admin'])){
   
    $username = $_SESSION['adminAccount'];
    //echo $username;

    // Get new data
    $newName = $_POST['edit-admin-name'];
    $newUsername = $_POST['edit-admin-username'];
    $newBirthday = $_POST['edit-admin-birthday'];
    $newGender = $_POST['edit-admin-gender'];
    $newPhone = $_POST['edit-admin-phone'];
    $newEmail = $_POST['edit-admin-email'];

    // Update data
    $sql_update_admin = "UPDATE nhanvien SET hoVaTen = '$newName', ngaySinh = '$newBirthday', gioiTinh = '$newGender', soDienThoai = '$newPhone', email = '$newEmail', username = '$newUsername' WHERE username = '$username'";
    $result_update_admin = $conn->query($sql_update_admin);


    // Check result
    if($result_update_admin){
        $_SESSION['editAdminSuccess'] = $newUsername;
        $_SESSION['adminAccount'] = $newUsername; // Set new admin account name to SESSION
    }

    header("location: index.php");

}
else {
    header("location:" . SITEURL . "admin/");
}

?>
