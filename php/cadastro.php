<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmSenha = $_POST['confirmSenha'];

    if ($senha !== $confirmSenha) {
        echo "Erro: As senhas não coincidem.";
        exit; 
    }

    $host = "localhost"; 
    $usuario = "root"; 
    $senha_bd = ""; 
    $banco = "sistemas_reserva";

    $conexao = mysqli_connect($host, $usuario, $senha_bd, $banco);

    if (!$conexao) {
        die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
    }

    $query = "INSERT INTO cadastro (Nome, Email, Senha) VALUES ('$nome', '$email', '$senha')";

    if (mysqli_query($conexao, $query)) {
        echo "Cadastro realizado com sucesso.";
    } else {
        echo "Erro ao cadastrar usuário: " . mysqli_error($conexao);
    }
    mysqli_close($conexao);
}
?>