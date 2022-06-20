<?php
include "../../../config/constants.php";

if(isset($_POST['adminID'])){
    $adminID = $_POST['adminID'];
    try{
        // Delete from database
        $sqlDelete = "DELETE from nhanvien Where maNhanVien='$adminID'";
        $res_del = $conn->query($sqlDelete);

        if($res_del){ // If success
            echo "success";
        }
    }
    catch(Exception){
        echo "false";
    }
}

?>