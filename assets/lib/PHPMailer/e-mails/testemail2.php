<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
/**
* Simple example script using PHPMailer with exceptions enabled
* @package phpmailer
* @version $Id$
*/
include_once $_SERVER['DOCUMENT_ROOT']."/capacitacion/lib/funciones.php";
//include('../../lib/funciones.php');

$idp=$_POST['txtIdInscripcion'];

$acorreo=datosCorreo($idp);
$id=$_GET['llave'];


//$unidad = muestraUnidadColaborador($_GET['llave']);
//$u_col=$f['descripcion'];


foreach ($acorreo as  $f) {
		 
			
	$f_idprogramacion=$f['idprogramacion'];
	$f_descripcion=$f['descripcion'];
	$f_institucion=$f['institucion'];
	$f_ubicacion=$f['ubicacion'];
	$f_fechaInicio=$f['fechaInicio'];
	$f_fechaTermino=$f['fechaTermino'];
	$f_horaInicio=$f['horaInicio'];
	$f_horaTermino=$f['horaTermino'];
	$f_fechaConfirmacion=$f['fechaConfirmacion'];

	$mensaje ="
	<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />

</head>
	<body>
<p>Estimado/a:</p>

Le informamos   a usted  que de acuerdo al plan de capacitaci&oacute;n est&aacute; considerado para realizar el curso de <b><u>".$f_descripcion."</u></b>, por la instituci&oacute;n de <b><u>".$f_institucion."</u></b>,  ubicado en <b><u>".$f_ubicacion."</u></b>, el cual se dara inicio en  la siguiente fecha  <b><u>".$f_fechaInicio."</u></b> entre las <b><u>".$f_horaInicio."</u></b> y <b><u>".$f_horaTermino."</u></b> horas. <br /><br />

El plazo para que nos confirme el  horario  en que tomara  la capacitaci&oacute;n es el <b><u>".$f_fechaConfirmacion."</u></b> del presente a&ntilde;o, con motivo de reservar el cupo en la fecha indicada.
<br /><br />
Para inscribirse usted debe  hacer clic  <a href=".$_SERVER['SERVER_NAME']."/capacitacion/modificaInscritosLink.php?inscripcion=".$f_idprogramacion."&col=".$id." > aqu&iacute;</a>.
<br /><br />
Atenta a su confirmaci&oacute;n 
<br /><br />
Saludos cordiales,
<br /><br />
Jefe Recursos Humanos.
</p>
</body> ";

}
require_once $_SERVER['DOCUMENT_ROOT']."/capacitacion/PHPMailer/class.phpmailer.php";
//require_once '../PHPMailer/class.phpmailer.php';

try {
	$mail = new PHPMailer(true); //New instance, with exceptions enabled

			
	$body             = $mensaje;
	
//	$body             = preg_replace('/\\\\/','', $body); //Strip backslashes

	$mail->IsSMTP();                           // tell the class to use SMTP
	$mail->SMTPDebug  = 0;
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = "ssl"; 
	$mail->Port       = 465;                   // set the SMTP server port
	$mail->Host       = "164.77.108.209";        // SMTP server
	$mail->Username   = "capacitaciones@cetep.cl";     // SMTP server username
	$mail->Password   = "capacetep626..";            // SMTP server password

//	$mail->IsSendmail();  // tell the class to use Sendmail
	 
//	$mail->AddReplyTo("franciscoalc@gmail.com","Tito Tito");

	$mail->From       = "capacitaciones@cetep.cl";
	$mail->FromName   = "CAPACITACIONES CETEP";

	$to = $correodestino; 

	$mail->AddAddress($to);
	
	$mail->Subject = utf8_encode("=?UTF-8?B?".base64_encode("Capacitación")."?=");

	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	$mail->WordWrap   = 80; // set word wrap

	$mail->MsgHTML($body);

	$mail->IsHTML(true); // send as HTML

	$mail->Send();
	
	
} catch (phpmailerException $e) {
	echo 'Error al enviar e-mail con destino a: '.$to.' ' ;
	echo '¡¡Error!! : '.$e->errorMessage() ;

}

?>
</body>
</html>