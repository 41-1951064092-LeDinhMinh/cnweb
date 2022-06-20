<?php
include "../../../config/constants.php";

if(isset($_POST['partnerID'])){
    $partnerID = $_POST['partnerID'];
    try{
        // Set status
        $sqlDisable = "UPDATE doitac SET tinhTrang=2 where maCongTy='$partnerID'";
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