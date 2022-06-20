<?php
include "../../../config/constants.php";

if(isset($_POST['tourID'])){
    $tourID = $_POST['tourID'];
    try{
        //
        $sqlDelete1 = "DELETE from chitietgia Where maTour='$tourID'";
        $res_del1 = $conn->query($sqlDelete1);
        //
        $sqlDelete2 = "DELETE from phieudangkitour Where maTour='$tourID'";
        $res_del2 = $conn->query($sqlDelete2);
        //
        $sqlDelete3 = "DELETE from giatour Where maTour='$tourID'";
        $res_del3 = $conn->query($sqlDelete3);
        //
        $sqlDelete4 = "DELETE from tour Where maTour='$tourID'";
        $res_del4 = $conn->query($sqlDelete4);
        //
        if($res_del4){
            echo "success";
        }
    }
    catch(Exception){
        echo "false";
    }
}

?>