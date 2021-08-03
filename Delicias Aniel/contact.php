<?php 
if($_POST) {
    $name = "";
    $email = "";
    $message = "";
        
    if(isset($_POST['name'])) {
      $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['email'])) {
        $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    }
     
    if(isset($_POST['message'])) {
        $message = htmlspecialchars($_POST['message']);
    }
     
     
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $email . "\r\n";
     
    if(mail($name, $email, $message, $headers)) {
        echo "<p>Gracias por contactarnos, $name. En las siguientes 24 horas nos pondremos en contacto con usted.</p>";
    } else {
        echo '<p>Lo siento hubo un error en enviar el mensaje 0101.</p>';
    }
     
} else {
    echo '<p>Lo siento hubo un error en enviar el mensaje 0202.</p>';
}



 ?>