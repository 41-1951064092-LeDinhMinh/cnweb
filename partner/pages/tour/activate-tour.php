<?php
include "../../../config/constants.php";

if(isset($_POST['tourID'])){
    $tourID = $_POST['tourID'];
    try{
        $sqlActivate = "UPDATE tour SET tinhTrang=1 where maTour='$tourID'";
        if($conn->query($sqlActivate)){
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