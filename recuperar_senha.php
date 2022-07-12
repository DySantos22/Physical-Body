<?php
session_start();

require 'lib/vendor/autoload.php';
require 'lib/vendor/phpmailer\phpmailer/src/PHPMailer.php';
require 'lib/vendor/phpmailer\phpmailer/src/SMTP.php';
require 'lib/vendor/phpmailer\phpmailer/src/Exception.php';
require  'conexao.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['email'])){

    $email = $_POST['email'];

    $sql = "SELECT * FROM aluno WHERE Email_aluno = '$email'";

    $result = $conn->query($sql);

    if($result->num_rows> 0){
    
    //Instanciando a váriavel do email 
if(isset($_POST['Enviar'])){    
    $mail = new PHPMailer(true);     //Instancia do PHPmailer
    
    //Fazendo a ligação do email
    try {
        //Configurações do servidor (gmail)
        $mail->isSMTP();      
        $mail-> SMTPSecure = 'TLS';                                  //Enviar usando TLS
        $mail->Host       = 'smtp.gmail.com';                     //Servidor usado
        $mail->SMTPAuth   = true;                                   //Ativando autenticacao SMTP
        $mail->Username   = 'physicalbody00@gmail.com';                     //Usuario SMTP
        $mail->Password   = 'mezwgrdqillntnpe';                               //Senha SMTP     
        $mail->Port       = 587;        //Porta usada para TLS
    
        //quem envia e recebe
        $mail->setFrom('physicalbody00@gmail.com', 'Physical Body');  //Usuario SMTP e Nome aleatório
        $mail->addAddress($email);     //Email do Destinatario
        $mail->isHTML(true);                                  //Habilitando o uso do HTML
        $mail-> charset = 'UTF-8';
        $mail->Subject = 'Recuperar Email';    //Titulo
        $mail->Body    = "Olá!!<br><br>Clique no link abaixo para mudar a sua senha:<br><br>
        <a href='http://localhost/recuperando.php?email=$email'>Clique Aqui!</a>";   //Corpo
        $mail->AltBody = "Olá, seja bem vindo!!\n\nClique no link abaixo para mudar a sua senha:\n\n
        <a href='http://localhost/recuperando.php?email=$email'>Clique Aqui!</a>";
        $mail->send();
        echo "<script>alert('Email enviado!!')</script>";
        header('refresh:2;url=login.html');
    } catch (Exception $e) {
        echo "Mensagem não foi enviada. ERRO: {$mail->ErrorInfo}";   //Mensagem de erro, depois envia para o cadastro novamente
        header('refresh:2;url=recuperar_senha.html');
    }
    }
}else{
    echo "<script>alert('Esse e-mail não existe!!')</script>";
    header('refresh:2; url=login.html');
}

    //Mandando os dados para o banco 
    mysqli_query($conn,$sql);
    mysqli_close($conn);
}
?>