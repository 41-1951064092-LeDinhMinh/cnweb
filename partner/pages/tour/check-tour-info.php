<?php
include "../../../config/constants.php";

if(isset($_POST['tourID'])){
    $tourID = $_POST['tourID'];
    $msg = "";
    $sql_tour_id = "SELECT * from tour where maTour = '$tourID'";
    $res_tourid = $conn->query($sql_tour_id);
    echo $res_tourid->fetch_assoc()['maTour'];
}

?>