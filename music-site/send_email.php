<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";




if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
   

   // $mail->SMTPDebug = 3; 
    //smtp settings
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.titan.email';
    $mail->Port = 465;
    $mail->SMTPAuth = true;

    $mail->Username = 'dev@devbakshi.com';
    $mail->Password = 'Siqisite1';
    $mail->SMTPSecure = "ssl";

    //email settings
    $mail->isHTML(true);
    $mail->setFrom('dev@devbakshi.com');
    $mail->addAddress('admin@devbakshi.com');
    $mail->Subject = ('HSS Web contact: '. $name);
    $mail->Body = '<h3>Name:</h3>' . $name . '<h3>Email: </h3>' . $email . '<h3>Message: </h3>'. $message;
   try {
            $mail->send();
            echo 'Your message was sent successfully!';
        } catch (Exception $e) {
            echo "Your message could not be sent! PHPMailer Error: {$mail->ErrorInfo}";
        }
        
    } else {
        echo "There is a problem with the contact.html document!";
    
}
?>