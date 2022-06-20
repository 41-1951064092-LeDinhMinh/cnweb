<?php
include "../../../config/constants.php";

if(isset($_POST['partnerID'])){
    $partnerID = $_POST['partnerID'];
    try{
        $sqlActivate = "UPDATE doitac SET tinhTrang=1 where maCongTy='$partnerID'";
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