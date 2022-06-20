<?php
include "../../../config/constants.php";

if(isset($_POST['userID'])){
    $userID = $_POST['userID'];
    //$status = $_POST['status'];

    $sql = "DELETE FROM nguoidung where maNguoiDung='$userID'";

    try{
        $conn->query($sql);
        if($conn -> affected_rows == 1){
            echo "true";
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