<?php
    require 'config.php';
    require 'Database/user.service.php';
    require 'Database/mail.service.php';

    $connection = new Connection(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);

    $user = new User(
        $_POST['name'],
        $_POST['email'] ,
        $_POST['telephone']
    );

    if(!$user->verifyEmail()){
        header("Location:../index.php?success=0");
        die();
    }  
    echo $user->verifyEmail();

    $service = new UserService($connection, $user);

    try
    {
        $service->insert();
    }
    catch(Exception $e)
    {
        header("Location:../index.php?success=0");
        die();
    }

    $address = $user->__get('email');
    $subject = 'Application Test';
    $message = "
    <h1>Hello, this is the test e-mail </h1>
    <p>
        This is an Application created by Paulo Rutkoski using PHP, HTML, CSS, Javascript 
        that register the user into the database and then send him an e-mail using the 
        PHP library PHPMailer
    </p>";
    

    $mail = new Mail($address, $subject, $message);

    $mail_service = new MailService($mail);
    $mail_service->sendMail();

    if($mail->__get('status') == 0){
        header("Location:../index.php?success=0");
        die();
    }      
    
        
    header("Location:../index.php?success=1");   
?>