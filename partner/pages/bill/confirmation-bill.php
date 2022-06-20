<?php
include "../../../config/constants.php";

if(isset($_POST['billID'])){
    $billID = $_POST['billID'];
    try{

        $sqlConfirmation = "UPDATE phieudangkitour SET tinhTrang = 1 Where maPhieuTour='$billID'";
        $res = $conn->query($sqlConfirmation);

        if($res){
            echo "success";
        }
    }
    catch(Exception){
        echo "false";
    }
}

?>