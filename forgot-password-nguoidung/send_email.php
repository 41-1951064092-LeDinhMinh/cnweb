<?php
$username = 'ledinhminh53@gmail.com';
$password = 'fgcqjcznrlghmvly';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';


function sendEmailForAccountActive($email, $link){
    global $username;
    global $password;
    $mail = new PHPMailer(true);

    try {
        
        $mail->SMTPDebug = 0;                      
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                    
        $mail->SMTPAuth   = true;                                  
        $mail->Username   = $username;                    
        $mail->Password   = $password;                            
        $mail->SMTPSecure = 'ssl';           
        $mail->Port       = 465;                                 
        $mail->CharSet = 'UTF-8';


        $mail->setFrom('ledinhminh53@gmail.com', 'Lê Đình Minh');
        $mail->addAddress($email);     
        
        $mail->isHTML(true);                                 
        $mail->Subject = '[hahalolo.com] active your account';
        $mail->Body    = 'Chào mừng bạn đến với hahalolo. Bạn đã quên mật khẩu,'.$link;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if($mail->send()){
            return true;
        }
    } catch (Exception $e)  {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    return false;
}
?>