<?php
include "../../../config/constants.php";

if(isset($_POST['billID'])){
    $billID = $_POST['billID'];
    try{
        // Delete from database
        $sqlDelete1 = "DELETE from chitietgia Where maPhieuTour='$billID'";
        $res_del1 = $conn->query($sqlDelete1);
        //
        $sqlDelete2 = "DELETE from phieudangkitour Where maPhieuTour='$billID'";
        $res_del2 = $conn->query($sqlDelete2);

        if($res_del2){
            echo "success";
        }
    }
    catch(Exception){
        echo "false";
    }
}

?>