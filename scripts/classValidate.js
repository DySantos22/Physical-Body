function validarSenha(){
    senha = document.formulario.senha.value;
    confirma_senha = document.formulario.confirma_senha.value;
    if (confirma_senha != senha){ 
        alert("SENHAS NÃO SÃO IGUAIS!");
    }
}