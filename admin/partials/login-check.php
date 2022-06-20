<?php

if (!isset($_SESSION['adminAccount'])) {
    header("location:" . SITEURL . "admin/login.php");
}

?>
