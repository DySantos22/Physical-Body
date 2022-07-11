<?php
session_start(); 

//Verifica o acesso.
require 'acessoadm.php';
 
//Faz a leitura do dado passado pelo link.
$campoid = $_GET["id"];
 
//Faz a conexão com o BD.
require 'conexao.php';

// Apagar da tabela usuários o registro com o id
$sql = "DELETE FROM aluno WHERE ID_aluno=$campoid";

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE){

  echo "Usuário apagado";
   header('Location: alunoscontrolar.php?pag=1'); //Redireciona para o controle  
   exit;
}else {
  echo "Erro: " . $conn->error;
}

//Fecha a conexão.
$conn->close();

?> 