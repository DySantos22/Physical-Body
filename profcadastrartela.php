<html>

<head>
	<title>Cadastrar Professor</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/form_editarecadastrar.css">
	<link rel="icon" href="images/TCC-logo.png" />
</head>

<body>
	<?php
session_start();
//Só administrador pode acessar o programa.
if($_SESSION['acesso']=="Admin"){
?>
	<form action="profcadastrar.php" method="post">
		<h3>Cadastrar Professor</h3>
		<input type="text" name="nome" placeholder="Seu nome..." required>
		<input type="email" name="email" placeholder="Seu e-mail..." required>
		<input type="password" name="senha" placeholder="Sua senha..." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
			title="A senha deve conter pelo menos um caracter maiúsculo, um minúsculo, um número e no mínimo oito caracteres"
			required>
		<input type="radio" name="acesso" value="Aluno" required><label>Aluno</label>
		<input type="radio" name="acesso" value="Professor" required><label>Professor</label>
		<input type="radio" name="acesso" value="Admin"><label>Admin</label>
		<input type="submit" value="Enviar">
	</form>
	<?php
}else{
    header('Location: index.html'); //Redireciona para o form
    exit; // Interrompe o Script
}
?>
</body>

</html>