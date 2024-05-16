<?php

if (isset($_POST['email']) && isset($_POST['senha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $conexao = mysqli_connect("localhost", "", "", "sistemas_reserva");

    if (!$conexao) {
        die("Falha na conexão: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM cadastro WHERE Email='$email' AND Senha='$senha'";

    $resultado = mysqli_query($conexao, $query);

    if (mysqli_num_rows($resultado) == 1) {

        mysqli_close($conexao); 
        header("salas.html"); 
        exit();

    } else {
        echo "Credenciais inválidas";
    }

    mysqli_close($conexao);
}
?>