
<?php



require 'phpmailer/includes/Exception.php';
require 'phpmailer/includes/PHPMailer.php';
require 'phpmailer/includes/SMTP.php';

$name       = $_POST['name'];
$mailfrom   = $_POST['email'];
$context    = $_POST['message'];

$subject    = 'Information';
$to         = "vasovacmarko@gmail.com";




    $mail = new \PHPMailer\PHPMailer\PHPMailer();                    // create a new object

    $mail->isSMTP();                            // Set mailer to use SMTP
    $mail->Host      = 'smtp.gmail.com';        // Specify main and backup SMTP servers
    $mail->SMTPAuth  = true;                    // Enable SMTP authentication
    $mail->CharSet   = "UTF-8";
    $mail->SMTPDebug = 2;                       // Enable verbose debug output
    $mail->isHTML(true);                        // Set email format to HTML


    $mail->Username = "vasovacmarko@gmail.com";                    // SMTP username
    $mail->Password = "markovasovic";                     // SMTP password

    //$mail->SMTPAutoTLS    = false;
    $mail->SMTPSecure   = 'tls';                // Enable TLS encryption, `ssl` also accepted
    $mail->Port         = 587;                  // TCP port to connect to

    $mail->setFrom($mailfrom,$name);            // Mail Form
    $mail->addAddress("vasovacmarko@gmail.com");          // Name is optional

    $mail->Subject = $subject;
    $mail->Body    = $context;

   
   if ($mail->Send()) {
       echo 1;
   }


 

?>