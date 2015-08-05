<?php
function sendMail($user, $pass, $to, $sub, $msg)
{
	date_default_timezone_set('Etc/UTC');
	require 'PHPMailerAutoload.php';
	//Idea de Ariel: no tenía los paréntesis, por si 
	//pone la marrana, se los puse...
	$mail = new PHPMailer();

	//setup
	$mail->isSMTP();

	/* Inicia edición de Ariel, 29/07/2015 */
	//Host de gmail, lo cambié por la IP.... 66.249.93.111 , pero ya lo regresé....
	//$mail->Host = 'ssl://smtp.gmail.com';
	$mail->Host = 'smtp.gmail.com';
	//Idea de Ariel: cambié $mail->Port = 465; por esto:
	$mail->Port = 587;
	//Idea de Ariel: cambié $mail->SMTPSecure = 'ssl'; por esto:
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	//auth
	//Idea de Ariel: cambié estas cosas...
	/*
	$mail->Username = $user;
	$mail->Password = $pass;
	//Para que acceda ahora desde esta dirección:
	//modulohibrido@gmail.com pei214535
	*/
	$mail->Username = 'modulohibrido@gmail.com';
	$mail->Password = 'pei214535';

	//correo


	$mail->addAddress($to);
	$mail->Subject = $sub;
	$mail->msgHTML($msg);
	//res
	if (!$mail->send()) echo "<script>alert('Hubo un error: ".$mail->ErrorInfo."');</script>";
	else echo "<script>alert('Mensaje enviado exitosamente');</script>";
}
?>
