<?php
require_once 'swiftmailer/lib/swift_required.php';

$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
->setUsername('GMAIL_ID')
->setPassword('GMAIL_PASSWORD');

$mailer = Swift_Mailer::newInstance($transport);

$message = Swift_Message::newInstance('Test Subject')
->setFrom(array('shoemart.team6@gmail.com'))
->setTo(array('vmadadi@emich.edu'))
->setBody('You have succefully completed your registration with shoemart . Please use the below link to login <br>http://localhost/ShoeMartFinal/login.php');

$result = $mailer->send($message);
?>
