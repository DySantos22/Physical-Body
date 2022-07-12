var qnt_result_pg = 8; //quantidade de registro por página
var pagina = 1; //página inicial
$(document).ready(function () {
    listar_usuario(pagina, qnt_result_pg); //Chamar a função para listar os registros
});

function listar_usuario(pagina, qnt_result_pg){
    var dados = {
        pagina: pagina,
        qnt_result_pg: qnt_result_pg
    }
    $.post('listar_usuario.php', dados , function(retorna){
        //Subtitui o valor no seletor id="conteudo"
        $("#conteudo").html(retorna);
    });
}

var qnt_result_pg = 3; //quantidade de registro por página
var pagina = 1; //página inicial
$(document).ready(function () {
    listar_prof(pagina, qnt_result_pg); //Chamar a função para listar os registros
});

function listar_prof(pagina, qnt_result_pg){
    var dados = {
        pagina: pagina,
        qnt_result_pg: qnt_result_pg
    }
    $.post('listar_prof.php', dados , function(retorna){
        //Subtitui o valor no seletor id="conteudo"
        $("#conteudo2").html(retorna);
    });
}

