<?php



// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmSenha = $_POST['confirmSenha'];

    // Verificar se as senhas coincidem
    if ($senha !== $confirmSenha) {
        echo "Erro: As senhas não coincidem.";
        exit; // Encerra o script PHP
    }

    // Conectar-se ao banco de dados (substitua essas variáveis pelas suas informações de conexão)
    $host = "localhost"; // Host do banco de dados
    $usuario = "root"; // Nome de usuário do banco de dados
    $senha_bd = ""; // Senha do banco de dados
    $banco = "sistemas_reserva"; // Nome do banco de dados

    // Conexão com o banco de dados
    $conexao = mysqli_connect($host, $usuario, $senha_bd, $banco);

    // Verificar a conexão
    if (!$conexao) {
        die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
    }

    // Query SQL para inserir os dados do usuário no banco de dados
    $query = "INSERT INTO cadastro (Nome, Email, Senha) VALUES ('$nome', '$email', '$senha')";

    // Executar a query
    if (mysqli_query($conexao, $query)) {
        echo "Cadastro realizado com sucesso.";
    } else {
        echo "Erro ao cadastrar usuário: " . mysqli_error($conexao);
    }

    // Fechar a conexão
    mysqli_close($conexao);
}
?>