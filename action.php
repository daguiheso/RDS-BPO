<?php
//
require_once 'vendor/autoload.php';

$contenido = json_decode(file_get_contents("php://input"));
//echo $contenido->name;


//var_dump($contenido);
//die;

//$nombre =  $_POST['nombre'];
//$empresa = $_POST['empresa'];
//$email = $_POST['email'];
//$telefono = $_POST['telefono'];
//$pais = $_POST['pais'];
$ok = 0;
$ip = $_SERVER['REMOTE_ADDR'];
//mysql
//$con=mysqli_connect("localhost","landing","landing","landing");
// Check connection
//if (mysqli_connect_errno()) {
//  echo "Failed to connect to MySQL: " . mysqli_connect_error();
//}
//

//
if($nombre == "" || $email == "" || $servicios == ""){


}else{
$ok = 1;
$arr = array ('status'=>2,'nombre'=>$contenido->name, 'email' => $contenido->email, 'telefono' => $contenido->phone, 'pais' => $contenido->pais, 'ip' =>$ip );
}

// echo json con respuesta de valores enviados.
if($ok == 1){
 //guardar en base de datos y enviar correo electronico
//mysqli_query($con,"INSERT INTO landing (id, nombre, empresa, email, telefono, servicios, ip) VALUES (NULL, '$nombre', '$empresa', '$email', '$telefono', '$servicios', '$ip')");
//mysqli_close($con);
//
$mail = new PHPMailer;
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mandrillapp.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'soporte@reddesignsystems.com';                 // SMTP username
$mail->Password = 'l2yC0meh1MNLLHegs2i-Ng';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->From = 'soporte@reddesignsystems.com';
$mail->FromName = 'Soporte landing';
$mail->addAddress('flb@reddesignsystems.com', 'Maria paula');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('soporte@reddesignsystems.com');
//$mail->addCC('landing@reddesignsystems.com');
//$mail->addBCC('lmedina@reddesignsystems.com');
//$mail->addBCC('flb@reddesignsystems.com');
//$mail->addBCC('javillalee@gmail.com');
$mail->isHTML(true);                                  // Set email format to HTML
//
$message = '<html><body>';
$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$message .= "<tr><td><strong>Nombre:</strong> </td><td>$contenido->name </td></tr>";
//$message .= "<tr><td><strong>Empresa:</strong> </td><td>$empresa</td></tr>";
$message .= "<tr><td><strong>Email:</strong> </td><td>$contenido->email</td></tr>";
$message .= "<tr><td><strong>Telefono:</strong> </td><td>$contenido->phone </td></tr>";
//$message .= "<tr><td><strong>Servicios:</strong> </td><td>$servicios </td></tr>";

$message .= "</table>";
$message .= "</body></html>";

//
$mail->Subject = 'Landing page test mail';
$mail->Body    = $message;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 $mail->send();
}
header('Content-Type: application/json');
echo json_encode($arr); 



    
?>





