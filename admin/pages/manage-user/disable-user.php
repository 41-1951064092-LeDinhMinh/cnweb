<?php
include "../../../config/constants.php";

if(isset($_POST['userID'])){
    $userID = $_POST['userID'];

    try{
        $sqlDisable = "UPDATE nguoidung SET tinhTrang=2 where maNguoiDung='$userID'";
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