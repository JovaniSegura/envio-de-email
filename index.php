<?php 

require("mail.php");

function validateFields($name, $email, $subject, $message, $submit){
    return !empty($name) && !empty($email) && !empty($subject) && !empty($message);
}

$mensajeMostrado = "";
if(isset($_POST["submit"])){
    if(validateFields(...$_POST)){

        $name = $_POST["name"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];

        $body = "$name <$email> te envia el siguiente mensaje <br><br> $message";

        // Mandar el email
        sendMail($subject, $body, $email, $name, true);
        
        $mensajeMostrado = "succes";
    } else {
        $mensajeMostrado = "danger";
    }
}
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envio de email</title>
</head>
<body>
    <form action="./" method="post">
        <div class="name">
            <label for="name">Nombre:</label><br>
            <input type="text" id="name" name="name" placeholder="Escribe tu nombre completo">
        </div>
        <br>
        <div class="email">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" placeholder="Escribe tu Email">
        </div>
        <br>
        <div class="subject">
            <label for="subject">Asunto:</label><br>
            <input type="text" id="subject" name="subject" placeholder="Escribe aqui en asunto">
        </div>
        <br>
        <div class="message">
            <label for="message">Mensaje:</label><br>
            <textarea id="text" name="message" placeholder="Ingresa aqui el cuerpo de tu mensaje"></textarea>
        </div>
        <br>
        <input type="submit" value="submit" name="submit">
    </form>

    <?php if($mensajeMostrado === "succes"): ?>
        <p style="background-color: green; color: white;">Formulario Enviado con exito</p>
    <?php endif?>
    
    <?php if($mensajeMostrado === "danger"): ?>
        <p style="background-color: red; color: white">Error! no se envio el formulario, falta algun campo por llenar</p>
    <?php endif?>

</body>
</html>