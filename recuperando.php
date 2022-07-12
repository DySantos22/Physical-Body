<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueci a senha</title>
    <link rel="stylesheet" type="text/css" href="css/html_recuperando.css">
    <link rel="stylesheet" type="text/css" href="css/form_recuperando.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/navbar_secundario.css">

 </head>
<body>
<header>
        <nav>
            <a class="nav-logo" href="index.html">Physical Body</a>
        </nav>
    </header>
 
  <form action="recuperando_senha.php" method="post">
    <h1 id="titulo">Digite sua Senha:</h1>
    <div>
        <label>
            <?php $email = $_GET['email'];?>
            <input type="hidden" name="email" value=<?php echo $email;?>>
        </label>
    </div>
    <div>
      <label>
        <input type="password" name="senha" id="senha" placeholder="Senha Nova" required>
    </label>
    </div>
    <div>
    <label>
        <input type="password" name="confirma_senha" id="confirma_senha" placeholder="Confirme a Senha" required>
    </label>
    </div>
    <div class="button">
        <input type="submit" value="Enviar">
    </div>
</form>

<footer>
        <section class="footer">
            <div class="main-footer">
                <div id="contato">
                    <h1>Contato</h1>
                    <div class="contato-detalhes">
                        <a href="tel:+5521999999999">Celular: +55 (21) 99999-9999</a>
                        <a href="mailto:Physicalbody00@gmail">Email: Physicalbody00@gmail.com</a>
                    </div>
                    <div class="endereco-detalhes">
                        <h1>Endereço</h1>
                        <p>Praça da Bandeira, Zona Norte, Rio de Janeiro</p>
                    </div>
                </div>
                <div class="redes-sociais">
                    <h1>Redes Sociais</h1>
                    <div class="sociallogos">
                        <a href="#"><img src="images/instagram-icon.svg">Instagram</a>
                        <a href="#"><img src="images/facebook-icon.svg">Facebook</a>
                        <a href="#"><img src="images/twitter-icon.svg">Twitter</a>
                    </div>
                </div>
            </div>
            <span>&copy; Physical Body Copyright 2009 All Rights Reserved</span>
        </section>
    </footer>
</body>
</html>