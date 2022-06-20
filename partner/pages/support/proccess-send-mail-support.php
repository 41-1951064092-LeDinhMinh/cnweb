<?php
include "../../../config/constants.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


if(isset($_POST['btnMailSendSupp'])){
// Get email title and content
$mailSPTit_temp = $_POST['mail-supp-title'];
$mailSuppNumber = $_SESSION['partnerAccount']. rand(10000, 99999); // Generate random ticket number
$mailSuppTitle  = "[#".$mailSuppNumber."]". " ".$mailSPTit_temp; // Generate mail title

$mailSuppContent = $_POST['mail-supp-content'];

$username = "taovehotronhom2cse485@gmail.com";
$password = "wpldlrtwyqxegdxr";
//
$mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 0;                   
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';                    
        $mail->SMTPAuth   = true;                                  
        $mail->Username   = $username;                     
        $mail->Password   = $password;                               
        $mail->SMTPSecure = 'ssl';            
        $mail->Port       = 465;                                
        $mail->CharSet = 'UTF-8';
        //Recipients
        $mail->setFrom('taovehotronhom2cse485@gmail.com', 'Hỗ trợ');
        $mail->addAddress('hotronhom2cse485@gmail.com', 'Nhóm 2 - CSE485');
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         
        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = $mailSuppTitle;
        $mail->Body    = $mailSuppContent;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        // If true
        $_SESSION['sendMailSPSuccess'] = $mailSuppNumber;
        header("location: index.php");
    } catch (Exception $e) { // If error
        $_SESSION['sendMailSPError'] = "Lỗi!";
        header("location: index.php");
    }
}
else{
    header("location:" . SITEURL . "partner/");
}
