<?php
    
require 'conexao.php';

if(isset($_POST['senha'])){

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $hash = password_hash($senha, PASSWORD_BCRYPT);

    $sql = "UPDATE aluno SET Senha_aluno= '$hash' WHERE Email_aluno = '$email'";

    $result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
  echo "<Script>alert('Registro atualizado.')</script>";
  header('refresh:2;url=login.html');
} else {
  echo "Erro: " . $conn->error;
}
}
?>