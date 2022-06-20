<?php
    include('../constants.php');

    session_start();

    if(isset($_SESSION['loginAccount'])){
        unset($_SESSION['loginAccount']);
        header("location:".SITEURL);
    }

?>
