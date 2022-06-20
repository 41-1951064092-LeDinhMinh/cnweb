<?php
    include('../config/constants.php');
    // Check and logout
    if(isset($_SESSION['adminAccount'])){
        unset($_SESSION['adminAccount']);
        header("location:" . SITEURL . "admin/login.php");
    }

?>