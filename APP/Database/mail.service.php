<?php

    require '../Libraries/PHPMailer/PHPMailer.php';
    require '../Libraries/PHPMailer/SMTP.php';
    require '../Libraries/PHPMailer/Exception.php';

    require_once 'config.php';
    require 'Models/mail.model.php';

    class MailService{
        private $mailInstance;

        public function __construct(Mail $mailInstance)
        {
            $this->mailInstance = $mailInstance; 
        }

        function sendMail(){
            $mail = new PHPMailer\PHPMailer\PHPMailer();

            try {
                //Server settings
                $mail->SMTPDebug = false;                                   // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = MAIL_HOST;                              // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = MAIL_USER;                              // SMTP username
                $mail->Password   = MAIL_PASS;                              // SMTP password
                $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption;
                $mail->Port       = 587;                                    

                //Recipients
                $mail->setFrom(MAIL_SENDER, 'Landing Page - Paulo Rutkoski');
                $mail->addAddress($this->mailInstance->__get('address'));                       // Add a recipient

                // Content
                $mail->isHTML(true);                                        // Set email format to HTML
                $mail->Subject = $this->mailInstance->__get('subject');
                $mail->Body    =  $this->mailInstance->__get('message');
                $mail->AltBody = "This email uses HTML, but your client doesn't support it. Try another client";

                $mail->send();

                $this->mailInstance->__set('status', 1);
            } catch (Exception $e) {
                $this->mailInstance->__set('status', 0);
            }
        }

    }

        

?>