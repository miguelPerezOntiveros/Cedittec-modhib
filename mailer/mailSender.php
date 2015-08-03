<?php
function sendMail($user, $pass, $to, $sub, $msg)
{
	date_default_timezone_set('Etc/UTC');
	require 'PHPMailerAutoload.php';
	$mail = new PHPMailer;

	//setup
	$mail->isSMTP();

	/* Inicia edición de Ariel, 29/07/2015 */
	//Host de gmail, lo cambié por la IP....
	$mail->Host = '66.249.93.111';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	//auth
	$mail->Username = $user;
	$mail->Password = $pass;
	//correo
	$mail->addAddress($to);
	$mail->Subject = $sub;
	$mail->msgHTML($msg);
	//res
	if (!$mail->send()) echo "<script>alert('Error: ".$mail->ErrorInfo."');</script>";
	else echo "<script>alert('Mensaje enviado exitosamente');</script>";
}
?>
