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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" />
    <link rel="icon" href="images/TCC-logo.png" />
</head>

<body>

    <nav class="navigation">
        <ul>
            <li class="list">
                <a href="principal.php">
                    <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                    </span>
                    <span class="title">Perfil</span>
                </a>
            </li>
            <li class="list active">
                <a href="treinos.php">
                    <span class="icon">
                        <ion-icon name="people-outline"></ion-icon>
                    </span>
                    <span class="title">Treinos</span>
                </a>
            </li>
            <li class="list">
                <a href="suporte.html">
                    <span class="icon">
                        <ion-icon name="help-circle-outline"></ion-icon>
                    </span>
                    <span class="title">Suporte</span>
                </a>
            </li>

            <li class="list">
                <a href="deslogar.php">
                    <span class="icon">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </span>
                    <span class="title">Sair</span>
                </a>
            </li>
        </ul>
    </nav>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="scripts/navbarlateral.js"></script>

    <main>

        <section id="treino">
        </section>

        <section id="agendamento">
            <div class="text-start">
                <h3>Marque sua reavaliação</h3>
            </div>
            <div class="agendar">
                <form>
                    <div>
                        <label for="agenda">Escolha o melhor dia para fazer a reavalição:</label>
                        <input type="date" id="agenda" name="agenda" min="now()" max="2023-04-30">
                    </div>
                </form>
            </div>
        </section>

    </main>

</body>

</html>