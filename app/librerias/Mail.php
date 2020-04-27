

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require MAIN_PATH."/vendor/phpmailer/phpmailer/src/PHPMailer.php";
require MAIN_PATH."/vendor/phpmailer/phpmailer/src/SMTP.php";
require MAIN_PATH."/vendor/phpmailer/phpmailer/src/Exception.php";


class Mail{

    private $PhpM;

    public function __construct()
    {
       

        try {
            //Server settings
            $this->PhpM = new PHPMailer(true);
            $this->PhpM->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $this->PhpM->isSMTP();                                            // Send using SMTP
            $this->PhpM->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $this->PhpM->SMTPAuth   = true;                                   // Enable SMTP authentication
            $this->PhpM->Username   = 'luisitoelcaballero@gmail.com';                     // SMTP username
            $this->PhpM->Password   = 'Decall931';                               // SMTP password
            $this->PhpM->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $this->PhpM->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        

        
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->PhpM->ErrorInfo}";
        }
    }

    public function SendEmail($Email,$Token){
        try{
            $this->PhpM->setFrom('luisitoElCaballero@gmail.com',"Luis");
            $this->PhpM->addAddress($Email);  
            //$this->PhpM->addAttachment("../public/images/8.jpg", 'new.jpg');
            $this->PhpM->isHTML(true);  
            $this->PhpM->Subject = 'Restore Password';
            $this->PhpM->Body    = '<a href="localhost/EGym/ChangePass/CheckToken/'.$Token.'"> Enlace</a>';
            $this->PhpM->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $this->PhpM->send();
            
        }catch(Exception $e){
            die("Error, mensaje no enviado");
        }
        
    }

    
}




?>