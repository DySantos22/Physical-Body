<?php
session_start();
//Verifica se o usuário logou.
if(!isset ($_SESSION['nome']) || !isset ($_SESSION['acesso']))
{
  unset($_SESSION['nome']);
  unset($_SESSION['acesso']);
  header('location:index.html');
  exit;
}

//Cria variáveis com a sessão.
$logado = $_SESSION['nome'];
$acesso = $_SESSION['acesso'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Tela Principal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/html_principal.css">
  <link rel="stylesheet" href="css/navbarlateral.css">
  <link rel="icon" href="images/TCC-logo.png" />
</head>

<body>

<div class="navigation">
    <ul>

<li class="list active">
    <a href="principalAdmin.php">
        <span class="icon"><ion-icon name= "home-outline"></ion-icon></span>
        <span class="title">Perfil</span>
</a>
</li>

<li class="list ">
  <a href="alunoscontrolar.php">
    <span class="icon"><ion-icon name="file-tray-full-outline"></ion-icon></span>
    <span class="title">Controlar Alunos</span>
</a>
</li>

<li class="list ">
  <a href="professorcontrolar.php">
    <span class="icon"><ion-icon name="file-tray-full-outline"></ion-icon></span>
    <span class="title">Controlar Professores</span>
</a>
</li>


<li class="list ">
    <a href="deslogar.php">
      <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
      <span class="title">Sair</span>
</a>
</li>
</ul>
</div>      
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script> 
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="scripts/navbarlateral.js"></script>

<main>

</section>

</main>

</body>
</html>