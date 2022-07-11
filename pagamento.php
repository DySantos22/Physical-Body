<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if ((isset($_POST['email']))&&(!empty($_POST['email']))){

//Conectando com o banco de dados
require "conexao.php";

//dados da sessão
$email = $_SESSION['email'];

//Ativando a conta
$condicao = 'Ativo';

//inserindo os dados
$sql = "UPDATE aluno SET Condicao='$condicao' WHERE Email_aluno='$email'";

mysqli_query($conn,$sql);
mysqli_close($conn);
header("refresh:1; url=login.html");
}
?>