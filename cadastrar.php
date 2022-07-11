<?php

require 'lib/vendor/autoload.php';
require 'lib/vendor/phpmailer\phpmailer/src/PHPMailer.php';
require 'lib/vendor/phpmailer\phpmailer/src/SMTP.php';
require 'lib/vendor/phpmailer\phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Conectando com o banco de dados
require "conexao.php";

if ((isset($_POST['email']))&&(!empty($_POST['email']))){

//Pegando os dados inseridos
$acesso = 'Aluno';
$condicao = 'Inativo';
$nome = $_POST['nome']; 
$email = $_POST['email'];
$confirma_senha = $_POST['confirma_senha'];
$celular = $_POST['celular'];
$cpf = $_POST['cpf'];
$nascimento = $_POST['nascimento'];
$matricula = rand(100000, 999999);

//Verifica email duplicado e retorna erro.
$sql = "SELECT * FROM aluno WHERE Email_aluno='$email'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<script>alert('E-mail já existe!)</script>";
  header('refresh:3;url=cadastrar.html');
	exit;	
}

//Criptografando 
$text = $_POST["senha"];
$hash = password_hash($text, PASSWORD_BCRYPT);

//Chave para confirmar email
$chave = password_hash($email . date('Y-m-d H:i:s'),PASSWORD_DEFAULT);

//inserindo os dados
$sql = "INSERT INTO aluno(Matricula, Nome, Email_aluno, Senha_aluno, CPF, Data_de_nascimento, Telefone, AcessoA, Condicao, Chave) VALUES
('$matricula','$nome','$email', '$hash','$cpf','$nascimento','$celular','$acesso', '$condicao','$chave')";

//Executa o SQL e faz tratamento de erros

//Instanciando a váriavel do email 
if(isset($_POST['Continuar'])){    
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
    $mail->Subject = 'Confirmar Email';    //Titulo
    $mail->Body    = "Olá, seja bem vindo!!<br><br>Clique no link abaixo para confirmar seu e-mail:<br><br>
    <a href='http://localhost/confirma_email.php?chave=$chave'>Clique Aqui!</a>";   //Corpo
    $mail->AltBody = "Olá, seja bem vindo!!\n\nClique no link abaixo para confirmar seu e-mail:\n\n
    <a href='http://localhost/confirma_email.php?chave=$chave'>Clique Aqui!</a>";
  
  //Impedindo que o email seja enviado, se as senhas não forem iguais
 if($text == $confirma_senha){
    $mail->send();
    echo 'Por favor, confirme o seu e-mail';
    header('refresh:8;url=index.html');
  }else{
    header('refresh:0;url=cadastrar.html');
    mysqli_close($conn);
  }

} catch (Exception $e) {
    echo "Mensagem não foi enviada. ERRO: {$mail->ErrorInfo}";   //Mensagem de erro, depois envia para o cadastro novamente
    header('refresh:2;url=cadastrar.html');
}
}

//Mandando os dados para o banco 
mysqli_query($conn,$sql);
mysqli_close($conn);
}
?>