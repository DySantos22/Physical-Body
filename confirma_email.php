<?php
session_start();

//Faz a conexão com o BD.
include_once 'conexao.php';

//Dados do formulário
$chave = $_GET['chave'];

//Sql que altera um registro da tabela usuários
$sql = "UPDATE aluno SET Condicao='Aguardando' WHERE Condicao='Inativo' AND Chave='$chave'";

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  echo "<script>alert('E-mail cadastrado com sucesso!!')</script>";
  header('refresh:1;url=checkout.php');
} else {
  echo "Erro: " . $conn->error;
}

//Fecha a conexão.
	$conn->close();
	
?> 