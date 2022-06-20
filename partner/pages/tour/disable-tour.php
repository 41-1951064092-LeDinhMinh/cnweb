<?php
include "../../../config/constants.php";

if(isset($_POST['tourID'])){
    $tourID = $_POST['tourID'];

    try{
        $sqlDisable = "UPDATE tour SET tinhTrang=2 where maTour='$tourID'";
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