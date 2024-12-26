<?php
 require './PHPMailer/Exception.php';
 require './PHPMailer/PHPMailer.php';
 require './PHPMailer/SMTP.php';
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
$firstn = $_POST['fname'];
$lastn = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];
$message = $_POST['message'];
// $formcontent="First Name: $firstn \n Last Name: $lastn \n Email: $email \n Services: $services \n Phone: $phone \n Message: $message";
// $recipient = "mdsubhan.53@gmail.com";
// $subject = "Contact Form";
// $mailheader = "From: $email \r\n";
// mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
// require_once "thank-you.html";


$mail = new PHPMailer(true);

try {
        
    $mail->isSMTP();                                            
    $mail->Host      = 'smtp.gmail.com';                       
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = 'bundlebae1@gmail.com';             
    $mail->Password   = 'fxqlkqoqfpnitjja
';                     
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        
    $mail->Port       = 587;     
                                  

    $mail->setFrom(address: 'bundlebae1@gmail.com', name:'Bundlebae Website');

    $mail->addAddress('bundlebae1@gmail.com', 'shakti from Bundlebae'); 

    
    $mail->isHTML(true);                                       
    $mail->Subject = 'New inquiry in Bundlebae Website contact form';
    $mail->Body    = '
       <div style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); font-family: Arial, sans-serif; color: #333;">
    <div style="background-color: #2596be; padding: 20px; border-radius: 8px 8px 0 0; text-align: center; color: white;">
        <h2 style="margin: 0; font-size: 24px; ">New Inquiry Notification</h2>
    </div>
    <div style="padding: 20px; background-color: white; border-radius: 0 0 8px 8px;">
        <h3 style="color: #2596be;">Hello, you got a new inquiry</h3>
        <p style="font-size: 16px; line-height: 1.5;"><strong>FirstName:</strong> ' . htmlspecialchars($firstn) . '</p>
        <p style="font-size: 16px; line-height: 1.5;"><strong>LastName:</strong> ' . htmlspecialchars($lastn ) . '</p>
        <p style="font-size: 16px; line-height :1.5;"><strong>Phone:</strong>' .htmlspecialchars($phone ) .'</p>
        <p style="font-size: 16px; line-height: 1.5;"><strong>Subject:</strong><br>' . nl2br(htmlspecialchars($subject)) . '</p>
        <p style="font-size: 16px; line-height: 1.5;"><strong>Message:</strong><br>' . nl2br(htmlspecialchars($message)) . '</p>
    </div>
    <div style="padding: 10px; text-align: center; background-color: #f1f1f1; border-radius: 0 0 8px 8px;">
     <p style="font-size: 14px; color: #777;">Thank you for contacting us!</p>
    
    </div>

</div>
';

     if ($mail->send()) {
       
        echo json_encode(['status' => 'success']);
        header("Location:index.php");

    } else {
        echo json_encode(['status' => 'Error']);
        exit;
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    
}

?>