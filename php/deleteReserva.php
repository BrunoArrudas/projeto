<?php

// Conexão com o banco de dados
$host = "localhost"; 
$usuario = "root"; 
$senha = ""; 
$banco = "sistemas_reserva";

$conexao = mysqli_connect($host, $usuario, $senha, $banco);

if (mysqli_connect_errno()) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['delete'])) {
      
        $id_reserva = $_POST['id_reserva'];

        $query_delete = "DELETE FROM reserva WHERE id = '$id_reserva'";

        if (mysqli_query($conexao, $query_delete)) {
            echo "Reserva deletada com sucesso.";
        } else {
            echo "Erro ao deletar reserva: ";
        }
    }
}

?>