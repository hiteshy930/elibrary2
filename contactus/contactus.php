<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require '../vendor/phpmailer/phpmailer/src/Exception.php';
  require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
  require '../vendor/phpmailer/phpmailer/src/SMTP.php';

  // Include autoload.php file
  require '../vendor/autoload.php';
  // Create object of PHPMailer class
  $mail = new PHPMailer(true);

  $output = '';

  if (isset($_POST['cu_button'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

          //Enable SMTP debugging.
        $mail->SMTPDebug = 3;
        //Set PHPMailer to use SMTP.
        $mail->isSMTP();
        //Set SMTP host name
        $mail->Host = "smtp.gmail.com";
        //Set this to true if SMTP host requires authentication to send email
        $mail->SMTPAuth = true;
        //Provide username and password
        $mail->Username = "projects.emails.info@gmail.com";
        $mail->Password = "hitesh123";
        //If SMTP requires TLS encryption then set it
        $mail->SMTPSecure = "tls";
        //Set TCP port to connect to
        $mail->Port = 587;

        $mail->From = "$email";
        $mail->FromName = "$name";

        $mail->addAddress("hiteshyy930@gmail.com", "Hitesh Yadav");

        $mail->isHTML(true);

        $mail->Subject = "$name sent you a mail regarding $subject";
        $mail->Body = "<h3>Name : $name <br>Email : $email <br>Message : $message</h3>";
        // $mail->AltBody = "This is the plain text version of the email content";

        try {
            $mail->send();
            echo "<script>alert('Message has been sent successfully</br>Thank you for contacting us ! ');</script>";
          header("Refresh:0; url=https://localhost/elibrary2/contactus/contactus.html");
        } catch (Exception $e) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
  }

?>
