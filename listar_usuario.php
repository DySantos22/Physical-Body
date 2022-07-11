<?php
include_once "conexao.php";

$pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$qnt_result_pg = filter_input(INPUT_POST, 'qnt_result_pg', FILTER_SANITIZE_NUMBER_INT);
//calcular o inicio visualização
$inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

//consultar no banco de dados
$result_usuario = "SELECT * FROM aluno LEFT JOIN plano ON aluno.ID_plano = plano.ID_plano ORDER BY ID_aluno LIMIT $inicio, $qnt_result_pg";
$resultado_usuario = mysqli_query($conn, $result_usuario);


//Verificar se encontrou resultado na tabela "usuarios"
if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
	?>
	<table class="table table-striped table-bordered table-hover" id="tabela">
		<thead>
			<tr>
				<th>Nome</th>
				<th>E-mail</th>
				<th>Plano</th>
				<th>Condição</th>
				<th>Editar</th>
				<th>Bloquear</th>
				<th>Excluir</th>
			</tr>
		</thead>
		<tbody id="Btabela">
			<?php
			while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
				?>
				<tr>
					<td><?php echo $row_usuario['Nome']; ?></td>
					<td><?php echo $row_usuario['Email_aluno']; ?></td>
					<td><?php echo $row_usuario['Nome_plano']; ?></td>
					<td><?php echo $row_usuario['Condicao']; ?></td>
					<td><a href='alunoeditarform.php?id=<?php echo $row_usuario['ID_aluno'];?>'>
					<img src='images/editar.svg' alt='Editar Usuário'></a></td>
					
					<td><a href='alunobloquear.php?id=<?php echo $row_usuario['ID_aluno'];?>'>
					<img src='images/block.svg' alt='Bloquear Usuário'></a></td>

					<td><a href='alunoexcluir.php?id=<?php echo $row_usuario['ID_aluno'];?>'>
					<img src='images/excluir.svg' alt='Excluir Usuário'></a></td>
				</tr>
				<?php
			}?>
		</tbody>
	</table>
<?php
//Paginação - Somar a quantidade de usuários
$result_pg = "SELECT COUNT(ID_aluno) AS num_result FROM aluno";
$resultado_pg = mysqli_query($conn, $result_pg);
$row_pg = mysqli_fetch_assoc($resultado_pg);

//Quantidade de pagina
$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

//Limitar os link antes depois
$max_links = 2;

echo "<a href='#' onclick='listar_usuario(1, $qnt_result_pg)'>Primeira</a> ";

for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
	if($pag_ant >= 1){
		echo " <a href='#' onclick='listar_usuario($pag_ant, $qnt_result_pg)'>$pag_ant </a> ";
	}
}

echo " $pagina ";

for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
	if($pag_dep <= $quantidade_pg){
		echo " <a href='#' onclick='listar_usuario($pag_dep, $qnt_result_pg)'>$pag_dep</a> ";
	}
}

echo " <a href='#' onclick='listar_usuario($quantidade_pg, $qnt_result_pg)'>Última</a>";
}else{
	echo "<div class='alert alert-danger' role='alert'>Nenhum usuário encontrado!</div>";
}
?>