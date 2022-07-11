<?php
//Verifica se o usuário logou.
if(!isset ($_SESSION['Nome']) || !isset ($_SESSION['Acesso']))
{
  unset($_SESSION['Nome']);
  unset($_SESSION['Acesso']);
  header('location:index.html');
  exit;
}
?>