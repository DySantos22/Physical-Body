<?php
include_once "conexao.php";

$pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$qnt_result_pg = filter_input(INPUT_POST, 'qnt_result_pg', FILTER_SANITIZE_NUMBER_INT);
//calcular o inicio visualização
$inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

//consultar no banco de dados
$result_prof = "SELECT * FROM professor ORDER BY ID_professor LIMIT $inicio, $qnt_result_pg";
$resultado_prof = mysqli_query($conn, $result_prof);


//Verificar se encontrou resultado na tabela "usuarios"
if(($resultado_prof) AND ($resultado_prof->num_rows != 0)){
	?>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Nome</th>
				<th>E-mail</th>
				<th>Salário</th>
				<th>Condição</th>
				<th>Editar</th>
				<th>Bloquear</th>
				<th>Excluir</th>
			</tr>
		</thead>
		<tbody id="tabela">
			<?php
			while($row_prof = mysqli_fetch_assoc($resultado_prof)){
				?>
				<tr>
					<td><?php echo $row_prof['Nome_prof']; ?></td>
					<td><?php echo $row_prof['Email_prof']; ?></td>
					<td><?php echo $row_prof['Salario']; ?></td>
					<td><?php echo $row_prof['CondicaoP']; ?></td>
					<td><a href='profeditarform.php?id=<?php echo $row_prof['ID_professor'];?>'>
					<img src='images/editar.svg' alt='Editar Professor'></a></td>
					
					<td><a href='profbloquear.php?id=<?php echo $row_prof['ID_professor'];?>'>
					<img src='images/block.svg' alt='Bloquear Professor'></a></td>

					<td><a href='profexcluir.php?id=<?php echo $row_prof['ID_professor'];?>'>
					<img src='images/excluir.svg' alt='Excluir Professor'></a></td>
				</tr>
				<?php
			}?>
		</tbody>
	</table>
<?php
//Paginação - Somar a quantidade de usuários
$result_pg = "SELECT COUNT(ID_professor) AS num_result FROM professor";
$resultado_pg = mysqli_query($conn, $result_pg);
$row_pg = mysqli_fetch_assoc($resultado_pg);

//Quantidade de pagina
$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

//Limitar os link antes depois
$max_links = 2;

echo "<a href='#' onclick='listar_prof(1, $qnt_result_pg)'>Primeira</a> ";

for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
	if($pag_ant >= 1){
		echo " <a href='#' onclick='listar_prof($pag_ant, $qnt_result_pg)'>$pag_ant </a> ";
	}
}

echo " $pagina ";

for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
	if($pag_dep <= $quantidade_pg){
		echo " <a href='#' onclick='listar_prof($pag_dep, $qnt_result_pg)'>$pag_dep</a> ";
	}
}

echo " <a href='#' onclick='listar_prof($quantidade_pg, $qnt_result_pg)'>Última</a>";
}else{
	echo "<div class='alert alert-danger' role='alert'>Nenhum usuário encontrado!</div>";
}


