<?php
function sendmail($fromname,$to,$subject,$body)
{
    $ci = get_instance();
    $ci->load->library("Phpmailer_library");
    $mail = $ci->phpmailer_library->load();
    /* setting SMTP */
    $mail->isSMTP();
    $mail->Host = "smtp.hostinger.co.id"; //sesuaikan dengan host email anda
    $mail->Port = 587; //sesuaikan port
    $mail->SMTPAuth = true;
    $mail->Username = "bookstore@bisajadi.id"; //sesuai dengan username yang digunakan
    $mail->Password = "@Qwe123qwe";
    $mail->WordWrap = 300;
//    $mail->SMTPDebug = 2;

    $mail->setFrom("bookstore@bisajadi.id", "$fromname"); //setting pengirim email
    $mail->addAddress($to); //alamat email yang dituju
    $mail->Subject = "$subject"; //subject
    $mail->Body = $body;
    $mail->isHTML(true);

    $sends = $mail->send();
    return $sends;
}
