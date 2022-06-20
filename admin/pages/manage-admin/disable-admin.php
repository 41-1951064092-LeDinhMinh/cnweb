<?php
include "../../../config/constants.php";

if(isset($_POST['adminID'])){
    $adminID = $_POST['adminID'];
    try{
        $sqlDisable = "UPDATE nhanvien SET tinhTrang=2 where maNhanVien='$adminID'";
        $conn->query($sqlDisable);
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