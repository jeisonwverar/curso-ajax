<?php
if(isset($_POST)){
    error_reporting(0);
    $name = $_POST("name");
    $email = $_POST("email");
    $subject = $_POST("subject");
    $comments = $_POST("comments");

    $domain = $_SERVER("HTTP_HOST");
    $to = "jw.vera.r@gmail.com";
    $subject_main = "Contacto desde el formulario del sitio $domain:$subject"
    $message = "
    <p>
        Datos enviados desde el formulario del sitio <b>$domain</b>
    </p>
    <ul>
        <li>Nombre:<b>$name</b></li>
        <li>Email:<b>$email</b></li>
        <li>Asunto:$subject</li>
        <li>Comentarios:$subject</li>
        
    </ul>
    "

    $headers="MIME-version:1.0\r\n"."Content-Type:text/html;charset=utf-8\r\n"."From: Envio Automatico No Responder <no-reply@$domain";
    mail($to,$subject_main,$message,$headers);
    if($send_mail){
        $res =[
            "err" => false,
            "message"=>"Tus datos han sido enviados"
        ];
    }else{
        $res =[
            "err" => true,
            "message"=>"Error añ enviar tus datos han sido enviados"
        ];
    }

    header("Content-Type:application/json");
    echo.json_encode($res);
    exit;
}