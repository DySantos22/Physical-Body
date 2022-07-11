<?php
session_start();
if (isset($_POST['senha'])){
// Dados do Formulário
$campoemail = $_POST["email"];
$camposenha = $_POST["senha"];

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL (consulte tudo na tabela usuarios com o email digitado no form)
$sql = "SELECT * FROM administrador WHERE EmailADM='$campoemail'";
$sql2 = "SELECT * FROM aluno WHERE Email_aluno='$campoemail'";
$sql3 = "SELECT * FROM professor WHERE Email_prof='$campoemail'";

//Executa o SQL
$result = $conn->query($sql);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);

// Cria uma matriz com o resultado da consulta
 $row = $result->fetch_assoc();
 $row2 = $result2->fetch_assoc();
 $row3 = $result3->fetch_assoc();

	//Se a consulta tiver resultados
	if ($result->num_rows > 0 || $result2->num_rows>0 || $result3->num_rows>0){
		
		//Ele impede o acesso de clientes que não pagaram ou foram bloqueados
		if($row2['Email_aluno'] == $campoemail AND $row2['Condicao'] != 'Ativo' OR 
		$row3['Email_prof'] == $campoemail AND $row3['CondicaoP'] != 'Ativo'){
			echo "<script>alert('Confirme seu e-mail ou Entre em contato conosco!!')</script>";
			header('refresh:2;url=login.html');
			exit;
		}
		//Ele verifica a senha, acesso e deixa o cliente acessar
		if(password_verify($camposenha, $row["SenhaADM"])){
			$_SESSION['nome'] = $row["NomeADM"]; 
			$_SESSION['acesso'] = $row["AcessoADM"];
			header('Location: principalAdmin.php');
		}
			if(password_verify($camposenha, $row2["Senha_aluno"])){ 
				$_SESSION['nome'] = $row2["Nome"];
				$_SESSION['acesso'] = $row2["AcessoA"];
				header('Location: principal.php');
			}
			if(password_verify($camposenha, $row3["Senha_prof"])){
				$_SESSION['nome'] = $row3['Nome_prof'];
				$_SESSION['acesso'] = $row3['AcessoP'];
				header('Location: principalprof.php');
			}else{	
			echo 'Senha Inválida';  
			exit;  
			} 			
	}
//Se o usuário não usou o formulário
} else {
    header('Location: login.html'); //Redireciona para o form
    exit; // Interrompe o Script
}



//Fecha a conexão.
$conn->close();
?>