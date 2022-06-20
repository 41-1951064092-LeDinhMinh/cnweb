<?php

if (!isset($_SESSION['partnerAccount'])) {
    header("location:".SITEURL."login/login-doitac.php");
}
?>