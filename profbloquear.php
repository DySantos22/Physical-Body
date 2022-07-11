<?php
session_start();

//Verifica o acesso.
require 'acessoadm.php';
 
//Conecta com o banco 
require 'conexao.php';

//Faz a leitura do dado passado pelo link.
$campoid = $_GET["id"];
$campocondicao = $_GET["CondicaoP"];
 

if($campocondicao="Ativo"){

// Bloquear usuário o registro com o id
$sql = "UPDATE professor SET CondicaoP='Inativo' WHERE ID_professor=$campoid";

}else{
    
$sql = "UPDATE professor SET CondicaoP='Ativo' WHERE ID_professor=$campoid";
}

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  echo "Professor bloqueado";
  
  include 'log.php';
  
   header('Location: professorcontrolar.php?pag=1'); //Redireciona para o controle  
} else {
  echo "Erro: " . $conn->error;
}

//Fecha a conexão.
$conn->close();
?> 