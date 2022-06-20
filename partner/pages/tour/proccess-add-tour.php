<?php
include "../../../config/constants.php";


if (isset($_POST['btnAddTour'])) {
    // Get data
    $tourTitle = $_POST['add-tour-title'];
    $tourType = $_POST['add-tour-type'];
    $tourID = "";
    $tourImage = "";
    $tourPlaceDeparture = $_POST['add-tour-place-departure'];
    $tourPlaceDestination = $_POST['add-tour-place-destination'];
    $tourDepartureDay = $_POST['add-tour-departure-day'];
    $tourEndDate = $_POST['add-tour-end-date'];
    $tourDescription = $_POST['add-tour-description'];
    $statusMsgUploadImg = '';


    // Auto generation tourID if not set
    if ($_POST['add-tour-id'] != "") {
        $tourID = "TOUR-00".strtoupper($_POST['txtTourID']);
    } else {
        $temp_word = array_merge(range('A', 'Z'));
        shuffle($temp_word);
        $tourID = "TOUR-00".rand(100,999).substr(implode($temp_word), 0, 5);
    }

    


    // Process upload tour image
    if(isset($_FILES['add-tour-image']) && !empty($_FILES["add-tour-image"]["name"])){
        $targetDir = "../../../assets/images/tours/";
        $fileName_tmp = basename($_FILES["add-tour-image"]["name"]);
        $fileType = pathinfo($fileName_tmp,PATHINFO_EXTENSION);
        $tourImage = $tourID.".".$fileType;
        $targetFilePath = $targetDir . $tourImage;
        $allowTypes = array('jpg','png','jpeg');
        if(in_array($fileType, $allowTypes)){
            if(move_uploaded_file($_FILES["add-tour-image"]["tmp_name"], $targetFilePath)){
                echo "Thành công";
                }else{
                    $statusMsgUploadImg = "Đã xảy ra lỗi khi upload ảnh!.";
                }
        }else{
            $statusMsgUploadImg = 'Chỉ chấp nhận file JPG, JPEG, PNG.';
        }
    }

    //Insert to database
    $sql_add_tour = "INSERT INTO `tour` (`id`, `maTour`, `tenTour`, `hinhAnh`, `ngayKhoiHanh`, `ngayKetThuc`, `diemKhoiHanh`, `diemKetThuc`, `loaiHinh`, `moTa`, `maCongTy`,`tinhTrang`) VALUES (NULL, '$tourID', '$tourTitle', '$tourImage', '$tourDepartureDay', '$tourEndDate', '$tourPlaceDeparture', '$tourPlaceDestination', '$tourType', '$tourDescription', '{$_SESSION['partnerAccount']}','1');";
    $insert_tour = $conn->query($sql_add_tour);

    // Insert tour price to database
    $tourAdultPrice = $_POST['add-tour-adult'];
    $tourAdultPriceDescr = "Trên 12 tuổi";
    $sql_adult_price = "INSERT INTO `giatour` (`maTour`, `doTuoi`, `moTa`, `gia`, `donVi`) VALUES ('$tourID', '2', '$tourAdultPriceDescr', '$tourAdultPrice', 'VNĐ');";
    $insert_price_adult = $conn->query($sql_adult_price);
    
    if (isset($_POST['add-tour-children'])) {   // If set price for children
        $tourChildrenPrice = $_POST['add-tour-children'];
        $tourChildrenPriceDescr = "4 - 12 tuổi";
        $sql_children_price = "INSERT INTO `giatour` (`maTour`, `doTuoi`, `moTa`, `gia`, `donVi`) VALUES ('$tourID', '1', '$tourChildrenPriceDescr', '$tourChildrenPrice', 'VNĐ');";
        $insert_price_children = $conn->query($sql_children_price);
    }
    if (isset($_POST['add-tour-older'])) {  // If set price for older
        $tourOlderPrice = $_POST['add-tour-older'];
        $tourOlderPriceDescr = "Trên 60 tuổi";
        $sql_older_price = "INSERT INTO `giatour` (`maTour`, `doTuoi`, `moTa`, `gia`, `donVi`) VALUES ('$tourID', '3', '$tourOlderPriceDescr', '$tourOlderPrice', 'VNĐ');";
        $insert_price_older = $conn->query($sql_older_price);
    }

    if($insert_tour){
        $_SESSION['addTourSuccess'] = $tourID;
    }


    header("location: add-tour.php");

} else {
    header("location:" . SITEURL . "partner/");
}

?>