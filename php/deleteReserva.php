<?php
require_once 'reservas.html';

// Conexão com o banco de dados
$host = "localhost"; // Altere para o seu host
$usuario = "root"; // Altere para o seu usuário
$senha = ""; // Altere para a sua senha
$banco = "sistemas_reserva"; // Altere para o nome do seu banco de dados

$conexao = mysqli_connect($host, $usuario, $senha, $banco);

// Verificar a conexão
if (mysqli_connect_errno()) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Se a ação for deletar
    if (isset($_POST['delete'])) {
        // Coletar o ID da reserva a ser deletada
        $id_reserva = $_POST['id_reserva'];

        // Query SQL para deletar a reserva
        $query_delete = "DELETE FROM reserva WHERE id = '$id_reserva'";

        // Executar a query
        if (mysqli_query($conexao, $query_delete)) {
            echo "Reserva deletada com sucesso.";
        } else {
            echo "Erro ao deletar reserva: ";
        }
    }
}

?>