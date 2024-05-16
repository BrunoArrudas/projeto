<?php

require_once 'salas.html';

// Verifica se os campos de email e senha estão preenchidos
if (isset($_POST['email']) && isset($_POST['senha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Conexão com o banco de dados
    $conexao = mysqli_connect("localhost", "", "", "sistemas_reserva");

    // Verifica se a conexão foi bem-sucedida
    if (!$conexao) {
        die("Falha na conexão: " . mysqli_connect_error());
    }

    // Query para selecionar o usuário com o email e senha fornecidos
    $query = "SELECT * FROM cadastro WHERE Email='$email' AND Senha='$senha'";

    // Executa a query
    $resultado = mysqli_query($conexao, $query);

    // Verifica se há algum resultado
    if (mysqli_num_rows($resultado) == 1) {
        // Autenticação bem-sucedida
        mysqli_close($conexao); // Fecha a conexão com o banco de dados
        header("salas.html"); // Redireciona para index.html
        exit(); // Encerra o script

    } else {
        // Autenticação falhou
        echo "Credenciais inválidas";
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conexao);
}
?>