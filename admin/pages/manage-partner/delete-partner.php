<?php
include "../../../config/constants.php";

if(isset($_POST['partnerID'])){
    $partnerID = $_POST['partnerID'];

    try{
        // Delete from table chitietgia
        $sqlDelete1 = "DELETE FROM chitietgia WHERE maPhieuTour in (SELECT maPhieuTour FROM phieudangkitour,tour WHERE phieudangkitour.maTour = tour.maTour AND tour.maCongTy = '$partnerID')";
        $res_del1 = $conn->query($sqlDelete1);
        // Delete from table phieudangkitour
        $sqlDelete2 = "DELETE FROM phieudangkitour WHERE maTour in (SELECT maTour FROM tour WHERE maCongTy = '$partnerID')";
        $res_del2 = $conn->query($sqlDelete2);
        // Delete from table giatour
        $sqlDelete3 = "DELETE FROM giatour WHERE maTour in (SELECT maTour FROM tour WHERE maCongTy = '$partnerID')";
        $res_del3 = $conn->query($sqlDelete3);
        // Delete from table tour
        $sqlDelete4 = "DELETE FROM tour WHERE maCongTy ='$partnerID'";
        $res_del4 = $conn->query($sqlDelete4);
        // Delete from table doitac
        $sqlDelete5 = "DELETE FROM doitac WHERE maCongTy ='$partnerID'";
        $res_del5 = $conn->query($sqlDelete5);

        if($res_del5){ // If success
            echo "success";
        }
    }
    catch(Exception){
        echo "false";
    }
}

?>