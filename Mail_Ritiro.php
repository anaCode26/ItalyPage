
<?php


$destinario = "programacion.0net@gmail.com";
$Cognome = $_POST["Cognome"];
$Nome = $_POST["Nome"];
$Indirizzo = $_POST["Indirizzo"];
$Cap = $_POST["Cap"];
$Prov = $_POST["Prov"];
$Città = $_POST["Città"];
$Mail = $_POST["Mail"];
$Telefono = $_POST["Telefono"];

$PSQ = $_POST["PSQ"];
$PMQ = $_POST["PMQ"];
$PSOQ = $_POST["PSOQ"];
$PMOQ = $_POST["PMOQ"];
$CPSQ = $_POST["CPSQ"];
$CPMQ = $_POST["CPMQ"];
$TSQ = $_POST["TSQ"];
$TMQ = $_POST["TMQ"];
$LSQ = $_POST["LSQ"];
$LMQ = $_POST["LMQ"];
$CMSQ = $_POST["CMSQ"];
$CSQ = $_POST["CSQ"];
$CMQ = $_POST["CMQ"];
$CQ = $_POST["CQ"];
$FQ = $_POST["FQ"];

require('pdf/fpdf.php');

function defecto($variable)
{
	if ($variable == null || $variable == "")
	{
		return "0.00";
	}
	else{
		return $variable;
	}
}

$pdf = new FPDF();

$pdf->AddPage();
$pdf->Image('images/welcome.png',10,10,50);
$pdf->SetFont('Arial', '', '14');
$pdf->Cell(30);
$pdf->Cell(120,30,'RITIRO',5,1,'C');
$pdf->Cell(120,10,utf8_decode('Cognome: ').utf8_decode($Cognome),1,1,'L');
$pdf->Cell(120,10,utf8_decode('Nome: ').utf8_decode($Nome),1,1,'L');
$pdf->Cell(120,10,utf8_decode('Indirizzo: ').utf8_decode($Indirizzo),1,1,'L');
$pdf->Cell(120,10,utf8_decode('Cap: ').utf8_decode($Cap),1,1,'L');
$pdf->Cell(120,10,utf8_decode('Prov: ').utf8_decode($Prov),1,1,'L');
$pdf->Cell(120,10,utf8_decode('Città: ').utf8_decode($Città),1,1,'L');
$pdf->Cell(120,10,utf8_decode('Mail: ').utf8_decode($Mail),1,1,'L');
$pdf->Cell(120,10,'Telefono: '.$Telefono,1,1,'L');
$pdf->Cell(120,10,'Piumone Singolo: '.defecto($PSQ),1,1,'L');
$pdf->Cell(120,10,'Piumone matrimoniale: '.defecto($PMQ),1,1,'L');
$pdf->Cell(120,10,"Piumone singolo d'Oca: ".defecto($PSOQ),1,1,'L');
$pdf->Cell(120,10,"Piumone matrimoniale d'Oca: ".defecto($PMOQ),1,1,'L');
$pdf->Cell(120,10,'Copri Piumone singolo: '.defecto($CPSQ),1,1,'L');
$pdf->Cell(120,10,'Copri Piumone matrimoniale: '.defecto($CPMQ),1,1,'L');
$pdf->Cell(120,10,'Trapunta singola: '.defecto($TSQ),1,1,'L');
$pdf->Cell(120,10,'Trapunta matrimoniale: '.defecto($TMQ),1,1,'L');
$pdf->Cell(120,10,'Lenzuolo singolo: '.defecto($LSQ),1,1,'L');
$pdf->Cell(120,10,'Lenzuolo matrimoniale: '.defecto($LMQ),1,1,'L');
$pdf->Cell(120,10,'Copri materasso singolo: '.defecto($CMSQ),1,1,'L');
$pdf->Cell(120,10,'Coperta singola: '.defecto($CSQ),1,1,'L');
$pdf->Cell(120,10,'Coperta matrimoniale '.defecto($CMQ),1,1,'L');
$pdf->Cell(120,10,'Cuscini: '.defecto($CQ),1,1,'L');
$pdf->Cell(120,10,'Federe: '.defecto($FQ),1,1,'L');


$pdf->Output("Ritiro_Vv.pdf", 'f', true);


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PhpMailer/Exception.php';
require 'PhpMailer/PHPMailer.php';
require 'PhpMailer/SMTP.php';

$mail = new PHPMailer(true);                             
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 
    $mail->isSMTP();                                      
    $mail->Host = 'smtp.gmail.com';                       
    $mail->SMTPAuth = true;                               
    $mail->Username = 'programacion.0net@gmail.com';                 
    $mail->Password = 'sakura**216';                           
    $mail->SMTPSecure = 'tls';                          
    $mail->Port = 587;                                    

    //Recipients
    $mail->setFrom($destinario, ' Prueba formulario');
    $mail->addAddress('programacion.0net@gmail.com', 'Prueba formulario');     
    //$mail->addAddress('andres.lacruz.al@gmail.com', 'prueba formulario');               
    

    //Attachments
    $mail->addAttachment('Ritiro_Vv.pdf');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  
    $mail->Subject = 'Asunto prueba formulario';
    $mail->Body    = 'Prueba formulario';
   

    $mail->send();
    echo 'El mensaje se envió correctamente!';
}		catch (Exception $e) {
    echo 'Hubo un error al enviar el mensaje: ', $mail -> ErrorInfo;
}
