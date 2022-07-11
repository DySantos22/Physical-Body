<?php
    
    require 'conexao.php';

if(isset($_POST['senha'])){

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "UPDATE aluno SET Senha_aluno='" . $senha .  "' WHERE Email_aluno = '$email'";

    $result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
  echo "Registro atualizado.";
} else {
  echo "Erro: " . $conn->error;
}
}
?>