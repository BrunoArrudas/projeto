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
    // Coletar os dados do formulário
    $curso = $_POST['cursos'];
    $ofertas = $_POST['ofertas'];
    $sigla = $_POST['sigla'];
    $cod_turma = $_POST['cod-turma'];
    $dt_inicio = $_POST['dt-inicio'];
    $dt_fim = $_POST['dt-fim'];
    $subarea = $_POST['subarea'];
    $docente = $_POST['docente'];
    $sala_lab = $_POST['sala-lab'];
    $capacidade = $_POST['capacidade'];

    // Query SQL para inserir os dados no banco de dados
    $query = "INSERT INTO reserva (Cursos, Ofertas, Sigla, Codigo_turma, Data_inicio, Data_fim, Subarea, Docente, Sala_lab, Capacidade) VALUES ('$curso', '$ofertas', '$sigla', '$cod_turma', '$dt_inicio', '$dt_fim', '$subarea', '$docente', '$sala_lab', '$capacidade')";

    // Executar a query
    if (mysqli_query($conexao, $query)) {
        echo "Reserva feita com sucesso.";
    } else {
        echo "Erro ao fazer reserva: " . mysqli_error($conexao);
    }

    // Fechar a conexão
    mysqli_close($conexao);
}
?>