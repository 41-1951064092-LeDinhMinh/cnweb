<?php
include "../../../config/constants.php";

if(isset($_POST['userID'])){
    $userID = $_POST['userID'];

    try{
        // Get status

        $conn->query("SELECT * FROM nguoidung where maNguoiDung='$userID' AND thoiGianXacMinhEmail IS NOT NULL");
        
        $msg="";
        if($conn->affected_rows == 1){
            $msg.="verified ";
            $conn->query("UPDATE nguoidung SET tinhTrang=1 where maNguoiDung='$userID'");
        }
        else{
            $msg.="not verified ";
            $conn->query("UPDATE nguoidung SET tinhTrang=0 where maNguoiDung='$userID'");
        }
        
        if($conn -> affected_rows == 1){
            $msg.="true";
        }
        else{
            $msg.="false";
        }
        echo $msg;
    }
    catch(Exception){
        echo "false";
    }
}



?>