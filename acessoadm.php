<?php
//Verifica se o usuário logou.
if(!isset ($_SESSION['nome']) || !isset ($_SESSION['acesso']))
{
  unset($_SESSION['nome']);
  unset($_SESSION['acesso']);
  header('location:usuarioscontrolar.php');
  exit;
}

	if($_SESSION['acesso']!="Admin"){
		    header('location:login.html'); //Redireciona para o form
			exit; // Interrompe o Script
	}

?>
