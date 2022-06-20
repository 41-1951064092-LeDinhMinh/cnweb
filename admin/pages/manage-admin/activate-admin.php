<?php
include "../../../config/constants.php";

if(isset($_POST['adminID'])){
    // Get data
    $adminID = $_POST['adminID'];
    try{
        $sqlActivate = "UPDATE nhanvien SET tinhTrang=1 where maNhanVien='$adminID'";
        $conn->query($sqlActivate);
        if($conn -> affected_rows == 1){
            echo "success";
        }
        else{
            echo "false";
        }
    }
    catch(Exception){
        echo "false";
    }
}



?>