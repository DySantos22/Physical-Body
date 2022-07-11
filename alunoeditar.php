<?php
session_start();
//Verifica o acesso.
if($_SESSION['acesso']=="Admin"){

//Dados do formulário
$campoid = $_POST["id"];
$camponome = $_POST["nome"];
$campoemail = $_POST["email"];

//Faz a conexão com o BD.
require 'conexao.php';

//Sql que altera um registro da tabela usuários
$sql = "UPDATE aluno SET Nome='" . $camponome . "', Email_aluno='" . $campoemail .  "' WHERE ID_aluno=" . $campoid;

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  echo "Registro atualizado.";
} else {
  echo "Erro: " . $conn->error;
}
    header('Location: alunoscontrolar.php'); //Redireciona para o form	

//Fecha a conexão.
	$conn->close();
	
//Se o usuário não tem acesso.
} else {
    header('Location: index.html'); //Redireciona para o form
    exit; // Interrompe o Script
}

?> 