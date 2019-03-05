<?php
include('D:\XAMPP\htdocs\PHPMailer-master\src\PHPMailer.php');
include('D:\XAMPP\htdocs\PHPMailer-master\src\OAuth.php');
include('D:\XAMPP\htdocs\PHPMailer-master\src\Exception.php');
include('D:\XAMPP\htdocs\PHPMailer-master\src\POP3.php');
include('D:\XAMPP\htdocs\PHPMailer-master\src\SMTP.php');
use PHPMailer\PHPMailer\PHPMailer;
$mail = new PHPMailer;
?>
<html>
<head>
    <title>Send malware e-mails</title>
</head>
<body>
    <form enctype="multipart/form-data" method='post'>
        E-mailadres
        <input type="text" name="email"><br>
        Onderwerp
        <input type="text" name="subject"><br>
        Bericht
        <textarea name="msg" id="" cols="30" rows="10"></textarea><br/>
        <input type="file" name="file"><br/>

        <input type="submit" value="Verstuur email"/>

    </form>
    <?php

    if (isset($_POST['msg'])) {
        $data = $_POST['msg'];
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['subject'])) {
        $subject = $_POST['subject'];
    }
    ?>

    <?php
    if(!empty($data) && !empty($subject) && !empty($email)) {
        $mailer = new PHPMailer();
        $mailer->SetFrom ('test@domain.com');
        $mailer->AddAddress ( $email );
        $mailer->Subject = $subject;
        $mailer->Body = $data;
        $mailer->AddAttachment( $_FILES['file']['tmp_name'],$_FILES['file']['name']);
        if($mailer->Send()) {
          echo "<h1>Email verstuurd</h1>";
        } else {
          echo "<h1>Email NIET verstuurd</h1>";
        }
    }
    ?>
</body>
</html>
