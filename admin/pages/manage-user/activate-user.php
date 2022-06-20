<?php
include "../../../config/constants.php";

if(isset($_POST['userID'])){
    $userID = $_POST['userID'];
    try{
        $sqlActivate = "UPDATE nguoidung SET tinhTrang=1 where maNguoiDung='$userID'";
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