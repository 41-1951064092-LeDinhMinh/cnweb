<?php
include "../../../config/constants.php";

if(isset($_POST['userID'])){
    $userID = $_POST['userID'];

    try{
        // Delete from table chitietgia
        $sqlDelete1 = "DELETE FROM chitietgia WHERE maPhieuTour in (SELECT maPhieuTour FROM phieudangkitour WHERE maNguoiDung = '$userID')";
        $res_del1 = $conn->query($sqlDelete1);
        // Delete from table phieudangkitour
        $sqlDelete2 = "DELETE from phieudangkitour Where maNguoiDung='$userID'";
        $res_del2 = $conn->query($sqlDelete2);
        // Delete from table nguoidung
        $sqlDelete3 = "DELETE from nguoidung Where maNguoiDung='$userID'";
        $res_del3 = $conn->query($sqlDelete3);

        if($res_del3){ // If success
            echo "success";
        }
    }
    catch(Exception){
        echo "false";
    }
}

?>