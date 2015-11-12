<?php
//
require_once 'vendor/autoload.php';

$contenido = json_decode(file_get_contents("php://input"));
$ok = 0;
$ip = $_SERVER['REMOTE_ADDR'];
$arr = array ('status'=>0,'mensaje'=>'Por favor diligencie los campos e intente de nuevo');	
if($contenido->name !="" || $contenido->email !="" || $contenido->phone !="" || $contenido->pais !="" ){
$arr = array ('status'=>1,'mensaje'=>'Se envio el formulario con exito');
//$arr = array ('status'=>2,'nombre'=>$contenido->name, 'email' => $contenido->email, 'telefono' => $contenido->phone, 'pais' => $contenido->pais, 'ip' =>$ip );	
$ok = 1;	
}
// echo json con respuesta de valores enviados.
if($ok == 1){
$mail = new PHPMailer;
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mandrillapp.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'soporte@reddesignsystems.com';                 // SMTP username
$mail->Password = 'l2yC0meh1MNLLHegs2i-Ng';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                   // TCP port to connect to
$mail->From = 'soporte@reddesignsystems.com';
$mail->FromName = 'Soporte landing';
$mail->addAddress('flb@reddesignsystems.com', 'Felipe lizcano');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('soporte@reddesignsystems.com');
$mail->addCC('landing@reddesignsystems.com');
$mail->addBCC('lmedina@reddesignsystems.com');
//$mail->addBCC('flb@reddesignsystems.com');
$mail->addBCC('javillalee@gmail.com');
$mail->isHTML(true);                                  // Set email format to HTML
//
$message = '<html><body>';
$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$message .= "<tr><td><strong>Nombre:</strong> </td><td>$contenido->name </td></tr>";
//$message .= "<tr><td><strong>Empresa:</strong> </td><td>$empresa</td></tr>";
$message .= "<tr><td><strong>Email:</strong> </td><td>$contenido->email</td></tr>";
$message .= "<tr><td><strong>Telefono:</strong> </td><td>$contenido->phone </td></tr>";
$message .= "<tr><td><strong>Pais:</strong> </td><td>$contenido->pais </td></tr>";
$message .= "<tr><td><strong>Dirip:</strong> </td><td>$ip </td></tr>";
$message .= "</table>";
$message .= "</body></html>";
//
$mail->Subject = 'Landing csd bpo';
$mail->Body    = $message;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 $mail->send();
}
header('Content-Type: application/json');
echo json_encode($arr); 



    
?>





