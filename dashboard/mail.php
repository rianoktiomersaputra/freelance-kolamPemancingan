<?php
    require_once "../assets/libs/Carbon/autoload.php";
    require_once("../PHPMailer/src/PHPMailer.php");
    require_once("../PHPMailer/src/SMTP.php");
	use Carbon\Carbon;
	$tanggal_waktu_daftar = Carbon::now()->toDateTimeString();

    // if(){
        // notificatio message dari javascript
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '465';
        $mail->isHTML();
        $mail->Username = 'isnaenim05@gmail.com';
        $mail->Password = 'promild16';
        $mail->SetFrom('no-reply@howcode.org');
        $mail->Subject = 'Peringatan';
        $mail->Body = $_COOKIE['message'];
        $mail->AddAddress('isnaenim05@gmail.com');

        $mail->send();
    // }