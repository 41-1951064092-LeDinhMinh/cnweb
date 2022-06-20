<?php
include "../../../config/constants.php";


if(isset($_POST['btn-edit-partner'])){
   
    $username = $_SESSION['adminAccount'];
    //echo $username;

    // Get new data
    $newName = $_POST['edit-partner-name'];
    $newPhone = $_POST['edit-partner-phone'];
    $newEmail = $_POST['edit-partner-email'];
    $newAddr = $_POST['edit-partner-addr'];

    // Update data
    $sql_update_partner = "UPDATE doitac SET tenCongTy = '$newName', soDienThoai = '$newPhone', email = '$newEmail', diaChi = '$newAddr' WHERE maCongTy = '{$_SESSION['partnerAccount']}'";
    $result_update_partner = $conn->query($sql_update_partner);


    // Check result
    if($result_update_partner){
        $_SESSION['editPartnerSuccess'] = $_SESSION['partnerAccount'];
        // $_SESSION['partnerAccount'] = ; // Set new admin account name to SESSION
    }

    header("location: index.php");

}
else {
    header("location:" . SITEURL . "partner/");
}

?>
