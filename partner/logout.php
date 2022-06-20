<?php
    include('../config/constants.php');
    // Check and logout
    if(isset($_SESSION['partnerAccount'])){
        unset($_SESSION['partnerAccount']);
        header("location:".SITEURL."login/login-doitac.php");
    }

?>