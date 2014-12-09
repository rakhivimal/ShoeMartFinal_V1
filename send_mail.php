<?php
require_once 'swiftmailer/lib/swift_required.php';
$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
->setUsername('shoemart.team6@gmail.com')
->setPassword('shoemart2014');
$mailer = Swift_Mailer::newInstance($transport);
?>
